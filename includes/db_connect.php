<?php
// Db_connect functionality
require_once "config.php";
class DB {
    private $dbConn;
    public function __construct() {
        $this->dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->dbConn->connect_error) {
            die("Connection failed: " . $this->dbConn->connect_error);
        }
    }

    public function selectData($parameters, $table, $conditions = null){
        $query = "SELECT $parameters FROM $table";
        if ($conditions) {
            $query .= " WHERE $conditions";
        }
        $sql = $this->dbConn->query($query);
        if (!$sql){
            return json_encode(["Error" => "Query Failed: " . $this->dbConn->error]);
        }
        if ($sql->num_rows === 0) {
            return json_encode(["Error" => "No results found"]);
        }
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
    public function insertData($tableName, $keys, $values){
        $sql = "INSERT INTO $tableName ($keys) VALUES ($values)";
        $res = $this->dbConn->query($sql);
        return json_encode($res);
    }

    public function updateData($tableName, $keys, $values, $conditions){
        $sql = "UPDATE $tableName SET $keys=$values WHERE $conditions";
        $res = $this->dbConn->query($sql);
        return json_encode($res);
    }
    public function getDbConn(){
        return $this->dbConn;
    }

}
?>