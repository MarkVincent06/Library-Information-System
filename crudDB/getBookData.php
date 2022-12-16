<?php
    // getting the data of book from db
    include 'includes/database.php';

    $sql = "SELECT * FROM book";
    $result = mysqli_query($conn, $sql);
    $bookData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // if($bookData) {
    //     echo json_encode($bookData);
    // }

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);
