<?php
    session_start();

    // This is where we get the data of the user after they submitted the form
    if(isset($_POST['sign-up'])) {
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
            // Getting the email and password in the database and storing it in a session
            $sql = $sql = "SELECT * FROM `lis_users_accounts` WHERE email = '$newEmail' AND password = '$newPassword';";
            $result = mysqli_query($conn, $sql) or die("No data found!");
            $lisUserAccount = mysqli_fetch_assoc($result);
            $_SESSION['active-user'] = $lisUserAccount;
        } else {
            die("Query error: " . mysqli_error($conn));
        }

        // Free result set
        mysqli_free_result($result);

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
    // session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- DEFAULT METAS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700;900&display=swap" rel="stylesheet">

    <!-- CSS LINK -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/login-modal.css">
    <link rel="stylesheet" href="css/sign-up-modal.css">   
    <link rel="stylesheet" href="css/global.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MODAL POP-UP JS -->
    <script src="js/modal-popup.js" defer></script>

    <!-- FORM VALIDATION JS -->
    <script src="js/login-form-validation.js" defer></script>
    <script src="js/sign-up-form-validation.js" defer></script>
    <title>Home | Library Information System</title>
</head>
<body>
    
    <?php include 'includes/header.php'; // This includes the header that is located on the includes folder ?> 

    <section class="hero">  
        <div class="hero-overlay">
            <h1 class="hero--title">Library Information System</h1>
            <h2 class="hero--subtitle">We bring what you need.</h2>
        </div>
    </section>

    <?php include 'includes/footer.php'; // This includes the footer that is located on the includes folder ?> 

