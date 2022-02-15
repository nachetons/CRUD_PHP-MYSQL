<?php
    include 'conection.php';
    $configPath='../config.json';
    $objConnection=new Connection($configPath);
    $objConnection->connectToDb();


        $sentencia = $objConnection->connection->prepare("DROP DATABASE libreria");
        $resultado = $sentencia->execute();
    

    if($resultado === TRUE){
        header('Refresh:1; URL=../index.php');

                echo '<script language="javascript">alert("se a eliminado la base de datos se creara de nuevo");</script>';

            }else{
            echo "Error: " . $sentencia . "<br>" . $pdo->error;
        }

?>