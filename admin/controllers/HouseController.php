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

    public function create($inputData){
        $data = "'" . implode ( "','", $inputData) . "'";
        //echo $data;

        $playerQuery = "INSERT INTO houses(tip, kategorija, drzava, cena, kvadratura, slika, opis) VALUES ($data)";
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
        $image = $inputData['house_image'];
        $opisP = $inputData['opisP'];
        $playerUpdateQuery = "UPDATE houses SET id='$houseId', tip='$tipP', kategorija='$kategorijaP', drzava='$drzavaP', cena='$cenaP', kvadratura='$kvadraturaP', slika='$image', opis='$opisP' WHERE id='$houseId' LIMIT 1";

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
        $houseId = validateInput($this->conn, $id);
        $houseDeleteQuery = "DELETE FROM houses WHERE id='$houseId' LIMIT 1";
        $result = $this->conn->query($houseDeleteQuery);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>