<?php
include_once('controllers/RegisterController.php');
include_once('controllers/LoginController.php');

$auth = new LoginController;

if(isset($_POST['logout_btn'])) {
    $checkedLoggedOut = $auth->logout();
    if($checkedLoggedOut) {
        redirect("Uspesno ste se odjavili", "login.php");
    }
}

if(isset($_POST['login_btn'])){
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

 
    $checkLogin = $auth->userLogin($email, $password);
    if($checkLogin) {
        if($_SESSION['auth_role'] == '1') {
            redirect("Uspesno ste se ulogovali", "admin/adminIndex.php");
        } else {
            redirect("Uspesno ste se ulogovali", "index.php");
        }
    } else {
        redirect("Uneli ste pogresne podatke", "login.php");
    }


}

if(isset($_POST['register_btn'])) {
    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);
    $confirm_password = validateInput($db->conn, $_POST['confirm_password']);

    $register = new RegisterController;
    $result_password = $register->confirmPassowrd($password, $confirm_password);
    if($result_password){
        $result_user = $register->isUserExists($email);
        if($result_user){
            redirect("Ovaj email se vec koristi.", "register.php");
        } else {
            $register_query= $register->registration($fname, $lname, $email, $password);
            if($register_query){
                redirect("Registracija je uspesna.", "login.php");
            } else {
                redirect("Registracija nije uspela.", "register.php");
            }
        }
    }else {
        redirect("Sifre se ne podudaraju.", "register.php");
    }
}

?>