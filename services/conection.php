<?php
class Connection{
    private $user;
    private $password;
    private $dsn;
    private $db;
    public $connection;
    private $dbName;

    public function __construct($configPath){
        $configData=json_decode(file_get_contents($configPath),TRUE);
        $this->user=$configData["user"];
        $this->password=$configData["password"];
        $this->dsn=$configData["dbType"].':dbname='.$configData["dbName"].';host='.$configData["host"];
        $this->db=$configData["dbType"].':host='.$configData["host"];
        $this->dbName=$configData["dbName"];
    }

 

    public function connectToDb(){
        try {
            $connection=new PDO($this->dsn,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            $connection->prepare("USE {$this->dbName}")->execute();
            $this->connection=$connection;
            return $this->connection;
    
        }catch(Exception $error){
            if($error->getCode()=="1049"){
                //echo "No se ha encontrado la bbdd, se está creando una...";
                $connection=new PDO($this->db,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
                $query=$connection->prepare("CREATE DATABASE IF NOT EXISTS $this->dbName COLLATE utf8_spanish_ci")->execute();
                if($query){
                    $connection->prepare("USE {$this->dbName}")->execute();
                    $query = file_get_contents("libreria.sql");
                    $stmt = $connection->prepare($query);

                    if ($stmt->execute())
                          echo "No tenias base de datos asi que se creo una";
                    else 
                          echo "No se pudo generar la base de datos intentelo de forma manual";
                    $this->connection=$connection;
                    return $this->connection;
                    echo "Se está usando la bbdd correctamente";
                }else{
                    echo "No se ha podido crear la bbdd";
                }

            }else{
                echo "Ha ocurrido un error inesperado.";
                echo $error->getMessage();
            }
        }
    }
    
}
?>