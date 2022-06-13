<?php
include("../../config/app.php");
include_once('../controllers/HouseController.php');

if(isset($_POST['delete_btn'])) {
    $id = validateInput($db->conn, $_POST['delete_btn']);
    $house = new HouseController;
    $result = $house->delete($id);
    if($result) {
        redirect("Kuca je uspesno obrisana!", "admin/houses-list.php");
    } else {
        redirect("Doslo je do greske!", "admin/houses-list.php");
    }
}

if(isset($_POST['update_house'])){
    $id = validateInput($db->conn,$_POST['houseId']);
    $inputData = [
        'tipP' => validateInput($db->conn,$_POST['tipP']),
        'kategorijaP' => validateInput($db->conn,$_POST['kategorijaP']),
        'drzavaP' => validateInput($db->conn,$_POST['drzavaP']),
        'cenaP' => validateInput($db->conn,$_POST['cenaP']),
        'kvadraturaP' => validateInput($db->conn,$_POST['kvadraturaP']),
        'house_image' => validateInput($db->conn,$_FILES['house_image']['name']),
        
    ];
    
    $allow_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['house_image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension, $allow_extension)) {
        redirect ("Mozete koristiti sledece formate: jpg, png, jpeg i gif !", "admin/edit-house.php?id=$id");
    } else {
        if(file_exists("../uploads/" . $_FILES['house_image']['name'])) {
            $filename = $_FILES['house_image']['name'];
            redirect ("Slika ".$filename." vec postoji!", "admin/edit-house.php?id=$id");
        } else {
            $player = new HouseController;
            $result = $player->update($inputData, $id);
            //echo $result;
            //exit();
            if($result) {
                move_uploaded_file($_FILES["house_image"]["tmp_name"], "../uploads/".$_FILES["house_image"]["name"]);
                redirect("Podaci su uspesno izmenjeni!", "index.php");
            } else {
                redirect("Doslo je do greske!", "admin/edit-house.php");
                
            }
        }
    }

}

if(isset($_POST['save_player'])){
    $inputData = [
        'P' => validateInput($db->conn,$_POST['tipP']),
        'kategorija' => validateInput($db->conn,$_POST['kategorijaP']),
        'drzava' => validateInput($db->conn,$_POST['drzavaP']),
        'cena' => validateInput($db->conn,$_POST['cenaP']),
        'kvadratura' => validateInput($db->conn,$_POST['kvadraturaP']),
        'house_image' => validateInput($db->conn,$_FILES['house_image']['name']),
        'opis' => validateInput($db->conn,$_POST['opisP']),
    ];

    $house = new HouseController;
    $result = $house->create($inputData);
    //echo $result;
    if($result) {
        move_uploaded_file($_FILES["house_image"]["tmp_name"], "../uploads/".$_FILES["house_image"]["name"]);
        redirect("Kuca je uspesno dodata!", "admin/houses-list.php");
    } else {
        redirect("Doslo je do greske!", "admin/houses-list.php");
    }
}

if(isset($_POST['delete_house_image'])) {
    $id = $_POST['detele_id'];
    $del_house_image = $_POST['del_house_image'];
    $sql = "UPDATE houses SET slika='nekretnine.png' WHERE id='$id' ";
    $query = mysqli_query($db->conn, $sql);
    $nop = 'nekretnine.png';
    if($query && $del_house_image!=$nop) {
        unlink("../uploads/".$del_house_image);
        redirect ("Slika je izbisana", "admin/edit-house.php?id=$id");
    } else {

        redirect ("Slika nije izbisana", "admin/edit-house.php?id=$id");
    }
}

?>