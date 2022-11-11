<section class="sign-up-modal" id="sign-up-modal">
    <div class="modal-close-btn-wrapper">
        <i class="close-btn fa-solid fa-xmark"></i>
    </div>
    <div class="modal-body"> 
        <form id="sign-up-form" class="sign-up-form-wrapper" action="" method="GET">
            <h3 class="sign-up-form-title">Sign up</h3>
            <!-- First name and Last name inputs -->
            <div class="sign-up-form-input-wrapper">
                <input class="sign-up-form-input" id="new-first-name" type="text" name="new-first-name" placeholder="First name">
                <label class="sign-up-form-label" for="new-first-name">First name</label>
                <input class="sign-up-form-input" id="new-last-name" type="text" name="new-last-name" placeholder="Last name">
                <label class="sign-up-form-label2" for="new-last-name">Last name</label>
            </div>

            <!-- Date of Birth inputs -->

            <!-- Gender input -->

            <!-- Address input -->

            <!-- Email input -->
            <div class="sign-up-form-input-wrapper">
                <input class="sign-up-form-input" id="new-email" type="text" name="new-email" placeholder="Email">
                <label class="sign-up-form-label" for="new-email">Email</label>
                <!-- <div class="form-input-validation">
                    <i class="fa-solid fa-circle-exclamation"></i>Please enter an email
                </div> -->
            </div>

            <!-- Password input -->
            <div class="sign-up-form-input-wrapper">
                <input class="sign-up-form-input" id="new-password" type="password" name="new-password" placeholder="Password">
                <label class="sign-up-form-label" for="new-password">Password</label>
                <input class="sign-up-form-input" id="confirm-password" type="password" name="confirm-password" placeholder="Confirm">
                <label class="sign-up-form-label3" for="confirm-password">Confirm</label>
                <!-- <div class="form-input-validation">
                    <i class="fa-solid fa-circle-exclamation"></i>Please enter a password
                </div> -->
            </div>
            <input class="form-btn" type="submit" name="sign-up" value="Sign up">
        </form>
    </div>
    <div class="sign-up-modal-footer">
        <hr>
        <p>Already have an account? <a class="form-link" id="login-link">Login</a></p>
    </div>
</section>
