<?php
    // Deletes the account in the databse
    if(isset($_POST['id'])) {
        include '../includes/database.php';

        $id = htmlspecialchars($_POST['id']);

        $sql = "DELETE FROM lis_users_accounts WHERE id = '$id'";

        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    }
?>