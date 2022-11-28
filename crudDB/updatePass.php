<?php
    // UPDATING THE PASSWORD IN THE DB
    if(isset($_POST['email']) && isset($_POST['password'])) {
        include '../includes/database.php';

        $email = htmlspecialchars($_POST['email']);
        $newPassword = htmlspecialchars($_POST['password']);

        $sql = "UPDATE lis_users_accounts SET password = '$newPassword' WHERE email = '$email';";
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    }
?>