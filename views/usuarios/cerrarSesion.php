<?php

if(isset($_SESSION['perfil'])){
    
            unset($_SESSION['perfil']);
            unset($_SESSION['idUsuario']);
            unset($_SESSION['nombre']);
            unset($_SESSION['apellido']);
            unset($_SESSION['DNI']);
            unset($_SESSION['provincia']);
            unset($_SESSION['canton']);
            unset($_SESSION['distrito']);
            unset($_SESSION['direccion']);
            unset($_SESSION['email']);
            unset($_SESSION['telefono']);
            unset($_SESSION['estado']);
          echo"<script>"
            . "  window.location.href = '?pag=cuenta&&func=login'</script>";
    
}
