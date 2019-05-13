<?php



class MySQLDB
{
    /** @var conn/mysqli**/
    private $conn;
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "n0m3l0";
    private $database = "db_tutorias";
    public static  $NO_DATA_ERROR = "no elements";
    public function connect()
    {

        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error){
            die("fallo la conexion: ".$this->conn->connect_error);
        }
        $this->conn->select_db($this->database);
        //echo "conectado";
    }

    public function Query($query){
        $this->connect();
        $result = $this->conn->query($query);

        //print_r($result);
        if (!$result){
            trigger_error('INVALIDO: '.$this->conn->error);
        }
        else if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $return[] = $row;
            }
        }else{
            $return = $this::$NO_DATA_ERROR;
        }

        return $return;
    }

    public function QueryCall($function){
        $this->connect();
        $result = $this->conn->query("CALL $function");
        if (!$result){
            print_r($result);
            trigger_error('INVALIDO: '.$this->conn->error);
        }
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $return[] = $row;
            }
        }else{
            $return = $this::$NO_DATA_ERROR;
        }

        return $return;
    }
    public function SQLCall($function){
        $this->connect();
        if ($this->conn->query("CALL $function") === TRUE){
            return true;
        }else{
            echo "ERROR: ".$function."<br>".$this->conn->error;
            return false;
        }
    }
    public function SQL($sql){
        $this->connect();
        if ($this->conn->query("$sql") === TRUE){
            return true;
        }else{
            echo "ERROR: ".$sql."<br>".$this->conn->error;
            return false;
        }
    }
    public function close()
    {

        $this->conn->close();
    }
}

class SQLServerDB {
    private $conn;
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "n0m3l0";
    private $database = "db_tutorias";
    public static  $NO_DATA_ERROR = "no elements";
    public function connect()
    {
        // TODO: Implement connect() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function Query($query)
    {
        // TODO: Implement Query() method.
    }
    public function SQL($sql){

    }
    public function QueryCall($function){

    }
    public function SQLCall($function){

    }
}