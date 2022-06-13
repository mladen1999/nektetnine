<?php

class SeeController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    
    public function index(){
        $playerQuery = "SELECT * FROM images";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function asd($id){
        $kucaId = validateInput($this->conn, $id);
        $playerQuery = "SELECT * FROM images WHERE idKuce='$kucaId'";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function indexx($id){
        $kucaId = validateInput($this->conn, $id);
        //echo $kucaId;
        //exit();
        $playerQuery = "SELECT * FROM images WHERE idKuce='$kucaId'";
        
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0){
            while ($row = $result -> fetch_row()) {
            $data = $result->fetch_assoc();
            return $data; }
        } else {
            return false;
        }
    }

    public function edit($id){
        $houseId = validateInput($this->conn, $id);
        $playerQuery = "SELECT * FROM houses WHERE id='$houseId' LIMIT 1";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }
    
}

?>