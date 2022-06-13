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
                        <td>
                            <a href="admin/edit-house.php?id=<?= $row['id'] ?>" class="btn btn-primary">Izmeni</a>
                            
                        </td>
                        <h5 class="card-title"><?php echo $row['slika']; ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>


        <?php 
                }
            } else {
                    echo "Taj podatak ne postoji u bazi!";
            } }
        ?>