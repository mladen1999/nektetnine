<?php
class FilterController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    
    public function index(){
        
        $tip = $_POST["tipNek"];
        $minCena = $_POST["cenaMin"];
        $maxCena = $_POST["cenaMax"];
        $drzava = $_POST["drzavaNek"];
        $kategorijaK = $_POST["kategorijaNek"];
        $kvadraturaMin = $_POST["kvadraturaMin"];
        $kvadraturaMax = $_POST["kvadraturaMax"];

        //$sql = "SELECT * FROM nekretnina_prodaja WHERE tip='$tip' AND drzava='$drzava' AND minCena BETWEEN $minCena AND $maxCena";
        $sql = "SELECT * FROM houses WHERE tip='$tip' AND kategorija='$kategorijaK' AND drzava='$drzava' AND cena BETWEEN $minCena AND $maxCena AND kvadratura BETWEEN $kvadraturaMin AND $kvadraturaMax";
    
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0) {
            //redirect(" ", "index.php");
            //redirect(" ", "index.php");
            return $result;
            
        } else {
            return false;
        }
        
    }


}

?>