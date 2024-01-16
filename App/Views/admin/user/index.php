<?php
// commented out code
global $context;
$user = $context->data;
$crumbs = getCrumbs();
?>

<style>
  #camera {
    position: absolute;
    display: flex;
    top: 15em;
    left: 20em;
  }

  .avatar {
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

<?php

$profile = isset($_SESSION['profile']) ?  $_SESSION['profile'] : array();
$avatar = isset($profile['location']) ? $profile['location'] : url('assets/img/profile/pro.png');


// profile objects
$user_id         = isset($user['user_id'])  ? $user['user_id'] : "";
$name       = isset($user['first_name']) ? $user['first_name'] : ""; 
$surname    = isset($user['last_name']) ? $user['last_name'] : "";
$email      = isset($user['email']) ? $user['email'] : "";
$telephone  = isset($user['mobile_number']) ? $user['mobile_number'] : "";
$address1   = isset($user['address_1']) ? $user['address_1'] : "";
$address2   = isset($user['address_2']) ? $user['address_2'] : "";
$town       = isset($user['town']) ? $user['town'] : "";
$city       = isset($user['city']) ? $user['city'] : "";
$postalCode = isset($user['postal_code']) ? $user['postal_code'] : "";


?>

<?php

echo'
<div class="row">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"></h4>
    </div>
    <form class="form" action="update" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="text-center">
                <div class=" avatar-xl">
                  <img src="' . $avatar . '" alt="Face 1">
                  <i class="bi bi-camera text-yellow" id="camera"></i>
                </div>
              </div>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="'.$user_id.'">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="basicInput">Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="'.$name.'">
                </div>

                <div class="form-group">
                  <label for="body">Email</label>
                  <input type="text" id="email" name="email" class="form-control" value="'.$email.'">
                </div>

                <div class="form-group">
                  <label for="body">Address</label>
                  <input type="text" id="address_1" name="address_1" class="form-control" value="'.$address1.'">
                </div>
                <div class="form-group">
                  <label for="helperText">Town</label>
                  <input type="text" id="town" name="town" class="form-control" value="'.$address2.'">
                </div>
                <div class="form-group">
                  <label for="helperText">Postal Code</label>
                  <input type="text" id="postal_code" name="postal_code" class="form-control" value="'.$postalCode.'">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="helperText">Surname</label>
                  <input type="text" id="last_name" name="last_name" class="form-control" value="'.$surname.'">
                </div>
                <div class="form-group">
                  <label for="helperText">Telephone</label>
                  <input type="number" id="mobile_number" name="mobile_number" class="form-control" value="'.$telephone.'">
                </div>

                <div class="form-group">
                  <label for="body">Adress 2</label>
                  <input type="text" id="address_2" name="address_2" class="form-control" value="'.$address2.'">
                </div>
                <div class="form-group">
                  <label for="helperText">City</label>
                  <input type="text" id="city" name="city" class="form-control" value="'.$city.'">
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-lg" onclick="handleSave()"> submit </button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>';
?>

<script>
  const cam = document.getElementById("camera");
  cam.addEventListener('click', () => {
    showAvatarModal();
  });
</script> 