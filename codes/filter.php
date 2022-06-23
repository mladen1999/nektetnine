<?php

include_once('controllers/FilterController.php');
        if(isset($_POST['filter_btn'])){
            $filter = new FilterController;
            $result = $filter->index();
            
            if($result) {
                
                foreach($result as $rows){
                   ?>

        <div class=" galaxy-fold-open-your-device pb-5">
            <div class="card center1 " style="width: 18rem;">
                <img class="card-img-top" src="admin/uploads/<?php echo $rows['slika'] ?>" alt="Card image cap">
                <div class="card-body">
                    
                    <h5 class="card-title"><?php echo $rows['kategorija']; ?></h5>
                    <p class="card-text"><?php echo $rows['opis']; ?></p>
                    <a href="admin/see-house.php?id=<?= $rows['id'] ?>" class="btn btn-primary">Pogledaj kucu</a>
                </div>
            </div>
        </div>


        <?php 
                }
            } else {
                    echo "Taj podatak ne postoji u bazi!";
            } }
        ?>