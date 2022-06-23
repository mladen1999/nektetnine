<?php
include("../config/app.php");
include_once('../controllers/ScheduleController.php');

if(isset($_POST['save_schedule'])){
    $inputData = [
        'houseId' => validateInput($db->conn,$_POST['houseId']),
        'name' => validateInput($db->conn,$_POST['name']),
        'surname' => validateInput($db->conn,$_POST['surname']),
        'email' => validateInput($db->conn,$_POST['email']),
        'number' => validateInput($db->conn,$_POST['number']),
    ];

    $schedule = new ScheduleController;
    $result = $schedule->create($inputData);
    //echo $result;
    if($result) {
        redirect("Vasa prijava je primljena. Uskoro ce Vas kontaktirati nas agent!", "index.php");
    } else {
        redirect("Doslo je do greske!", "index.php");
    }
}

if(isset($_POST['delete_btn'])) {
    $id = validateInput($db->conn, $_POST['delete_btn']);
    $schedule = new ScheduleController;
    $result = $schedule->delete($id);
    if($result) {
        redirect("Zakazani termin je uspesno izbrisan!", "admin/schedule-list.php");
    } else {
        redirect("Doslo je do greske!", "admin/schedule-list.php");
    }
}
?>