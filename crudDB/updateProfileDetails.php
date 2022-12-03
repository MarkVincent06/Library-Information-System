<?php
    include '../includes/database.php';

    if(isset($_POST['id'])) {
        $id = htmlspecialchars($_POST['id']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $gender = htmlspecialchars($_POST['gender']);

        $sql = "UPDATE lis_users_accounts
        SET firstname = '$firstname', lastname = '$lastname', address = '$address',
        phone = '$phone', birthday = '$birthday', gender = '$gender'
        WHERE id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    }
    
?>