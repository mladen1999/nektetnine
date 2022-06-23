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
<div class="">
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <?php include('../message.php'); ?>
                <div class="card">
                <?php
                            $houseId = validateInput($db->conn, $_GET['id']);
                            $house1 = new HouseController;
                            $result1 = $house1->edit($houseId);
                            $house2 = new SeeController;
                            $result = $house2->asd($houseId);
                            if($result) {
                                if($result1) {
                                ?>
                    <div class="card-header">
                    <?php if($result1['tip'] == 'Prodaja') { 
                      $result1['tip'] = 'prodaje'?>
                      <h4>
                          Ova nekretnina se <?php echo $result1['tip']; ?>

                          
                      </h4>
                      <?php } else if($result1['tip'] == 'Iznajmljivanje') { 
                        $result1['tip'] = 'iznajmljuje'?>
                        
                        <h4>
                        Ova nekretnina se <?php echo $result1['tip']; ?>


                        </h4> <?php 
                      }
                          ?>
                    </div>
                    <div class="card-body w-100">
                    
                        
                                
                                <div class="row">
                                    <div style="border:1px solid #000; display:inline-block;"><img class="slikaKuce" src="uploads/<?= $result1['slika']; ?>" width = 300 height = 300 alt="image">    </div>
                                    <div class="divTwo" style="border:1px solid red; display:inline-block;" class="ml-5">
                                      <p class="pasus">Cena: <?php echo $result1['cena'] ?> &euro;</p>
                                      <p class="pasus">Kvadratura: <?php echo $result1['kvadratura'] ?> m²</p>
                                      <p class="pasus">Drzava: <?php echo $result1['drzava'] ?></p>
                                      <p class="pasus">Opis: <?php echo $result1['opis'] ?></p>
                                      <p class="pasus">Zakazite posetu ove kuce:</p>
                                      <form action="" method="POST">
                                      <a href="../schedule.php?id=<?= $result1['id'] ?>" class="btn btn-primary">Zakazi pregled</a>
                                      </form> 
                                      </div>
                                    
                                </div>  
                                <div class="pb-3"></div>
                                <hr>
                                <?php
                                
                                $row = mysqli_fetch_assoc($result);
                                   ?>
                                   
                                  
                                   <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'];?>">
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100 hoverImage" src="uploads/<?php echo $row['slikaK'] ?>" data-slide-to="0">
  </div>
  
</div>

<!-- Modal -->
<!-- 
This part is straight out of Bootstrap docs. Just a carousel inside a modal.
-->
<div class="modal fade imga1" id="exampleModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExample<?php echo $row['id'];?>" class="carousel slide" data-ride="carousel">
         
          <div class="carousel-inner fadein text-center">
            <?php 
              // display images from directory
              // directory path
              $dir = "uploads/";
              
              
              foreach($result as $row):
                if(in_array($row,array('.','..')))
                continue;
            ?>

            <img class="imga" src="uploads/<?php echo $row["slikaK"] ?>" alt="<?php echo $row ?>">

            <?php endforeach; ?>
            

          </div>
          <div id="buttons" class="text-center mt-2">
            <button id="prev" class="btn btn-info"><</button>
            <button id="next" class="btn btn-info">></button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Custom Styling Toggle. For demo purposes only. -->
<div class="switch-wrap ml-5">

  <span class="switch-text">Pogledajte galeriju.</span>
</div>

                                   



                                        
                                   <?php 
                                } 
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
<script>
  $('.fadein img:gt(0)').hide();
   
    
$( "#next" ).click(function() {
  $('.fadein img:first').fadeOut().next().fadeIn().end().appendTo('.fadein');
});
$( "#prev" ).click(function() {
  $('.fadein img:last').prependTo(".fadein").fadeIn().next().fadeOut();
});
   
</script>
</html>



