<?php

class SearchController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    
    public function index(){
        $tip = $_POST["search1"];
        $playerQuery = "SELECT * FROM nekretnina_prodaja WHERE id='$tip'";
        $result = $this->conn->query($playerQuery);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


}

?>