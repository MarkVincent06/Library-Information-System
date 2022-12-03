<?php
    session_start();
    include 'includes/refreshActiveUserSession.php';

    $activeUserId = $_SESSION['active-user']['id'];
    $activeUserFirstName = $_SESSION['active-user']['firstname'];
    $activeUserLastName = $_SESSION['active-user']['lastname'];
    $activeUserAddress = $_SESSION['active-user']['address'];
    $activeUserPhone = $_SESSION['active-user']['phone'];
    $activeUserBirthday = $_SESSION['active-user']['birthday'];
    $activeUserGender = $_SESSION['active-user']['gender'];
    $activeUserEmail = $_SESSION['active-user']['email'];
    $activeUserPassword = $_SESSION['active-user']['password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- DEFAULT META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700;900&display=swap" rel="stylesheet">

    <!-- CSS LINK -->
    <link rel="stylesheet" href="css/settings.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- SETTINGS JS -->
    <script src="js/settings.js"></script>

    <title>Settings | Library Information System</title>
</head>
<body>
    <header>
        <a href="index.php"><img class="main-logo" src="img/home/main-logo.png" alt="The main logo of the website."></a>
        <a href="index.php"><h3 class="main-logo-title">CAP - Library Information System</h3></a>
        <a href="index.php" class="home-link"><i class="fa-solid fa-xmark"></i></a> 
    </header>

    <main>
        <div class="settings-wrapper">
            <div class="settings-header">
                <hr>
                <h1 id="target-settings-title">Settings</h1>
            </div>
            <div class="settings-content">
                <!-- This hidden input is the id of the active user and will be used to update the db -->
                <input id="hiddenActiveUserId" type="hidden" value="<?php echo $activeUserId ?>">
                <div class="user-intro-wrapper">
                    <?php if(isset($_SESSION['active-user-avatar'])): ?>
                        <img 
                            src="<?php 
                                    // Checks if the file exists in the uploads folder 
                                    if(file_exists($_SESSION['active-user-avatar']['img_destination'])) {
                                        echo $_SESSION['active-user-avatar']['img_destination']; 
                                    } else {
                                        echo 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
                                    }
                                ?>" 
                            alt="User's avatar"
                        >
                    <?php else: ?>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User's avatar">
                    <?php endif ?>
                    <h2><?php echo "$activeUserFirstName $activeUserLastName"; ?></h2>
                    <p><?php echo $activeUserEmail ?></p>

                    <form class="change-avatar-form" action="crudDB/uploadImg.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="imgFile" id="fileInput">
                        <button id="change-avatar-btn" type="submit" name="change-avatar-btn">
                            Change Avatar
                        </button>
                    </form>
                </div>

                <div class="user-info-wrapper">
                    <!-- PERSONAL DETAILS -->
                    <div class="personal-details">
                        <h3>Personal Details</h3>
                        <p>
                            This is your personal information.
                        </p>

                        <!-- FIRST NAME AND LAST NAME INPUTS -->
                        <div class="full-name-inputs">
                            <div class="first-name-wrapper">
                                <label for="firstname" class="special-label">First Name*</label>
                                <input 
                                    type="text" 
                                    value="<?php echo $activeUserFirstName ?>" 
                                    id="firstname" 
                                    placeholder="Enter first name"
                                    disabled
                                >
                                <small class="validation"></small>
                            </div>
                            <div class="last-name-wrapper">
                                <label for="lastname" class="special-label">Last Name*</label>
                                <input 
                                    type="text" 
                                    value="<?php echo $activeUserLastName ?>" 
                                    id="lastname"
                                    placeholder="Enter last name" 
                                    disabled
                                >
                                <small class="validation"></small>
                            </div>
                        </div>

                        <!-- ADDRESS INPUT -->
                        <div class="address-input">
                            <label for="address" class="special-label">Address</label>
                            <input 
                                type="text" 
                                value="<?php echo $activeUserAddress ?>" 
                                id="address" 
                                placeholder="Enter address"
                                disabled
                            >
                            <small class="validation"></small>
                        </div>

                        <!-- PHONE AND BIRTHDAY INPUTS -->
                        <div class="phone-birthday-inputs">
                            <div class="phone-wrapper">
                                <label for="phone" class="special-label">Phone*</label>
                                <input 
                                    type="number" 
                                    value="<?php echo ($activeUserPhone ? $activeUserPhone : '') ?>" 
                                    id="phone" 
                                    placeholder="Enter phone number"
                                    disabled
                                >
                                <small class="validation"></small>
                            </div>
                            <div class="birthday-wrapper">
                                <label for="birthday" class="special-label">Birthday*</label>
                                <input 
                                    type="date" 
                                    value="<?php echo $activeUserBirthday ?>"
                                    id="birthday" 
                                    placeholder="Enter date of birth"
                                    disabled
                                >
                                <small class="validation"></small>
                            </div>
                        </div>

                        <!-- GENDER INPUT -->
                        <div class="gender-input">
                            <label class="special-label">Gender*</label>
                            <div class="radio-item">
                                <input 
                                    type="radio" 
                                    id="male" 
                                    name="gender" 
                                    value="Male" 
                                    disabled
                                    <?php echo ($activeUserGender == 'Male' ? 'checked' : null) ?>
                                >
                                <label for="male">Male</label>
                            </div>

                            <div class="radio-item">
                                <input 
                                    type="radio" 
                                    id="female" 
                                    name="gender" 
                                    value="Female" 
                                    disabled
                                    <?php echo ($activeUserGender == 'Female' ? 'checked' : null) ?>
                                >
                                <label for="female">Female</label>
                            </div>

                            <div class="radio-item">
                                <input 
                                    type="radio" 
                                    id="other" 
                                    name="gender" 
                                    value="Other" 
                                    disabled
                                    <?php echo ($activeUserGender == 'Other' ? 'checked' : null) ?>
                                >
                                <label for="other">Other</label>
                            </div>
                            <small class="validation">Choose a gender</small>
                        </div>

                        <a href="#target-settings-title">
                            <button type="button" class="edit-btn" id="edit-profile-btn">Edit Profile</button>

                            <button type="button" class="cancel-btn">Cancel</button>
                            <button type="button" class="save-btn">Save Changes</button>
                        </a>
                    </div>

                    <!-- ACCOUNT DETAILS -->
                    <div class="account-details" id="target-account-div">
                        <h3>Acccount Details</h3>
                        <p>This is your account used for logging in.</p>

                        <!-- EMAIL -->
                        <div class="email-wrapper">
                            <div class="email-display-input">
                                <label for="email" class="special-label" id="target-email-link">Email</label>
                                <input 
                                    type="text" 
                                    value="<?php echo $activeUserEmail ?>" 
                                    id="email" 
                                    disabled
                                >
                            </div>

                            <!-- This div will display after they clicked the change email btn -->
                            <div class="change-email-container">
                                <div class="current-password-input">
                                    <label for="current-password" class="special-label">Current Password*</label>
                                    <input 
                                        type="password" 
                                        id="current-password" 
                                        placeholder="Enter current password"
                                    >
                                    <small class="validation">Your current password is incorrect</small>
                                </div>
                                <div class="new-email-input">
                                    <label for="new-email" class="special-label">New Email*</label>
                                    <input type="text" id="new-email" placeholder="Enter new email address">
                                    <small class="validation">Sorry, your email must be between 6 and 40 characters long</small>
                                </div>
                            </div>

                            <a href="#target-account-div">
                                <button type="button" class="edit-btn">Change Email</button>
                                <button type="button" class="cancel-btn">Cancel</button>
                                <button type="button" class="save-btn">Update Email</button>
                            </a> 

                        </div>

                        <!-- PASSWORD -->
                        <div class="password-wrapper">
                            <div class="password-display-input">
                                <label for="password" class="special-label">Password</label>
                                <input 
                                    type="password" 
                                    value="<?php echo $activeUserPassword ?>" 
                                    id="password" 
                                    disabled
                                >
                            </div>
                            
                            <!-- This div will display after they clicked the change password btn -->
                            <div class="change-password-container">
                                <div class="old-password-input">
                                    <label for="old-password" class="special-label">Old Password*</label>
                                    <input type="password" id="old-password" placeholder="Enter old password">
                                    <small class="validation">Your old password is incorrect</small>
                                </div>
                                <div class="new-password-inputs">
                                    <div class="new-password-wrapper">
                                        <label for="new-password" class="special-label">New Password*</label>
                                        <input 
                                            type="password" 
                                            id="new-password" 
                                            placeholder="Enter new password"
                                        >
                                        <small class="validation">Use 8 characters or more for your password</small>
                                    </div>
                                    <div class="confirm-new-password-wrapper">
                                        <label for="confirm-new-password" class="special-label">
                                            Confirm New Password*
                                        </label>
                                        <input 
                                            type="password" 
                                            id="confirm-new-password" 
                                            placeholder="Confirm new passwor d"
                                        >
                                        <small class="validation">Those passwords didn't match. Try again</small>
                                    </div>
                                </div>   
                            </div>

                            <a href="#target-account-div">
                                <button type="button" class="edit-btn">Change Password</button>
    
                                <button type="button" class="cancel-btn">Cancel</button>
                                <button type="button" class="save-btn">Update Password</button>
                            </a>
                        </div>
                    </div>

                    <!-- DELETE ACCOUNT -->
                    <div class="delete-account">
                        <h3>Delete Account</h3>
                        <p>Once you delete your account, there is no going back. Please be certain.</p>
                        <button type="button" class="delete-btn">Delete Account</button>
                    </div>

                    <!-- LOGOUT ACCOUNT -->
                    <div class="logout-account">
                        <h3>Logout</h3>
                        <p>Logs out of your account.</p>
                        <a href="includes/logout.php">
                            <button type="button" class="logout-btn">Logout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">

    </footer>
</body>
</html>