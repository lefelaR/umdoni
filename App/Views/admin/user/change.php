<?php
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
      <p>A reset verification code will be sent to your email inbox when you request a code.</p>
    </div>
    <div class="m-3 ">
    <button class="btn btn-sm btn-primary" id="requestChange" onclick="handleRequestCode(event)"> 
        <span class="spinner-border spinner-border-sm" id="btn-spinner"  hidden  role="status" aria-hidden="true"></span>  
        <span>Request a code</span>
    </button>
    </div>
    <form class="form" action="reset" method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-10 col-sm-12">
              <div class="col-md-6">
              <div class="form-group">
                  <input type="username" id="username" name="username" class="form-control" hidden value="">
                </div>
                <div class="form-group">
                <label for="helperText">Code</label>
                <input type="number" id="code" name="code"  class="form-control" disabled value="">
              </div>
                <div class="form-group">
                  <label for="helperText">New Password</label>
                  <input type="password" id="password" name="password" autocomplete="current-password" class="form-control" disabled value="">
                </div>
               
              </div>
            <button class="btn btn-primary btn-sm" onclick="handleSave()"> Update </button>
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


  const handleRequestCode = async (event) => {
    event.preventDefault();
    document.getElementById('btn-spinner').removeAttribute('hidden');
    var request = document.getElementById('requestChange');
    request.setAttribute('disabled', 'dissabled');

    var username = "<?php echo $user['email']; ?>";
    if (username == 'unidentified') {
      Toastify({
        text: "Unable to request the code right now :(",
        duration: 3000,
        gravity: "bottom",
        position: "left",
        backgroundColor: "#f3616d;",
      }).showToast();
      return;
    } else {
      const formData = new FormData();
      formData.append('username', username);
      const currentURL = window.location.href;
      const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
      var code = document.getElementById('code');
      var password = document.getElementById('password');

      fetch(stripped + '/requestchange', {
          method: 'POST',
          body: formData,
        }).then((response) => {
          document.getElementById('btn-spinner').setAttribute('hidden', "hidden")
          document.getElementById('username')
          Toastify({
            text: "a code has been sent to your email!",
            duration: 3000,
            gravity: "bottom",
            position: "left",
            backgroundColor: "#4fbe87",
          }).showToast();
          password.removeAttribute('disabled');
          code.removeAttribute('disabled');
      
        })
        .catch((error) => {
          Toastify({
            text: "Unable to send the code!",
            duration: 3000,
            gravity: "bottom",
            position: "left",
            backgroundColor: "#f3616d;",
          }).showToast();
          console.log(error);
        })
    }

  }
</script>