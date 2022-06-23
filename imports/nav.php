<?php   

  $homeurl = 'index.php';
  $currentpage = $_SERVER['REQUEST_URI'];

  
?> 

<nav class="navbar navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="<?= base_url('index.php') ?>">
    <img src="<?php base_url('assets/images/nekretnine.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="Nekretnine">
    Nekretnine
  </a>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="<?= base_url('index.php') ?>">Nekretnine</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!--
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php') ?>">Pocetna strana <span class="sr-only">(current)</span></a>
      </li>
      -->
      <?php if(isset($_SESSION['authenticated'])) : ?>
        <?php if(isset($_SESSION['authenticated'])) {
              if($_SESSION['auth_role'] == 1) {
                ?>
                  <div class="dropdown show mr-1">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ADMIN KOMANDE
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="<?= base_url('admin/add-house.php') ?>">Dodaj kucu</a>
                      <a class="dropdown-item"  href="<?= base_url('admin/houses-list.php') ?>">Lista svih kuca</a>
                      <a class="dropdown-item" href="<?= base_url('admin/schedule-list.php') ?>">Lista zakazanih poseta</a>
                    </div>
                  </div>


      
                  
                <?php
                  }
                }
              ?>
      <li class="nav-item mr-1">
        <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_email'] ?>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <form action="" method="POST">
              <button type="submit" name="logout_btn" class="dropdown-item">Odjavite se</button> 
            </form>
          </div>
          </div>
      </li>
      
      
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('register.php') ?>">Registrujte se</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login.php') ?>">Ulogujte se</a>
      </li>
      <?php endif; ?>
      <?php
      if($currentpage == isHomepage()) {
        ?>
      <div class="divvv">
        <form action="" method="POST" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" name="search1" id="search1" type="text" placeholder="Search" aria-label="Search">
          <button type="submit" name="search_btn" class="btn btn-danger">Pretrazi</button> 
        </form>
      </div>
        <?php }
        ?>
    </ul>
    
    
    

  </div>
  <!--
  <form class="form-inline my-2 my-lg-0" action="" method="POST">
    <input class="form-control mr-sm-2" name="search1" id="search1" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" name="search_btn" type="submit">Search</button>
  </form>
      -->
  
  </div>
</nav>

