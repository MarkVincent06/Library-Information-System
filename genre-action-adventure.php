<?php
    include 'crudDB/login-signup-proccess.php';
    include 'crudDB/getBookData.php';

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
    <link rel="stylesheet" href="css/genre-romance.css">
    <link rel="stylesheet" href="css/login-modal.css">
    <link rel="stylesheet" href="css/sign-up-modal.css">   
    <link rel="stylesheet" href="css/global.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- GENRE ROMANCE JS -->
    <script src="js/genre-romance.js"></script>

    <!-- MODAL POP-UP JS -->
    <script src="js/modal-popup.js" defer></script>

    <!-- FORM VALIDATION JS -->
    <script src="js/login-form-validation.js" defer></script>
    <script src="js/sign-up-form-validation.js" defer></script>
    <title>Books - Action & Adventure Books | Library Information System</title>
</head>
<body>
    
    <?php include 'includes/header.php'; // This includes the header that is located on the includes folder ?> 


    <section class="section-wrapper">  
    <h1>Action & Adventure Books</h1>

    <div class="book-container">

        <!-- BOOK1 ID HIDDEN INPUT -->
        <input id="<?php echo $bookData[0]['id'] ?>" type="hidden">
        <div id="book1" class="book-wrapper">
        <img class="book-cover" src="img/genre-romance/pride-prejudice-cover.jpg" alt="An image that shows the title of the book">
        <p>Pride and Prejudice</p>
        <small>by <b>Jane Austen</b></small>
        </div>
        
        <!-- BOOK2 ID HIDDEN INPUT -->
        <input id="<?php echo $bookData[1]['id'] ?>" type="hidden">
        <div class="book-wrapper">
        <img class="book-cover" src="img/genre-romance/pride-prejudice-cover.jpg" alt="An image that shows the title of the book">
        <p>Emma</p>
        <small>by <b>Jane Austen</b></small>
        </div>

        <!-- BOOK3 ID HIDDEN INPUT -->
        <input id="<?php echo $bookData[2]['id'] ?>" type="hidden">
        <div class="book-wrapper">
        <img class="book-cover" src="img/genre-romance/pride-prejudice-cover.jpg" alt="An image that shows the title of the book">
        <p>Pride and Prejudice</p>
        <small>by <b>Jane Austen</b></small>
        </div>
    </div>
    </section>


    <?php include 'includes/footer.php'; // This includes the footer that is located on the includes folder ?> 

