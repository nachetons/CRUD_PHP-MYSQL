<?php
    include 'conection.php';
    $configPath='../config.json';
    $objConnection=new Connection($configPath);
    $objConnection->connectToDb();


        $sentencia = $objConnection->connection->prepare("DELETE FROM book");
        $resultado = $sentencia->execute();
    

    if($resultado === TRUE){
        header('Refresh:1; URL=../index.php');

                echo '<script language="javascript">alert("se a eliminado toda la base de datos");</script>';

            }else{
            echo "Error: " . $sentencia . "<br>" . $pdo->error;
        }

?>