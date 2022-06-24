<?php
include('config/app.php');
include('controllers/AuthenticationController.php');
include_once('codes/authentication_code.php');

$authenticated = new AuthenticationController;
//$authenticated->admin();

include_once('controllers/ScheduleController.php');

?>
<!DOCTYPE html>
<html lang="en">

    <?php include("imports/header.php"); ?>
    <?php include("imports/nav.php"); ?>

<body>
<div class="py-5">
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Zakazi pregled</h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['id'])){
                                $houseId = validateInput($db->conn, $_GET['id']);
                                $schedule = new ScheduleController;
                                $result = $schedule->edit($houseId);
                                if($result){
                                    ?>
                                
                                    
                        <form action="codes/schedule.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="">ID nekretnine:</label>
                                <input type="text" name="houseId" class="form-control" value="<?=$result['id'];?>" disabled/>
                            </div>
                            <div class="mb-3">
                                <label for="">Ime:</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Prezime:</label>
                                <input type="text" name="surname" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Email:</label>
                                <input type="text" name="email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Broj telefona:</label>
                                <input type="text" name="number" class="form-control" required />
                            </div>
                           
                            <div class="mb-3">
                                <button type="submit" name="save_schedule" class="btn btn-primary mr-5">Zakazi pregled</button>
                            </div>
                        </form>

                        <?php
                            } else {
                                echo "<h3>Nije pronadjena kuca!</h3>";
                            }
                        } else {
                            echo "<h3>Doslo je do greske!";
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
include("imports/footer.php");
?>
</html>