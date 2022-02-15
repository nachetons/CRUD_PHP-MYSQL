<?php

include "services/conection.php";
$configPath='config.json';
$objConnection=new Connection($configPath);
$objConnection->connectToDb();
//if not exist database dont select


$libros = $objConnection->connection->query("SELECT * FROM book")->fetchAll(PDO::FETCH_OBJ);
//print_r($libros[1]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Lista de Libros</h3>
    <table class='table1'>
        <tr>
        <td>ID</td>
        <td>ISBN</td>
        <td>TITULO</td>
        <td>AUTOR</td>
        <td>STOCK</td>
        <td>PRECIO</td>

        </tr>

        <?php 
        foreach($libros as $libro){
            echo "<tr>";
            echo "<td>".$libro->id."</td>";
            echo "<td>".$libro->isbn."</td>";
            echo "<td>".$libro->title."</td>";
            echo "<td>".$libro->author."</td>";
            echo "<td>".$libro->stock."</td>";
            echo "<td>".$libro->price."</td>";
            echo "<td class='boton_big'><a class='button' href='pages/editar.php?id=$libro->id'>Editar</a></td>";
            echo "<td class='boton_big'><a class='button' href='services/eliminar.php?id=$libro->id'>Eliminar</a></td>";
            echo "</tr>";
        }
        
        ?>
    </table>

    <button class="button" onclick="location.href='services/eliminarTodo.php'">Eliminar Todos los Registros</button>
    <button class="button" onclick="location.href='services/eliminarCrear.php'">Eliminar y crear de nuevo</button>



    <hr>
    <h3>Ingresar libros: </h3>
    <form method="POST" action="services/insertar.php">
        <table>
            <tr>
                <td>ISBN</td>
                <td><input type="text" name="isbn"></td>
            </tr>
            <tr>
                <td>TITULO</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>AUTOR</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>STOCK</td>
                <td><input type="text" name="stock"></td>
            </tr>
            <tr>
                <td>PRECIO</td>
                <td><input type="text" name="price"></td>
            </tr>
            <input type="hidden" name="oculto" value="1"></input>
            <tr>
                <td colspan="2"class='padre'><input type="reset" name=""><input type="submit" value="Insertar libro"></td>
            </tr>





        </table>
    </form>
</body>
</html>



