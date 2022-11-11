<section class="login-modal" id="login-modal">
    <div class="modal-close-btn-wrapper">
        <i class="close-btn fa-solid fa-xmark" id="close-btn"></i>
    </div>
    <div class="modal-body"> 
        <form id="login-form" class="login-form-wrapper" action="" method="GET">
            <h3 class="login-form-title">Login</h3>
            <div class="login-form-input-wrapper">
                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                <input class="login-form-input" id="email" type="text" name="email" placeholder="Email">
                <div class="form-input-validation">
                    <i class="fa-solid fa-circle-exclamation"></i>Please enter an email
                </div>
            </div>
            <div class="login-form-input-wrapper">
                <label for="password"><i class="fa-solid fa-key"></i></label>
                <input class="login-form-input" id="password" type="password" name="password" placeholder="Password">
                <div class="form-input-validation">
                    <i class="fa-solid fa-circle-exclamation"></i>Please enter a password
                </div>
            </div>
            <div id="form-login-validation">
                <i class="fa-solid fa-circle-exclamation"></i>A user with this email does not exist
            </div>
            <input class="form-btn" type="submit" name="login" value="Login">
            <a class="form-link" href="#"><p>Forgot Password?</p></a>
        </form>
    </div>
    <div class="login-modal-footer">
        <hr>
        <p>Don't have an account? <a class="form-link" id="sign-up-link">Create one</a></p>
    </div>
</section>

<!-- MODAL POPUP OVERLAY -->
<div id="login-modal-overlay"></div>
