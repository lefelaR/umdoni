<?php
// commented out code
global $context;
$user = $context->data;
$crumbs = getCrumbs();
?>

<style>
  #camera{
    position: absolute;
    display: flex;
    top: 15em;
    left: 20em;
  }
  .avatar{
    width: 12em !important;
    height: 12em !important;
  }
</style>

<div class="row">
  <h1>
    User Profile
  </h1>
  <div class="col-12 col-md-12 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
      <ol class="breadcrumb">
        <?php
        foreach ($crumbs as $key => $crumb) {
          if ($key == (count($crumbs) - 1)) {
            $active = 'active';
            echo ' <li class="breadcrumb-item" ' . $active . ' aria-current="page">' . $crumb . '</li>  ';
          } else {
            $active = '';
            echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>';
          }
        }
        ?>
      </ol>
    </nav>
  </div>
</div>

<div class="row">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"></h4>
    </div>
    <form class="form" action="" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="text-center">
              <?php
              $profile = isset($_SESSION['profile']) ?  $_SESSION['profile'] : array();
              $avatar = isset($profile['location']) ? $profile['location'] : url('assets/img/profile/pro.png');
              echo '
            <div class=" avatar-xl">
              <img src="' . $avatar .'" alt="Face 1">
              <i class="bi bi-camera text-yellow" id="camera"></i>
            </div>';
              ?>
              </div>
            </div>

            <input type="hidden" id="id" name="id" value="">
            <div class="form-group">
              <label for="basicInput">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="form-group">
              <label for="helperText">Surname</label>
              <input type="text" id="surname" name="surname" class="form-control" value="">
            </div>
           
            <div class="form-group">
              <label for="body">Email</label>
              <input type="text" id="email" name="email" class="form-control" value="" >
           </div>
            <button class="btn btn-primary btn-lg" onclick="handleSave()"> submit </button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>

<script>
const cam = document.getElementById("camera");
cam.addEventListener('click',()=>{
  showAvatarModal();
});
</script>