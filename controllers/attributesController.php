<?php
require_once '../config/conexion.php';
require_once '../models/attributesModel.php';
class attributesController{
    private $attribute;
    public function __construct() {
        $this->attribute = new attributesModel();
    }
    public function getAllAttributesGroup(){
        $respAttribute = $this->attribute->getAllAttributesGroup();
        require_once 'views/attributesGroup.php';
    }
    public function setAttributesGroup($description){
        $respAttribute = $this->attribute->setAttributesGroup($description);
        return $respAttribute;
    }
    public function getAttributeGroupById($id){
        $respAttribute = $this->attribute->getAttributeGroupById($id);
        require_once 'views/attributes/edit-attributeGroup.php'; 
    }
    public function updAttributesGroup($description,$id){
        $respAttribute = $this->attribute->updAttributesGroup($description,$id);
        return $respAttribute;
    }
    public function delAttributesGroup($id){
        $respAttribute = $this->attribute->delAttributesGroup($id);
        return $respAttribute;
    }
    public function getAllAttributes(){
        $respAttribute = $this->attribute->getAllAttributes();
         require_once 'views/attributes.php';
    }
    public function setAttributes($description,$control){
        $respAttribute = $this->attribute->setAttributes($description,$control);
        return $respAttribute;
    }
    public function getAttributeById($id){
        $respAttribute = $this->attribute->getAttributeById($id);
        require_once 'views/attributes/edit-attribute.php'; 
    }
    public function updAttributes($description,$id,$control){
        $respAttribute = $this->attribute->updAttributes($description,$id,$control);
        return $respAttribute;
    }
    public function delAttributes($id){
       $respAttribute = $this->attribute->delAttributes($id);
        return $respAttribute;
    }
    public function getAllAttributeValues($id,$nombre){
       $respAttribute = $this->attribute->getAllAttributeValues($id);
       $nom = $nombre;
        require_once 'views/attributesValues.php';
    }
    public function codeGenerator() {
                  $code=  strtoupper(uniqid());
                  return $code;
        }
    public function setAttributeValues($description,$order,$color,$nombrefinal,$id){
        $respAttribute = $this->attribute->setAttributeValues($description,$order,$color,$nombrefinal,$id);
        return $respAttribute;
    }    
    public function getAttributeValueById($id){
        $respAttribute = $this->attribute->getAttributeValueById($id);
        require_once 'views/attributes/edit-value-attribute.php'; 
    }
    public function updAttributesValues($description,$order,$color,$id,$nombrefinal){
        $respAttribute = $this->attribute->updAttributesValues($description,$order,$color,$id,$nombrefinal);
        return $respAttribute;
    }
    public function delAttributesValues($id){
        $respAttribute = $this->attribute->delAttributesValues($id);
        return $respAttribute;
    }
    public function getAllAttributesByGroup($id,$description){
        $respAllAtributes = $this->attribute->getAllAttributes();
        $respAttribute = $this->attribute->getAllAttributesByGroup($id);
        $array = Array();
        if(!empty($respAttribute)){
           
        }
        foreach ($respAllAtributes as $key => $value) {
            $flagIsAdded = false;
            foreach ($respAttribute as $respAttributevalue) {
                if($respAttributevalue['id']==$value['id']){
                   $flagIsAdded = true; 
                }
            }
            if(!$flagIsAdded){
                $array[] =[
                    "id" => $value['id'],
                     "nombre"=> $value['nombre']    
                ];
            }
        }
        $respAllAtributes=$array;
        require_once 'views/attributes/asoc-attribute.php';
    }
    public function delAttributeGroupVsAttribute($idAtributo,$idGroup){
        $respAttribute = $this->attribute->delAttributeGroupVsAttribute($idAtributo,$idGroup);
        return $respAttribute;
    }
    public function setAttributeGroupVsAttribute($idAtributo,$idGroup){
        $respAttribute = $this->attribute->setAttributeGroupVsAttribute($idAtributo,$idGroup);
        return $respAttribute;
    }
    public function getAllAttributesByProduct($id){
        $respAttribute = $this->attribute->getAllAttributesByProduct($id);
        $respAllAtributes = $this->attribute->getAllAttributesGroup();
        $array = Array();
        if(!empty($respAttribute)){
           
        }
        foreach ($respAllAtributes as $key => $value) {
            $flagIsAdded = false;
            foreach ($respAttribute as $respAttributevalue) {
                if($respAttributevalue['id']==$value['id']){
                   $flagIsAdded = true; 
                }
            }
            if(!$flagIsAdded){
                $array[] =[
                    "id" => $value['id'],
                     "nombre"=> $value['nombre']    
                ];
            }
        }
        $respAllAtributes=$array;
        require_once 'views/attributes/product-attribute.php';
        
    }
    public function setAllAttributesByProduct($id,$cod){
        $respAllAtributes = $this->attribute->setAllAttributesByProduct($id,$cod);
        return $respAllAtributes;
    }
    public function delAttributesVsProduct($idGroup,$cod){
        $respAllAtributes = $this->attribute->delAttributesVsProduct($idGroup,$cod);
        return $respAllAtributes;
    }
}
