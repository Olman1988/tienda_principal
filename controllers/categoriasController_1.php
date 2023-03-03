<?php
require_once 'models/categoriasModel.php';

class categoriasController{
    public function __construct() {
        
    }
    public function todasCategoriasPadre(){
        $categorias= new categoriasModel();
           $respuestaCategorias=$categorias->todasCategoriasPadre(); 
           return $respuestaCategorias;
    }
    public function todasCategorias(){
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategorias();
       
        require_once "views/principal/categorias.php";
    }
    public function todasSubCategorias($idCategoria){
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
       
       if(count($respuestaSubCategorias)>0){
           
           
           return true;
           
       } else {
           return false;
       }
        
      
        
    }
    public function todasSubCategoriasSidebar($idCategoria){
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
       
       if(count($respuestaSubCategorias)>0){
           
           
           return true;
           
       } else {
           return false;
       }
        
      
        
    }
    public function todasSubCategoriasConHijos($idCategoria){
       $subcategorias= new categoriasModel();
       $respuestaSubCategorias=$subcategorias->consultarCategoriaPadre($idCategoria); 
            return $respuestaSubCategorias;
    }
    public function todasCategoriasParaMenu(){
        $categorias= new categoriasModel();
        $respuestaCategorias=$categorias->todasCategoriasParaMenu();
       
        return $respuestaCategorias;
    }
   
    
    
}
