<?php
include 'conection.php';

$configPath='../config.json';
$objConnection=new Connection($configPath);
$objConnection->connectToDb();

if(!isset($_POST['oculto'])){

    header('Location: index.php');
}


$id = $_POST['txtid'];
$isbn = $_POST['txtisbn'];
$titulo = $_POST['txttitle'];
$autor = $_POST['txtauthor'];
$stock = $_POST['txtstock'];
$precio = $_POST['txtprice'];



$sentencia = $objConnection->connection->prepare("UPDATE book SET isbn = ?, title = ?, author = ?, stock = ?, price = ? WHERE id = ?");
$resultado = $sentencia->execute([$isbn, $titulo, $autor, $stock, $precio, $id]);


if($resultado === TRUE){
    header('Location: ../index.php');
    }else{
        echo "Error: " . $sentencia . "<br>" . $pdo->error;
    }
?>