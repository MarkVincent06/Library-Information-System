<?php
    // This will refresh the active user session so it will always be up to date whenever the data in the db changes
    include 'includes/database.php';

    $activeUserId = $_SESSION['active-user']['id'];

    $sql = "SELECT * FROM `lis_users_accounts` WHERE id = '$activeUserId'";
    $result = mysqli_query($conn, $sql) or die("No data found!");
    $lisUserAccount = mysqli_fetch_assoc($result);
    $_SESSION['active-user'] = $lisUserAccount;

     // Free result set
     mysqli_free_result($result);

     // closing the connection to the db
     mysqli_close($conn);
?>