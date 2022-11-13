<?php
    // Creating variables for the host, username, password, and name for the database
    $db_server = 'localhost';
    $db_username = 'markvincent';
    $db_password = 'syntaxerror';
    $db_name = 'ita212_lisdb';
    
    // connect to the database
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    // check connection
    if(!$conn) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }