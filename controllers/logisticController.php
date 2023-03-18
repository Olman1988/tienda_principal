<?php
require_once './models/logisticModel.php';
class logisticController{
    private $logistic;
    public function __construct() {
        $this->logistic = new logisticModel();
    }

    public function getGeneralLogistic(){
        $respLogistic = $this->logistic->getGeneralLogistic();
        return $respLogistic;
    }
}
