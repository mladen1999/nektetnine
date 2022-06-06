<?php
if(isset($_SESSION['message'])) {
    ?>
    <div class="alert alert-warning text-center" role="alert">
        <strong><?php echo $_SESSION['message']; ?></strong>
    </div>
    
    <?php   
    unset($_SESSION['message']);
}
?>
