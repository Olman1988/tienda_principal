<?php
require_once 'models/articulosModel.php';
class articulosController{
    public function __construct() {
        
        }
        public function todosArticulosPorCategoria($idCategoria){
            $consultaArticulos=new articulosModel();
            $respuestaArticulos=$consultaArticulos->todosArticulosPorCategoria($idCategoria);
            
            return $respuestaArticulos;
            
        }
         public function todosImagenesPorId($idArticulo){
            $consultaArticulos=new articulosModel();
            $respuestaArticulos=$consultaArticulos->todosImagenesPorId($idArticulo);
            
            return $respuestaArticulos;
            
        }
        public function articuloPorId($idArticulo){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articuloPorId($idArticulo);
            
            require_once"views/productos/productoPrincipal.php";
            
        }
        public function articulosDestacados(){
            $consultaArticulo=new articulosModel();
            $respuestaArticulo=$consultaArticulo->articulosDestacados();
             if($respuestaArticulo!=0 && COUNT($respuestaArticulo)>0){
                 require_once "views/principal/destacados.php";
             }
            
        }
          public function buscadorArticulos($buscar){
               $buscadores = addslashes($buscar);
            $buscadorArray=explode(" ", $buscadores); 

        $articulos= new articulosModel();
        
        $respuestaArticulos=[];
        for($i=0;$i<count($buscadorArray);$i++){
           $respuestaArticulos[]=$articulos->buscadorArticulos($buscadorArray[$i]);
           //echo count($respuestaArticulos);
        }
        
        $respuestaArticulos = array_map("unserialize", array_unique(array_map("serialize", $respuestaArticulos)));
        require_once 'views/productos/resultadosBusqueda.php';
        }
        
       
         
    }

    

