<?php
    include '../includes/database.php';

    if(isset($_POST['newEmail'])) {
        $id = htmlspecialchars($_POST['id']);
        $newEmail = htmlspecialchars($_POST['newEmail']);
        
        $sql = "UPDATE lis_users_accounts SET email = '$newEmail' WHERE id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    } elseif(isset($_POST['newPassword'])) {
        $id = htmlspecialchars($_POST['id']);
        $newPassword = htmlspecialchars($_POST['newPassword']);
        
        $sql = "UPDATE lis_users_accounts SET password = '$newPassword' WHERE id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    }
?>