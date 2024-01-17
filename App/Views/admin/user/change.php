<?php
// commented out code
global $context;
$user = $context->data;
$crumbs = getCrumbs();
?>

<style>
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


echo '
<div class="row">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">
      Update your password
      </h4>
      <p>A reset verification code will be sent your email inbox when you request.</p>
    </div>
    <div class="m-3 ">
    <button class="btn btn-sm btn-primary" id="camera" onclick="handleRequestCode(event)"> Request a code</button>
    </div>
    <form class="form" action="chnage" method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-10 col-sm-12">
              <div class="col-md-6">
              
                <div class="form-group">
                  <label for="helperText">Password</label>
                  <input type="password" id="last_name" name="last_name" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="helperText">Code</label>
                  <input type="number" id="mobile_number" name="mobile_number" class="form-control" value="">
                </div>

              </div>
           
            <button class="btn btn-primary btn-lg" onclick="handleSave()"> Update </button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>';
?>

<script>
  const handleAvatar = (event) => {
    event.preventDefault();
      showAvatarModal();
  }
  const handlePassword = (event) => {
    event.preventDefault();
      showPasswordModal();
  }
</script>