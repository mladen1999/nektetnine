<?php
include('config/app.php');
include('codes/authentication_code.php');
$auth->isLoggedIn();

include("imports/header.php");
include("imports/nav.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php include('message.php') ?>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Ulogujte se</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Email:</label><br />
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Lozinka:</label><br />
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Ulogujte se</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("imports/footer.php");
?>
