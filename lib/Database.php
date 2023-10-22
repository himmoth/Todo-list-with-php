<?php
class Database{
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $dbname = DBNAME;
    private $conn;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Set DSN 
       
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        // Set options 
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{

            $this->conn = new PDO($dsn, $this->user, $this->password, $options);

        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resulSet()
    {
        $this->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function single()
    {
        $this->execute();
        $row = $this->stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}
