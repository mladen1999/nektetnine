<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
include_once('codes/authentication.php');

$authenticated = new AuthenticationController;
$authenticated->admin();

include_once('controllers/HouseController.php');

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
                                        <th>Slika</th>
                                        <th>ID</th>
                                        <th>Tip</th>
                                        <th>Kategorija</th>
                                        <th>Drzava</th>
                                        <th>Cena</th>
                                        <th>Kvadratura</th>
                                        <th>Izmeni</th>
                                        <th>Obrisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $players = new HouseController;
                                    $result = $players->index();
                                    if($result) {
                                        foreach($result as $row){
                                           ?>

                                           <tr>
                                               <td>
                                                    <img id="v" name="v" src="uploads/<?php echo $row['slika'] ?>" width = 50 height = 50 alt="image" >
                                            
                                                    
                                                </td>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['tip'] ?></td>
                                                <td><?= $row['kategorija'] ?></td>
                                                <td><?= $row['drzava'] ?></td>
                                                <td><?= $row['cena'] ?></td>
                                                <td><?= $row['kvadratura'] ?></td>
                                                <td>
                                                    <a href="edit-house.php?id=<?= $row['id'] ?>" class="btn btn-primary">Izmeni</a>
                                                </td>
                                                <td>
                                                    <!-- <a href="" class="btn btn-danger">Obrisi</a> -->
                                                    <form action="codes/house.php" method="POST">
                                                        <button type="submit" name="delete_btn" value="<?= $row['id'] ?>" class="btn btn-danger">Obrisi</button>
                                                    </form>
                                                </td>
                                            </tr>

                                           <?php 
                                        }
                                    } else {
                                        echo "Nema kuca u bazi!";
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
