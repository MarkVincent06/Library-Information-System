<?php
    session_start();
    
    // This unsets the session after clicking the log out btn
    unset($_SESSION['active-user']);
    unset($_SESSION['active-user-avatar']);
    header('Location: ../index.php');