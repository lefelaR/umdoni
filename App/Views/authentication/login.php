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
                        <p class="auth-title h2 mx-auto">Log in.</p>
                        <p class="auth-subtitle mb-5 mx-auto">If you already have an account, login.</p>

                        <?php include('Includes/parts/alerts.php') ?>

                        <form id="login-form" action="authenticate" method="POST">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="email" class="form-control form-control-xl" name="username" placeholder="Email" required>
                                <div class="form-control-icon">
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left  input-group">
                                <input type="password" id="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                                <div class="form-control-icon">
                                </div>
                            </div>
                            <!-- <span class="fs-small" id="togglePassword">Show Password</span> -->
                            <div class="form-group position-relative has-icon-left  text-center">
                            <input class="btn main-btn btn-primary  btn-block mt-5 shadow" onclick="handleSave(event)" type="submit" name="submit" value="Log in">
                            </div>
                        </form>
                        <div class="text-center mt-5 font-weight-smaller">
                            <p class="text-gray-600">Don't have an account? <a href="signup" class="font-bold">Register</a>.</p>
                            <p>
                                <a class="font-bold" href="<?php echo buildurl('authentication/forgotpassword') ?>">Forgot password?</a>. |
                                <a class="font-bold" href="<?php echo buildurl('') ?>">home</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("togglePassword");
    togglePasswordButton.addEventListener("click", function() {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        togglePasswordButton.textContent = type === "password" ? "Show Password" : "Hide Password";
    });
}
</script>