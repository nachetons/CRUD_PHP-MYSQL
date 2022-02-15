<?php
include 'conection.php';
$configPath='../config.json';
$objConnection=new Connection($configPath);
$objConnection->connectToDb();


if(!isset($_POST['oculto'])){
    exit();

}

$isbn = $_POST['isbn'];
$titulo = $_POST['title'];
$autor = $_POST['author'];
$stock = $_POST['stock'];
$precio = $_POST['price'];


$sentencia = $objConnection->connection->prepare("INSERT INTO book (isbn, title, author, stock, price) VALUES (?,?,?,?,?)");
$resultado = $sentencia->execute([$isbn, $titulo, $autor, $stock, $precio]);

if($resultado === TRUE){
    header('Location: ../index.php');
    }else{
        echo "Error: " . $sentencia . "<br>" . $pdo->error;
    }
?>