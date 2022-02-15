<?php

if (!isset($_GET['id'])) {

    header('Location: index.php');

}else{
    include '../services/conection.php';
    $configPath='../config.json';
    $objConnection=new Connection($configPath);
    $objConnection->connectToDb();
    $id = $_GET['id'];
    $sentencia = $objConnection->connection->prepare("SELECT * FROM book WHERE id = ?");
    $sentencia->execute([$id]);
    $libro = $sentencia->fetch(PDO::FETCH_OBJ);


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Editar libro:</h3>
    <form method="POST" action="../services/editarProceso.php">
        <table>
            <tr>
                <td>ISBN</td>
                <td><input type="text" name="txtisbn" value="<?php echo $libro->isbn; ?>"></td>
            </tr>
            <tr>
                <td>Titulo</td>
                <td><input type="text" name="txttitle" value="<?php echo $libro->title; ?>"></td>
            </tr>
            <tr>
                <td>Autor</td>
                <td><input type="text" name="txtauthor" value="<?php echo $libro->author; ?>"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="text" name="txtstock" value="<?php echo $libro->stock; ?>"></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="text" name="txtprice" value="<?php echo $libro->price; ?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="oculto">
                <input type="hidden" name="txtid" value="<?php echo $libro->id; ?>">

                <td colspan="2"><input type="submit" name="price" value="EDITAR LIBRO"></td>
            </tr>



        </table>
    </form>
</body>
</html>