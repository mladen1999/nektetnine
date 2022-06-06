<?php
include_once('../controllers/LoginController.php');
$auth = new LoginController;

if(isset($_POST['logout_btn'])) {
    $checkedLoggedOut = $auth->logout();
    if($checkedLoggedOut) {
        redirect("Uspesno ste se odjavili", "login.php");
    }
}

?>