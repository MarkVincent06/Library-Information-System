<?php
    session_start();

    // This is where we get the data of the user after they submitted the form
    if(isset($_POST['login']) || isset($_POST['sign-up'])) {
        // Include the file that connects to the database
        include 'includes/database.php';

        // Logs in the user
        if(isset($_POST['login'])) {
            $email = htmlspecialchars($_POST['email']); // We use `htmlspecialchars` function to prevent xss attacks
            $password = htmlspecialchars($_POST['password']);

            logInUserAccount($conn, $email, $password);
        }

        // signs up the user and inserting inputted data in the database
        if(isset($_POST['sign-up'])) {
            $newFirstName = htmlspecialchars($_POST['new-first-name']); 
            $newLastName = htmlspecialchars($_POST['new-last-name']);
            $newEmail = htmlspecialchars($_POST['new-email']);
            $newPassword = htmlspecialchars($_POST['new-password']);

            // Writing a sql query for inserting values in the database
            $sql = "INSERT INTO lis_users_accounts (firstname, lastname, email, password)
            VALUES ('$newFirstName', '$newLastName', '$newEmail', '$newPassword')";

            // save to db and check
            if(mysqli_query($conn, $sql)) {
                // This will automatically log in that newly created account
                logInUserAccount($conn, $newEmail, $newPassword);
            } else {
                die("Query error: " . mysqli_error($conn));
            }
        }
    }    

    // this function will log in the user's account 
    function logInUserAccount($conn, $email, $password) {
        $sql = "SELECT * FROM `lis_users_accounts` WHERE email = '$email' AND password = '$password';";
        $result = mysqli_query($conn, $sql) or die("No data found!");
        $lisUserAccount = mysqli_fetch_assoc($result);
        $_SESSION['active-user'] = $lisUserAccount;
        
        // this will check if the user has changed his/her avatar
        $activeUserId = $_SESSION['active-user']['id'];
        $activeUserFirstName = $_SESSION['active-user']['firstname'];
    
        $sql = "SELECT * FROM lis_users_avatar WHERE lis_users_accounts_id = '$activeUserId'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $lisUserAvatar = mysqli_fetch_assoc($result);
            $_SESSION['active-user-avatar'] = $lisUserAvatar;
        }
           
        // Free result set
        mysqli_free_result($result);

        // closing the connection to the db
        mysqli_close($conn);
    }
?>