<nav class="navbar navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">
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
    <a class="navbar-brand" href="#">Hidden brand</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['authenticated'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <form action="" method="POST">
        <button type="submit" name="logout_btn" class="btn btn-danger">Odjavite se</button> 
      </form>
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('register.php') ?>">Registrujte se</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login.php') ?>">Ulogujte se</a>
      </li>
    </ul>
    
    <?php endif; ?>
    



  </div>
  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>