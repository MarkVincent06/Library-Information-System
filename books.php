<?php
    include 'crudDB/login-signup-proccess.php';
    if(isset($_SESSION['active-user'])) {
        include 'includes/refreshActiveUserSession.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- DEFAULT METAS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700;900&display=swap" rel="stylesheet">

    <!-- CSS LINK -->
    <link rel="stylesheet" href="css/books.css">
    <link rel="stylesheet" href="css/login-modal.css">
    <link rel="stylesheet" href="css/sign-up-modal.css">   
    <link rel="stylesheet" href="css/global.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- BOOKS JS -->
    <script src="js/books.js"></script>

    <!-- MODAL POP-UP JS -->
    <script src="js/modal-popup.js" defer></script>

    <!-- FORM VALIDATION JS -->
    <script src="js/login-form-validation.js" defer></script>
    <script src="js/sign-up-form-validation.js" defer></script>
    <title>Books - Browse Genres | Library Information System</title>
</head>
<body>
    
    <?php include 'includes/header.php'; // This includes the header that is located on the includes folder ?> 
    
    <section class="section-wrapper">  
      <h1><i class="fa-solid fa-book" style="margin-right: 10px"></i> Browse Genres</h1>

      <div class="genre-wrapper">
        <div class="box-link romance">
            <h3>ROMANCE</h3>
        </div>

        <div class="box-link action-adventure">
            <h3>ACTION & ADVENTURE</h3>
        </div>

        <div class="box-link mystery-thriller">
            <h3>MYSTERY & THRILLER</h3>
        </div>

        <div class="box-link childrens">
            <h3>CHILDREN'S</h3>
        </div>

        <div class="box-link horror">
            <h3>HORROR</h3>
        </div>

        <div class="box-link science-fiction">
            <h3>SCIENCE FICTION</h3>
        </div>

      </div>
    </section>

    <?php include 'includes/footer.php'; // This includes the footer that is located on the includes folder ?> 

