<?php
session_start();
require_once '../models/userModel.php';
class userController{
    public function iniciarSesion($email,$pass){
        $user= new userModel();
        $respuestaUsuario=$user->iniciarSesion($email);
        
        if($respuestaUsuario['email']==$email&& md5($pass)==$respuestaUsuario['password']&&$respuestaUsuario['estado']==1){
            $_SESSION['perfil']=$respuestaUsuario['role'];
            $_SESSION['password']=$respuestaUsuario['password'];
            $_SESSION['idUsuario']=$respuestaUsuario['idUsuario'];
            $_SESSION['nombre']=$respuestaUsuario['nombre'];
            $_SESSION['apellido']=$respuestaUsuario['apellido'];
            $_SESSION['DNI']=$respuestaUsuario['DNI'];
            $_SESSION['provincia']=$respuestaUsuario['provincia'];
            $_SESSION['canton']=$respuestaUsuario['canton'];
            $_SESSION['distrito']=$respuestaUsuario['distrito'];
            $_SESSION['direccion']=$respuestaUsuario['direccion'];
            $_SESSION['email']=$respuestaUsuario['email'];
            $_SESSION['telefono']=$respuestaUsuario['telefono'];
            $_SESSION['estado']=$respuestaUsuario['role'];
            $_SESSION['tipoDNI']=$respuestaUsuario['tipoDNI'];
            
            if($_SESSION['perfil']=='Admin'){
                echo 2;
            } else {
                 echo 1;
            }
           
        } else {
            echo 0;
        }
        
        
    }
    public function crearUsuario(){
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
        $tipoDNI = isset($_POST['tipoDNI']) ? $_POST['tipoDNI'] : false;
        $DNI = isset($_POST['DNI']) ? $_POST['DNI'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
        $password = isset($_POST['passOne']) ? $_POST['passOne'] : false;
        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $canton = isset($_POST['canton']) ? $_POST['canton'] : false;
        $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
        if($nombre&&$apellido&&$direccion&&$tipoDNI&&$DNI&&$email&&$telefono&&$password&&$provincia&&$canton&&$distrito){
            
            $userModel=new userModel();
       $respuestaCreacionUsuario=$userModel->crearUsuarioNuevo($nombre,$apellido,$direccion,$tipoDNI,$DNI,$email,$telefono,$password,$provincia,$canton,$distrito);
       return $respuestaCreacionUsuario;
        } else {
            return 0;
        }
       
       
    }
    public function actualizarUsuario(){
        $respuesta=false;
        
           $nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
        $apellido = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : false;
        $direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;
        $tipoDNI = isset($_POST['tipoDNI']) ? $_POST['tipoDNI'] : false;
        $DNI = isset($_POST['DNI']) ? $_POST['DNI'] : false;
        $email = $_SESSION['email'];
        $telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : false;
        
        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $canton = isset($_POST['canton']) ? $_POST['canton'] : false;
        $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
        if($nombre&&$apellido&&$direccion&&$telefono&&$provincia&&$canton&&$distrito&&$email&&$tipoDNI&&$DNI){
            
            $userModel=new userModel();
       $respuestaCreacionUsuario=$userModel->actualizarUsuario($nombre,$apellido,$direccion,$email,$telefono,$provincia,$canton,$distrito,$tipoDNI,$DNI);
        if($respuestaCreacionUsuario){
       
        
      
            $_SESSION['nombre']=$_POST['Nombre'];
            $_SESSION['apellido']=$_POST['Apellidos'];
           $_SESSION['tipoDNI']=$_POST['tipoDNI'];
           $_SESSION['DNI']=$_POST['DNI'];
            $_SESSION['provincia']=$_POST['provincia'];
            $_SESSION['canton']=$_POST['canton'];
            $_SESSION['distrito']=$_POST['distrito'];
            $_SESSION['direccion']=$_POST['Direccion'];
        
            $_SESSION['telefono']=$_POST['Telefono'];
          $respuesta=true; 
        }
        
        echo $respuesta;
        } else {
            echo "falso";
        }
       
       
    }
    public function cambiarPass(){
    $respuestaAct=" ";
        $passAnterior=md5($_POST['passAnterior']);
        
        if($passAnterior==$_SESSION['password']){
          
          $userModel=new userModel();
          $respuestaAct=$userModel->cambiarPass($_POST['nuevaPassConfirm'],$_SESSION['email']);
          
        } else {
            $respuestaAct=2;
        }
        echo $respuestaAct;
        
    }
    
}

if(isset($_POST['action'])){
    
    switch ($_POST['action']) {
        case "index":
       
            $user= new userController();
            $respuesta=$user->crearUsuario();
            echo $respuesta;

            break;
        case "login":
       
            $user= new userController();
            $respuesta=$user->iniciarSesion($_POST['email'],$_POST['pass']);
            

            break;
        case "actualizar":
       
            $user= new userController();
            $respuesta=$user->actualizarUsuario();
            echo $respuesta;

            break;
        case "cambiarPass":
            $user= new userController();
            $respuesta=$user->cambiarPass();
            echo $respuesta;
            break;

        default:
            break;
    }
}
