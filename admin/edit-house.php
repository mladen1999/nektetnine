<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
include_once('codes/authentication.php');

$authenticated = new AuthenticationController;
//$authenticated->admin();

include_once('controllers/HouseController.php');

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
                        <h4>Izmeni kucu</h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['id'])){
                                $houseId = validateInput($db->conn, $_GET['id']);
                                $house = new HouseController;
                                $result = $house->edit($houseId);
                                if($result){
                                    ?>
                                
                                    
                        <form action="codes/house.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="houseId" value="<?=$result['id'];?>">

                            <div class="mb-3">
                                <label for="">Tip:</label>
                                <input type="text" name="tipP" value="<?= $result['tip']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Kategorija:</label>
                                <input type="text" name="kategorijaP" value="<?= $result['kategorija']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Drzava:</label>
                                <input type="text" name="drzavaP" value="<?= $result['drzava']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Cena:</label>
                                <input type="number" name="cenaP" value="<?= $result['cena']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Kvadratura:</label>
                                <input type="number" name="kvadraturaP" value="<?= $result['kvadratura']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Dodaj opis kuce:</label>
                                <input type="text" name="opisP" value="<?= $result['opis']; ?>" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Izaberite sliku:</label>
                                <input type="file" name="house_image" class="form-control" accept="image/*">
                                <input type="text" name="house_image_old" value="<?= $result['slika']; ?>" class="form-control"  />
                            </div>
                            <div class="mb-3 ml-3">
                                <label>Slika kuce:</label><br />
                                <img src="uploads/<?= $result['slika']; ?>" width = 100 height = 100 alt="image">            
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_house" class="btn btn-primary mr-5">Izmeni kucu</button>

                                <input type="hidden" name="detele_id" value="<?=$result['id'];?>">
                                <input type="hidden" name="del_house_image" value="<?= $result['slika']; ?>">
                                <button type="submit" name="delete_house_image" class="btn btn-danger">Izbrisi sliku kuce</button>
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
include("../imports/footer.php");
?>
</html>