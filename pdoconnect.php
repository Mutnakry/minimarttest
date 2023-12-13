
<?php

class PDOconnect{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbName = "minimart";
    public function connect(){
        try{
            
            $conn = new PDO('mysql:host='.$this->host .'; dbname='.$this->dbName, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }catch(PDOException $e){
            echo "error :" . $e->getMessage();
        }
    }

}

?>