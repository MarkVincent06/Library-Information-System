<section class="modal" id="login-modal">
    <div class="modal-close-btn-wrapper">
        <i class="close-btn fa-solid fa-xmark" id="close-btn"></i>
    </div>
    <div class="modal-body"> 
        <form id="login-form" class="form-wrapper" action="" method="GET">
            <h3 class="form-title">Login</h3>
            <div class="form-input-wrapper">
                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                <input class="form-input" id="email" type="text" name="email" placeholder="Email">
                <div class="form-input-validation">Please enter an email</div>
            </div>
            <div class="form-input-wrapper">
                <label for="password"><i class="fa-solid fa-key"></i></label>
                <input class="form-input" id="password" type="password" name="password" placeholder="Password">
                <div class="form-input-validation">Please enter a password</div>
            </div>
            <div id="form-submit-validation">
            <i class="fa-solid fa-circle-exclamation"></i>A user with this email does not exist
            </div>
            <input class="form-login-btn" type="submit" name="login" value="Login">
            <a class="form-forgot-pass-link" href="#"><p>Forgot Password?</p></a>
        </form>
    </div>
    <div class="modal-footer">
        <hr>
        <p>Don't have an account? <a class="sign-up-link" href="">Create one</a></p>
    </div>
</section>

<!-- MODAL POPUP OVERLAY -->
<div id="modal-overlay"></div>

<!-- LOGIN MODAL POP-UP JS -->
<script src="js/log-in-modal-popup.js"></script>

<!-- FORM VALIDATION JS -->
<script src="js/form-validation.js"></script>