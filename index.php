<?php
// https://www.nekretnine.rs/ 
// https://zellwk.com/blog/how-to-write-mobile-first-css/ 
// https://www.youtube.com/watch?v=-U5dEdWouDY 
include('config/app.php');
include('codes/authentication_code.php');
include_once('controllers/SearchController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("imports/header.php"); ?>
    <?php include("imports/nav.php"); ?>
</head>
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
        <form action="" method="POST">
            
            <div class="container">
                <div class="row res1">
                    <div class="col-sm">
                        <input type="radio" id="radioProdaja" name="radioButton" value="Prodaja">
                        <label for="prodaja">Prodaja</label><br>
                        <input type="radio" id="radioIzdavanje" name="radioButton" value="Izdavanje">
                        <label for="izdavanje">Izdavanje</label><br>
                    </div>
                    <div class="col-sm">
                        <div>Kategorija</div>
                        <select name="kategorijaNek" class="form-select form-control" aria-label="Default select example">
                            <option selected>Kategorija</option>
                            <option value="Kuce">Kuce</option>
                            <option value="Stanovi">Stanovi</option>
                        </select>
                    </div>
                    <div class="col-sm">
                    <div>Drzava</div>
                        <select name="drzavaNek" class="form-select form-control" aria-label="Default select example">
                            <option selected>Drzava</option>
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
                        <input class="form-control" type="number" id="cenaMin" name="cenaMin" value="cenaMin">
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">Cena max</label><br>
                        <input class="form-control" type="number" id="cenaMax" name="cenaMax" value="cenaMax">
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">m² min</label><br>
                        <input class="form-control" type="number" id="kvadraturaMin" name="kvadraturaMin" value="kvadraturaMin">
                    </div>
                    <div class="col-sm">
                        <label for="prodaja">m² max</label><br>
                        <input class="form-control" type="number" id="kvadraturaMax" name="kvadraturaMax" value="kvadraturaMax">
                    </div>
                    <div class="col-sm pt-2 pb-5">
                        <label for="prodaja"></label><br>
                        <input type="submit" class="btn btn-warning w-100" name="submit">
                    </div>
                    
                </div>
            </div>


        </form>


        <?php
        if(isset($_POST['search_btn'])){
            $search = new SearchController;
            $result = $search->index();
            if($result) {
                foreach($result as $row){
                   ?>

                <td><?= $row['drzava'] ?></td>


        <?php 
                }
            } else {
                    echo "Taj podatak ne postoji u bazi!";
            } }
        ?>

    </div>
    
</body>
<?php
include("imports/footer.php");
?>
</html>

<?php

$host = "localhost:3307";
$user = "root";
$password = "";
$db = "nekretnine";
// Create connection
$data = mysqli_connect($host, $user, $password, $db);
// Check connection
if($data===false){
    die("Konekcija nije uspela: " . connection_aborted);
}

if (isset($_POST["submit"])) {
    $tip = $_POST["radioButton"];
    $minCena = $_POST["cenaMin"];
    $maxCena = $_POST["cenaMax"];
    $drzava = $_POST["drzavaNek"];
    $sql = "SELECT * FROM nekretnina_prodaja WHERE tip='$tip' AND drzava='$drzava' AND minCena BETWEEN $minCena AND $maxCena";
    $result = mysqli_query($data,$sql);
    ?>
    <div class="container pt-5">
    <?php
            while($rows=mysqli_fetch_assoc($result)){
        ?>
        
        <div class="container galaxy-fold-open-your-device">
            <div class="card center1 " style="width: 18rem;">
                <img class="card-img-top" src="assets/images/houses/house1.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['slika']; ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <?php
          }
        ?>
    <?php
}
?>

