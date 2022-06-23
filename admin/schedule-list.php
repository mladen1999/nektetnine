<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
include_once('codes/authentication.php');

$authenticated = new AuthenticationController;
$authenticated->admin();

include_once('../controllers/ScheduleController.php');

include("../imports/header.php");
include("../imports/nav.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <?php include('../message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Lista kuca</h4>
                    </div>
                    

                        <!-- -->

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Kuce</th>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Email</th>
                                        <th>Broj telefona</th>
                                        <th>Obrisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $schedule = new ScheduleController;
                                    $result = $schedule->index();
                                    if($result) {
                                        foreach($result as $row){
                                           ?>

                                           <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['houseId'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['surname'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                
                                                <td>
                                                    <!-- <a href="" class="btn btn-danger">Obrisi</a> -->
                                                    <form action="../codes/schedule.php" method="POST">
                                                        <button type="submit" name="delete_btn" value="<?= $row['id'] ?>" class="btn btn-danger">Obrisi</button>
                                                    </form>
                                                </td>
                                            </tr>

                                           <?php 
                                        }
                                    } else {
                                        echo "";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../imports/footer.php");
?>
