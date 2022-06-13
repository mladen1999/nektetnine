<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
include_once('codes/authentication.php');

$authenticated = new AuthenticationController;
//$authenticated->admin();
include_once('controllers/HouseController.php');
include_once('controllers/SeeController.php');

?>
<!DOCTYPE html>
<html lang="en">

    <?php include("../imports/header.php"); ?>
    <?php include("../imports/nav.php"); ?>

<body>
<div class="py-5">
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <?php include('../message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Pregled kuce</h4>
                    </div>
                    <div class="card-body">
                    
                        <?php
                            $houseId = validateInput($db->conn, $_GET['id']);
                            $house1 = new HouseController;
                            $result1 = $house1->edit($houseId);
                            $players = new SeeController;
                            $result = $players->asd($houseId);
                            if($result) {
                                if($result1) {
                                ?>
                                <img src="uploads/<?= $result1['slika']; ?>" width = 150 height = 150 alt="image">    
                                <div></div>
                                <?php
                                foreach($result as $row){
                                   ?>
                                    
                                   <tr>
                                       <td>
                                            <img id="v" name="v" src="uploads/<?php echo $row['slikaK'] ?>" width = 50 height = 50 alt="image" >                    
                                        </td>
                                    </tr>
                                   <?php 
                                } }
                            } else {
                                echo "Ova kuca ne poseduje detaljniji opis!";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include("../imports/footer.php");
?>
</html>

