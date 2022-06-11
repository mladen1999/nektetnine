<?php
include('../config/app.php');
include_once('../controllers/SearchController.php');



?>
<!DOCTYPE html>
<html lang="en">

    <?php include("../imports/header.php"); ?>
    <?php include("../imports/nav.php"); ?>

<body>

    <div class="container">
        

    <div class="row pt-3 pb-3">
            <div class="col-md-12">
                <?php include('../message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Dodaj kucu</h4>
                    </div>
                    <div class="card-body">
                        <form action="codes/house.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Tip:</label>
                                <input type="text" name="tipP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Kategorija:</label>
                                <input type="text" name="kategorijaP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Drzava:</label>
                                <input type="text" name="drzavaP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Cena:</label>
                                <input type="number" name="cenaP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Kvadratura:</label>
                                <input type="text" name="kvadraturaP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Dodaj opis kuce:</label>
                                <input type="text" name="opisP" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="">Izaberite sliku:</label>
                                <input type="file" name="house_image" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_player" class="btn btn-primary">Dodaj kucu</button>
                            </div>
                        </form>
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