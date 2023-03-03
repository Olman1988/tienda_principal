<?php
    if($_GET){
        require_once '../../config/conexion.php';
        require_once '../../config/parameters.php';
        session_start();

        try {
            $db = conexion::getConnect();
            $consulta=$db->prepare("INSERT INTO paymentResponse (
                    IDClient
                    ,OrderCode
                    ,responseCode
                    ,responseText
                    ,creationDate
                    ,lastDigits
                    ,auth
                    ,brand
                    ,tilopayTransaction
                )VALUES(
                    :IDClient,
                    :OrderCode,
                    :responseCode,
                    :responseText,
                    GETDATE(),
                    :lastDigits,
                    :auth,
                    :brand,
                    :tilopayTransaction);"
                );
            $db->beginTransaction();
             
            $consulta->bindValue(':IDClient',$_SESSION['idUsuario']);
            $consulta->bindValue(':OrderCode',$_GET['order']);
            $consulta->bindValue(':responseCode',$_GET['code']);
            $consulta->bindValue(':responseText',$_GET['description']);
            $consulta->bindValue(':lastDigits',$_GET['last-digits']);
            $consulta->bindValue(':auth',$_GET['auth']);
            $consulta->bindValue(':brand',$_GET['brand']);
            $consulta->bindValue(':tilopayTransaction',$_GET['tilopay-transaction']);
            $consulta->execute();

            $respuesta=$db->commit();
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        header("Location: " . base_url);
        die();
    }
?>