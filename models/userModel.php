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
    }

