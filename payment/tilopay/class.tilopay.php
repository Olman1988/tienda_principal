<?php
/**
 * Class Tilopay
 * Manage Tilopay transactions
 * @author Alí Guillén <aligguillen@gmail.com> 
 * 17/02/2023
 * @version Beta
 * @access public 
 */
require_once '../config/conexion.php';
require_once '../config/parameters.php';
class Tilopay{
    private $_credentials;
    private $_url;
    private $_version;
    private $_token;
    public $_token_aquired;
    public $_BASE;

    public function __construct(){
        $this->_version = 'v1';
        $this->_url = 'https://app.tilopay.com/api/'.$this->_version . '/';
        $this->_BASE = base_url;

        $this->getCredentials();
    }
    /**
     * @method getCredentials
     * @access private
     * @return array 
     */
    private function getCredentials(){
        $db = conexion::getConnect();
        $SQL = 'SELECT 
                    username
                    ,password
                    ,apikey
                    FROM
                    [dbo].[paymentTypeConfiguration]
                WHERE [ID] = 1';
        $consulta = $db->prepare($SQL);
        $consulta->execute();

        $this->_credentials = $consulta->fetch(PDO::FETCH_ASSOC);

        $this->getTokenApi();
        return true;
    }
    /**
     * @method executeCURL
     * @access private
     * @param string $PATH
     * @param string $JSONData
     * @return array
     */
    private function executeCURL($PATH, $JSONData){
        $Result = ['result'=>false, 'msg'=>'Error on process data', 'data'=>null];
        $ch = curl_init($this->_url . $PATH);

        curl_setopt($ch, CURLOPT_POST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$JSONData");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $Headers = ['Content-Type: application/json'];

        if($PATH != 'login'){
            $Headers[] = 'Authorization: bearer ' . $this->_token;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $Headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $Response = curl_exec($ch);
        if(curl_errno($ch)){
            $err = curl_error($ch);
            $Result['msg'] = $err;
        }else{
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if($httpcode == 200){
                $Res = json_decode($Response, true);
                $Result['result'] = true;
                $Result['msg'] = 'Success';

                if($PATH == 'login'){
                    $this->_token = $Res['access_token'];
                }else{
                    $Result['data'] = $Res;
                }
            }
        }

        curl_close($ch);

        return $Result;
    }
    /**
     * @method getTokenApi
     * @access private
     * @return array
     */
    private function getTokenApi(){
        if(!empty($this->_credentials['username']) && !empty($this->_credentials['password'])){
            $Data = [
                "apiuser" => $this->_credentials['username'],
                "password" => $this->_credentials['password']
            ];

            $JSONData = json_encode($Data);
            $TOKEN = $this->executeCURL('login', $JSONData);
            
            if($TOKEN['result']){
                $this->_token_aquired = true;
            }
        }

        return true;
    }
    /**
     * @method processPayment
     * @access public
     * @param array $Payment (REQ)
     * @return array
     */
    public function processPayment(){
        $Result = ['result'=>false];
        $numArgs = func_num_args();

        if($numArgs>0){
            $ARGS = func_get_args();

            $amount            = (isset($ARGS[0]['amount'])) ? floatval($ARGS[0]['amount']) : 0;
            $currency          = (!empty($ARGS[0]['currency'])) ? $ARGS[0]['currency'] : 'USD';
            $billToFirstName   = (!empty($ARGS[0]['billToFirstName'])) ? $ARGS[0]['billToFirstName'] : '';
            $billToLastName    = (!empty($ARGS[0]['billToLastName'])) ? $ARGS[0]['billToLastName'] : '';
            $billToAddress     = (!empty($ARGS[0]['billToAddress'])) ? $ARGS[0]['billToAddress'] : '';
            $billToAddress2    = (!empty($ARGS[0]['billToAddress2'])) ? $ARGS[0]['billToAddress2'] : '';
            $billToCity        = (!empty($ARGS[0]['billToCity'])) ? $ARGS[0]['billToCity'] : '';
            $billToState       = (!empty($ARGS[0]['billToState'])) ? $ARGS[0]['billToState'] : '';
            $billToZipPostCode = (!empty($ARGS[0]['billToZipPostCode'])) ? $ARGS[0]['billToZipPostCode'] : '';
            $billToCountry     = (!empty($ARGS[0]['billToCountry'])) ? $ARGS[0]['billToCountry'] : '';
            $billToTelephone   = (!empty($ARGS[0]['billToTelephone'])) ? $ARGS[0]['billToTelephone'] : '';
            $billToEmail       = (!empty($ARGS[0]['billToEmail'])) ? $ARGS[0]['billToEmail'] : '';
            $orderNumber       = (!empty($ARGS[0]['orderNumber'])) ? $ARGS[0]['orderNumber'] : '';

            if(!empty($amount) && !empty($orderNumber)){
                $Data = [
                    "key"=> $this->_credentials['apikey'],
                    "redirect"=> $this->_BASE . 'views/redirects/tilopayRedirect.php',
                    "amount"=> $amount,
                    "currency"=> 'CRC',
                    "billToFirstName"=> $billToFirstName,
                    "billToLastName"=> $billToLastName,
                    "billToAddress"=> $billToAddress,
                    "billToAddress2"=> $billToAddress2,
                    "billToCity"=> $billToCity,
                    "billToState"=> $billToState,
                    "billToZipPostCode"=> $billToZipPostCode,
                    "billToCountry"=> $billToCountry,
                    "billToTelephone"=> $billToTelephone,
                    "billToEmail"=> $billToEmail,
                    "orderNumber"=> $orderNumber,
                    "capture"=> "1",
                    "subscription"=> "0",
                    "platform"=> "api"
                ];

                $JSONData = json_encode($Data);
                $Response = $this->executeCURL('processPayment', $JSONData);

                if(isset($Response['result'])){
                    $Result['result'] = true;
                    $Result['url'] = $Response['data']['url'];
                }
            }            
        }

        return $Result;
    }
}
?>
