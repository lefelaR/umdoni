<div id="alert" class="row  d-flex justify-content-center">
<?php
if (isset($_SESSION['error'])) {
    $text = 'danger';
?>

        <div class="col-md-8">
            <div class="alert alert-light-danger alert-danger color-danger text-center" role="alert">
                <p class="text-<?php echo $text ?> fw-normal">
                <?php echo  $_SESSION['error']['message']; ?>
                </p>
            </div>
        </div>
    <?php
} else if (isset($_SESSION['success'])) {
    $text = 'success';
    ?>
        <div class="col-md-8">
            <div class="alert alert-light-success alert-success color-success" role="alert">
              
                <p class="text-<?php echo $text ?> fw-normal">
                <?php echo $_SESSION['success']['message']; ?>
</p>
            </div>
        </div>
<?php
}
unset($_SESSION['success']);
unset($_SESSION['error']);
?>
</div>
<script>
     document.addEventListener("DOMContentLoaded", function() {
    var alert = document.getElementById("alert");
    setTimeout(function() {
      alert.classList.add("visually-hidden");
    }, 6000);

})
</script>