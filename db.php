<?php 

class BD{
    private $host;
    private $user;
    private $password;
    private $port;
    private $db;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "luisnunura123456";
        $this->port = "3307";
        $this->db = "colegio";
    }
    function connect(){
        try {
            $conn = new PDO("mysql:host=$this->host:$this->port;dbname=$this->db",$this->user,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn; 
        } catch (Exception $ex) {
            echo "error en conexion".$ex->getMessage();
            return null;
        }
    }
    function sentencia($sql){
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchall(PDO::FETCH_NUM);
        if($row!=null){
            return $row;
        }
        else{
            return null;
        }
    }
    function ejecucion($sql){
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    
}

?>