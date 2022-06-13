<?php

include_once('controllers/SearchController.php');
        if(isset($_POST['search_btn'])){
            $search = new SearchController;
            $result = $search->index();
            
            if($result) {
                
                foreach($result as $row){
                   ?>

            <div class="col galaxy-fold-open-your-device pb-5">
                <div class="card center1 " style="width: 18rem;">
                    <img class="card-img-top" src="admin/uploads/<?php echo $row['slika'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['kategorija']; ?></h5>
                        <p class="card-text"><?php echo $row['opis']; ?></p>
                        <a href="admin/see-house.php?id=<?= $row['id'] ?>" class="btn btn-primary">Pogledaj detaljnije</a>
                    </div>
                </div>
            </div>


        <?php 
                }
            } else {
                    echo "Taj podatak ne postoji u bazi!";
            } }
        ?>