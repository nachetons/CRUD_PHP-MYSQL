<?php
    include 'conection.php';
    $configPath='../config.json';
    $objConnection=new Connection($configPath);
    $objConnection->connectToDb();
    if(!isset($_GET['id'])){
        exit();
    }

        $id = $_GET['id'];
        $sentencia = $objConnection->connection->prepare("DELETE FROM book WHERE id = ?");
        $resultado = $sentencia->execute([$id]);
    

    if($resultado === TRUE){
        header('Refresh:1; URL=../index.php');

                echo '<script language="javascript">alert("se a eliminado el registro");</script>';

            }else{
            echo "Error: " . $sentencia . "<br>" . $pdo->error;
        }

?>