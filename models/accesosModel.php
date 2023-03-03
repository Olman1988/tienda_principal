<?php

class accesosModel{
    
    public function validarAccesos($pass,$email){
        $usuario= '';
    try {

        $db = conexion::getConnect();
        $consulta = $db->prepare("SELECT r.nombreRol AS role FROM usuarios u INNER JOIN roles r on u.idRole=r.idRol WHERE u.email =:correo AND u.password = :pass");
        $consulta->bindValue(':correo', $email);
        $consulta->bindValue(':pass', $pass);
        $consulta->execute();
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
           
        }
        return $usuario;
    
    }
}
