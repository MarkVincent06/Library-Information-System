<?php
    // GETTING ALL THE lis_users_accounts_data FROM DB
    include '../includes/database.php';

    $sql = "SELECT * FROM lis_users_accounts";
    $result = mysqli_query($conn, $sql);
    $emailAndPassData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($emailAndPassData) {
        echo json_encode($emailAndPassData);
    }

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);
?>