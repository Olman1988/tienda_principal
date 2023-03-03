<?php

class userSecurity{
    
    public function isAdmin(){
        $usuario = Array();
        
        if(isset($_SESSION['email'])&&$_SESSION['email']!=''){
            $correo = $_SESSION['email'];
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

             if(!empty($usuario)&&count($usuario)>0){
                 if($usuario['email']==$_SESSION['email']&& $_SESSION['password']==$usuario['password']&&$usuario['estado']==1&&$usuario['idRole']==1){
                     return true;
                 } else{
                     return false;
                 }
             } else {
                 return false;
             }
        } else {
            return false;
        }     
    } 
}
