<?php
include_once '../Components/Helpers.php';
global $context;
if (isset($context->errors['message'])) {
    echo 'session avail;';
}
?>
<style>
    #auth-right {
        background-image: url('../public/assets/img/entrance.jpg');
        object-fit: contain;
        overflow: hidden;
        background-repeat: no-repeat;
        background-size: cover;
        height: fit-content;
    }

    #auth {
        position: absolute;
        min-height: 100% !important;
        display: grid;
    }
</style>

<div id="auth" class="container-fluid ">
    <div class="row h-100" id="auth-right">
        <div class="col-lg-12 col-md-16 col-sm-12 col">
            <div class="row align-items-center justify-content-center ">
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <div class="card shadow p-5 sm-5 my-5 bg-white rounded ">

                        <div class="auth-logo text-center">
                            <img src="<?php echo url("assets/img/icon/logo.png")
                                        ?>" class="logo" class="logo" style="width: 90px;
                        position: relative;" />
                        </div>

                        <p class="auth-title h2 mx-auto">Verify Email</p>
                        <p class="auth-subtitle mb-5 mx-auto">The verification code will be provided to you via email.</p>

                        <?php include ('Includes/parts/alerts.php') ?>

                        <form id="login-form" action="verify" method="POST">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" name="username" placeholder="Email" required>
                               
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4 input-group">
                                <input type="password" class="form-control form-control-xl" name="code" placeholder="code" required data-toggle="tooltip" data-placement="top" title="You should have recieved an email with your code.">
                                <div class="form-control-icon">

                                </div>
                            </div>
                            <input class="btn main-btn btn-primary btn-md btn-block shadow-lg mt-5" type="submit" name="submit" value="Verify Email">
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>