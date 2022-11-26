<?php
    include '../includes/database.php';

    $sql = "SELECT email, password FROM lis_users_accounts";
    $result = mysqli_query($conn, $sql);
    $emailAndPassData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($emailAndPassData);
?>