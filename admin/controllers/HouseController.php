<?php

class HouseController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    
    public function index(){
        $playerQuery = "SELECT * FROM houses";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
/*
    public function goalkeepers(){
        $playerQuery = "SELECT * FROM players WHERE pozicija='golman' LIMIT 2";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
*/

/*
    public function defenders(){
        $playerQuery = "SELECT * FROM players WHERE pozicija='odbrana'";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function midfielders(){
        $playerQuery = "SELECT * FROM players WHERE pozicija='sredina'";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function forwards(){
        $playerQuery = "SELECT * FROM players WHERE pozicija='napad'";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
*/


    public function create($inputData){
        $data = "'" . implode ( "','", $inputData) . "'";
        //echo $data;

        $playerQuery = "INSERT INTO houses(tip, kategorija, drzava, cena, kvadratura, slika) VALUES ($data)";
        $result = $this->conn->query($playerQuery);
        if($result) {
            return true;
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

    public function update($inputData, $id) {
        $houseId = validateInput($this->conn, $id);
        $tipP = $inputData['tipP'];
        $kategorijaP = $inputData['kategorijaP'];
        $drzavaP = $inputData['drzavaP'];
        $cenaP = $inputData['cenaP'];
        $kvadraturaP = $inputData['kvadraturaP'];
        $image = $inputData['player_image'];
        $playerUpdateQuery = "UPDATE houses SET id='$houseId', tip='$tipP', kategorija='$kategorijaP', drzava='$drzavaP', cena='$cenaP', kvadratura='$kvadraturaP', slika='$image' WHERE id='$houseId' LIMIT 1";
        //$playerUpdateQuery = "UPDATE houses SET id='houseId', tip='$tip', "
        //$playerUpdateQuery = "DELETE FROM houses WHERE id='$houseId' LIMIT 1";
        //echo $playerUpdateQuery;
        //exit();
        $result = $this->conn->query($playerUpdateQuery);
        
        if($result) {
            
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $playerId = validateInput($this->conn, $id);
        $playerDeleteQuery = "DELETE FROM players WHERE id='$playerId' LIMIT 1";
        $result = $this->conn->query($playerDeleteQuery);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>