<?php
    // This is where we get the data of the user after they submitted the form
    if(isset($_POST['sign-up'])) {
        $_SESSION['welcome-msg'] = "This session will welcome the new user.";

        // Include the file that connects to the database
        include 'includes/database.php';

        $newFirstName = htmlspecialchars($_POST['new-first-name']); // We use `htmlspecialchars` function to prevent xss attacks
        $newLastName = htmlspecialchars($_POST['new-last-name']);
        $newEmail = htmlspecialchars($_POST['new-email']);
        $newPassword = htmlspecialchars($_POST['new-password']);

        // Writing a sql query for inserting values in the database
        $sql = "INSERT INTO lis_users_accounts (firstname, lastname, email, password, birthday, gender)
        VALUES ('$newFirstName', '$newLastName', '$newEmail', '$newPassword', NULL, NULL)";

        // save to db and check
        if(mysqli_query($conn, $sql)) {
            include 'includes/welcome-msg-popup.php'; // this includes the welcome message located on the includes folder
        } else {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    }    

    // This function will get all the email address in the database
    function getEmailData() {
        include 'includes/database.php';

        $emailData = array();

        $sql = "SELECT `email` FROM `lis_users_accounts`"; // This query will only select the email column

        $result = mysqli_query($conn, $sql); // making the query and getting the result

        $emailArray = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetching all the rows and returning as an associative array

        if($emailArray) {
            foreach($emailArray as $row) {
                array_push($emailData, $row['email']);
            }
            mysqli_close($conn);
            return $emailData;
        } else {
            mysqli_close($conn);
            return "";
        }
    }
?>

<section class="sign-up-modal" id="sign-up-modal">
    <div class="modal-close-btn-wrapper">
        <i class="close-btn fa-solid fa-xmark"></i>
    </div>
    <div class="modal-body"> 
        <form 
            id="sign-up-form" 
            class="sign-up-form-wrapper" 
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
            method="POST"
        >
            <h3 class="sign-up-form-title">Sign up</h3>
            <!-- First name and Last name inputs -->
            <div class="sign-up-form-input-wrapper">
                <div class="sign-up-form-input-wrapper">
                    <input class="sign-up-form-input" id="new-first-name" type="text" name="new-first-name" placeholder="First name">
                    <label class="sign-up-form-label" for="new-first-name">First name</label>
                    <p class="sign-up-input-validation-msg"></p>
                </div>
                <div class="sign-up-form-input-wrapper">
                    <input class="sign-up-form-input" id="new-last-name" type="text" name="new-last-name" placeholder="Last name">
                    <label class="sign-up-form-label2" for="new-last-name">Last name</label>
                    <p class="sign-up-input-validation-msg"></p>
                </div>
            </div>

            <!-- Email input -->
            <div class="sign-up-form-input-wrapper">
                <input class="sign-up-form-input" id="new-email" type="text" name="new-email" placeholder="Email">
                <label class="sign-up-form-label" for="new-email">Email</label>
                <small class="input-guide">You can use letters, numbers & periods</small>
                <input id="hidden-input" type="hidden" value='<?php echo json_encode(getEmailData()); ?>'>
                <p class="sign-up-input-validation-msg"></p>
            </div>

            <!-- Password input -->
            <div class="sign-up-form-input-wrapper">
                <input class="sign-up-form-input" id="new-password" type="password" name="new-password" placeholder="Password">
                <label class="sign-up-form-label" for="new-password">Password</label>
                <input class="sign-up-form-input" id="confirm-password" type="password" name="confirm-password" placeholder="Confirm">
                <label class="sign-up-form-label3" for="confirm-password">Confirm</label>
                <small class="input-guide">Use 8 or more characters with a mix of letters, numbers & symbols</small>
                <p class="sign-up-input-validation-msg"></p>
            </div>
            <input class="form-btn" type="submit" name="sign-up" value="Sign up">
        </form>
    </div>
    <div class="sign-up-modal-footer">
        <hr>
        <p>Already have an account? <a class="form-link" id="login-link">Login</a></p>
    </div>
</section>


