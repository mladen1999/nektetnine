<?php

include('config/app.php');
include('codes/authentication_code.php');
include_once('controllers/SearchController.php');
include_once('controllers/FilterController.php');
?>
<!DOCTYPE html>
<html lang="en">

    <?php include("imports/header.php"); ?>
    <?php include("imports/nav.php"); ?>

<body>

    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block carouselImages" src="<?php base_url('assets/images/houses/house1.png') ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carouselImages" src="<?php base_url('assets/images/houses/house2.png') ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carouselImages" src="<?php base_url('assets/images/houses/house3.png') ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>

        <hr>
        <!-- -->
        <?php include('message.php'); ?>
        <form action="" method="POST">
            
            <div class="container">
                <div class="row res1">
                    <div class="col-sm">
                        <div>Tip</div>
                        <!-- <select name="kategorijaNek" class="form-select form-control" aria-label="Default select example" required> -->
                        <select name="tipNek" class="form-select form-control" required>
                            <option selected value="">Tip</option>
                            <option value="Prodaja">Prodaja</option>
                            <option value="Iznajmljivanje">Iznajmljivanje</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <div>Kategorija</div>
                        <!-- <select name="kategorijaNek" class="form-select form-control" aria-label="Default select example" required> -->
                        <select name="kategorijaNek" class="form-select form-control" required>
                            <option selected value="">Kategorija</option>
                            <option value="Kuca">Kuce</option>
                            <option value="Stan">Stanovi</option>
                        </select>
                    </div>
                    <div class="col-sm">
                    <div>Drzava</div>
                        <select name="drzavaNek" class="form-select form-control" aria-label="Default select example" required>
                            <option selected value="">Drzava</option>
                            <option value="Srbija">Srbija</option>
                            <option value="CrnaGora">Crna Gora</option>
                        </select>
                        
                    </div>
                </div>
            </div>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-sm">
                        <label for="prodaja">Cena min</label><br>
                        <input class="form-control" type="number" id="cenaMin" name="cenaMin" value="cenaMin" required>
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">Cena max</label><br>
                        <input class="form-control" type="number" id="cenaMax" name="cenaMax" value="cenaMax" required>
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">m² min</label><br>
                        <input class="form-control" type="number" id="kvadraturaMin" name="kvadraturaMin" value="kvadraturaMin" required>
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">m² max</label><br>
                        <input class="form-control" type="number" id="kvadraturaMax" name="kvadraturaMax" value="kvadraturaMax" required>
                    </div>
                    <div class="col-sm pt-2 pb-5">
                        <label for="prodaja"></label><br>
                        <!-- <input type="submit" class="btn btn-warning w-100" name="submit"> -->
                        <button type="submit" name="filter_btn" class="btn btn-warning w-100">Pretrazi</button> 
                    </div>
                    
                </div>
            </div>


        </form>


        <?php include_once('codes/search.php'); ?>
        <?php include_once('codes/filter.php'); ?>
    </div>

    
    </div>
    


</body>
<?php
include("imports/footer.php");
?>
</html>