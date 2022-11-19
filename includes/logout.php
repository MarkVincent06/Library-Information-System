<?php
    session_start();
    
    // This unsets the session after clicking the log out btn
    unset($_SESSION['active-user']);
    header('Location: ../index.php');