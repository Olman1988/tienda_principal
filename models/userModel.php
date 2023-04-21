<?php
require_once '../config/conexion.php';
class userModel{
    
    public function iniciarSesion($correo){
        try {

        $db = conexion::getConnect();
        $consulta = $db->prepare("SELECT r.nombreRol AS role,u.* FROM usuarios u INNER JOIN roles r on u.idRole=r.idRol WHERE u.email =:correo");
        $consulta->bindValue(':correo', $correo);
        $consulta->execute();
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        return $usuario;
    
    }
    
    public function crearUsuarioNuevo($nombre,$apellido,$direccion,$tipoDNI,$DNI,$email,$telefono,$password,$provincia,$canton,$distrito){
        try {
            $db = conexion::getConnect();

$pass=md5($password);
          
            $consulta=$db->prepare("INSERT INTO usuarios values(:idRole,:nombre,:apellido,:DNI,:provincia,:canton,:distrito,:direccion,:email,:telefono,:fecha,:pass,:estado,:tipoDNI)");
            
             $db->beginTransaction(); //inicia la transaccion
           
           
            $consulta->bindValue(':idRole','2');
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':apellido', $apellido);
            $consulta->bindValue(':DNI', $DNI);
            $consulta->bindValue(':tipoDNI', $tipoDNI);
            $consulta->bindValue(':provincia', $provincia);
            $consulta->bindValue(':canton',$canton);
            $consulta->bindValue(':distrito', $distrito);
            $consulta->bindValue(':direccion', $direccion);
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':telefono', $telefono);
            $consulta->bindValue(':fecha', date("Y-m-d"));
            $consulta->bindValue(':pass', $pass);
            $consulta->bindValue(':estado', '1');
            

            $consulta->execute();
         $respuesta=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $respuesta;
    }
    public function actualizarUsuario($nombre,$apellido,$direccion,$email,$telefono,$provincia,$canton,$distrito,$tipoDNI,$DNI){
        try {
            $db = conexion::getConnect();
          
            $consulta=$db->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, provincia = :provincia,"
                    . "canton = :canton, distrito = :distrito, direccion =:direccion, telefono = :telefono, DNI = :DNI, tipoDNI = :tipoDNI where email = :email");
            
             $db->beginTransaction(); //inicia la transaccion
            
           
     
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':apellido', $apellido);
            $consulta->bindValue(':DNI', $DNI);
            $consulta->bindValue(':tipoDNI', $tipoDNI);
            $consulta->bindValue(':provincia', $provincia);
            $consulta->bindValue(':canton',$canton);
            $consulta->bindValue(':distrito', $distrito);
            $consulta->bindValue(':direccion', $direccion);
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':telefono', $telefono);
          
            

            $consulta->execute();
         $respuesta=$db->commit();
        }
    catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $respuesta = false;
           
        }
        return $respuesta;
    }
    public function cambiarPass($passnueva,$email){
         try {
            $db = conexion::getConnect();
          
            $consulta=$db->prepare("UPDATE usuarios SET password = :pass where email = :email");
            
             $db->beginTransaction(); //inicia la transaccion
            
            
            $consulta->bindValue(':pass', md5($passnueva));
           $consulta->bindValue(':email',$email);
          
            

            $consulta->execute();
         $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $respuesta = false;
           
        }
        return $respuesta;
        
    }
    
    public function verifyEmail($email){
        $resp=[];   
        try {
            
            $db = conexion::getConnect();
            $query = $db->prepare("SELECT * FROM usuarios WHERE email =:email;");
            $query->bindValue(':email', $email);
            $query->execute();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $value){
                        $resp[]=$value;
                    }
            } catch (PDOException $e) {
                echo "se ha presentado un error " . $e->getMessage();
                throw $e;

            }
            return $resp;
    }
    public function updateToken($email){
         try {
            $db = conexion::getConnect();
            $query=$db->prepare("UPDATE passwordtokens SET status= 'Expired' WHERE idUser = (SELECT idUsuario FROM usuarios WHERE email = :email);");
            $db->beginTransaction(); //inicia la transaccion
            $query->bindValue(':email', $email);
            $query->execute();
            $resp=$db->commit();
        }
    catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $resp = false;
           
        }
        return $resp;
    }
    
    public function insertToken($OTP,$email){
        try {
            $db = conexion::getConnect();
            $query=$db->prepare("INSERT INTO passwordtokens (OTP,idUser,status) VALUES (:otp,(SELECT idUsuario FROM usuarios WHERE email=:email),'Active');");
            $db->beginTransaction(); //inicia la transaccion
            $query->bindValue(':otp', $OTP);
            $query->bindValue(':email', $email);
            $query->execute();
            $resp=$db->commit();

            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        
      return $resp;  
    }
    public function validateOTP($email,$otp){
        try {
            $resp=[];
            $db = conexion::getConnect();
            $query = $db->prepare("SELECT * FROM passwordtokens WHERE OTP = :otp AND idUser = (SELECT idUsuario FROM usuarios WHERE email=:email) AND status='Active';");
            $query->bindValue(':email', $email);
            $query->bindValue(':otp', $otp);
            $query->execute();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $value){
                        $resp[]=$value;
                    }
            } catch (PDOException $e) {
                echo "se ha presentado un error " . $e->getMessage();
                throw $e;

            }
            return $resp;
    }
    public function updatePassword($passConfirm,$email){
          try {
            $db = conexion::getConnect();
            $query=$db->prepare("UPDATE usuarios SET password = :passConfirm WHERE email = :email;");
            $db->beginTransaction(); //inicia la transaccion
            $query->bindValue(':passConfirm', md5($passConfirm));
            $query->bindValue(':email', $email);
            $query->execute();
            $resp=$db->commit();
        }
    catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $resp = false;
           
        }
        return $resp;
    }
    public function updateTokenUsed($otp){
        try {
            $db = conexion::getConnect();
            $query=$db->prepare("UPDATE passwordtokens SET status = 'Used' WHERE OTP = :otp;");
            $db->beginTransaction(); //inicia la transaccion
            $query->bindValue(':otp', $otp);
            $query->execute();
            $resp=$db->commit();
        }
        catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $resp = false;
           
        }
        return $resp;
    }
    }

