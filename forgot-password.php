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
    <link rel="stylesheet" href="css/forgot-password.css">

    <!-- JAVASCRIPT -->
    <script src="js/forgot-password.js" defer></script>

    <title>Forgot Password | Library Inforamtion System</title>
</head>
<body>
    <header>
        <a href="index.php"><img class="main-logo" src="img/home/main-logo.png" alt="The main logo of the website."></a>
        <a href="index.php"><h3 class="main-logo-title">CAP - Library Information System</h3></a>
    </header>

    <main>
        <!-- RESET PASSWORD SECTION -->
        <div class="reset-password-wrapper">
            <div class="reset-password-wrapper--header">
                <h1>Reset Password</h1>
            </div>
            <hr>
            <div class="reset-password-wrapper--body">
                <div class="validation" id="email-validation">
                    <h3 id="error-msg1"></h3>
                    <small id="error-msg2"></small>
                </div>
                <p>Please enter your email address to reset your password.</p>
                <input id="email-input" type="text" placeholder="E-mail address" name="email">
            </div>
            <hr>
            <div class="reset-password-wrapper--footer">
                <a href="index.php" class="cancel-link">Cancel</a>
                <button class="reset-btn" id="reset-btn">Reset</button>
            </div>
        </div>

        <!-- NEW PASSWORD SECTION -->
        <div class="new-password-wrapper">
            <div class="new-password-wrapper--header">
                <h1>New Password</h1>
            </div>
            <hr>
            <div class="new-password-wrapper--body">
                <p>Enter a new password for:</p>
                <small>vincentmariscotescleofe@gmail.com</small>
                <input id="email-input" type="password" placeholder="New password" name="password">
            </div>
            <hr>
            <div class="new-password-wrapper--footer">
                <a href="#" class="not-you-link">Not you?</a>
                <button class="change-btn" id="change-btn">Change</button>
            </div>
        </div>
    </main>

    <footer class="footer">

    </footer>
</body>
</html>