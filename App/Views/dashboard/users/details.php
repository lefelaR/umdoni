<?php
//details.php
global $context;
$data = $context->data; //method to get user details
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
    User Details
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
//Display user details
echo '<div class="container">';

//add code to display user details based on $userDetails
echo'</div>';

$profile = isset($_SESSION['profile']) ?  $_SESSION['profile'] : array();
$avatar = isset($data['location']) ? $data['location'] : url('assets/img/profile/pro.png');


// profile objects
$user_id         = isset($data['user_id'])  ? $data['user_id'] : $profile['user_id'];
$name       = isset($data['first_name']) ? $data['first_name'] : "";
$surname    = isset($data['last_name']) ? $data['last_name'] : "";
$email      = isset($data['email']) ? $data['email'] : "";
$telephone  = isset($data['mobile_number']) ? $data['mobile_number'] : "";
$address1   = isset($data['address_1']) ? $data['address_1'] : "";
$address2   = isset($data['address_2']) ? $data['address_2'] : "";
$town       = isset($data['town']) ? $data['town'] : "";
$city       = isset($data['city']) ? $data['city'] : "";
$postalCode = isset($data['postal_code']) ? $data['postal_code'] : "";



echo '
<div class="row">
  <div class="card">
    <div class="card-header">
      <p class="card-title">
      User Details
      </p>
    </div>
    <form class="form" action="update" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-10 col-sm-12">
            <div class="form-group">
              <div class="text-center">
                <div class=" avatar-xl">
                  <img src="' . $avatar . '" alt="Face 1" class="rounded-circle" style="max-width:200px">
                 
                 
                </div>
              </div>
            </div>

            
            <div class="row">
              <div class="col-md-6">
              <input type="hidden" id="user_id" name="user_id" value="' . $user_id . '">
                <div class="form-group">
                  <label for="basicInput">Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="' . $name . '">
                </div>

                <div class="form-group">
                  <label for="body">Email</label>
                  <input type="text" id="email" name="email" class="form-control" value="' . $email . '">
                </div>

                <div class="form-group">
                  <label for="body">Address</label>
                  <input type="text" id="address_1" name="address_1" class="form-control" value="' . $address1 . '">
                </div>
                <div class="form-group">
                  <label for="helperText">Town</label>
                  <input type="text" id="town" name="town" class="form-control" value="' . $town . '">
                </div>
                <div class="form-group">
                  <label for="helperText">Postal Code</label>
                  <input type="text" id="postal_code" name="postal_code" class="form-control" value="' . $postalCode . '">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="helperText">Surname</label>
                  <input type="text" id="last_name" name="last_name" class="form-control" value="' . $surname . '">
                </div>
                <div class="form-group">
                  <label for="helperText">Telephone</label>
                  <input type="number" id="mobile_number" name="mobile_number" class="form-control" value="' . $telephone . '">
                </div>

                <div class="form-group">
                  <label for="body">Adress 2</label>
                  <input type="text" id="address_2" name="address_2" class="form-control" value="' . $address2 . '">
                </div>
                <div class="form-group">
                  <label for="helperText">City</label>
                  <input type="text" id="city" name="city" class="form-control" value="' . $city . '">
                </div>
              </div>
            </div>
         
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