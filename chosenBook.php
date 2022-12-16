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
    <link rel="stylesheet" href="css/chosenBook.css">
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
    <title>Books - Chosen Books | Library Information System</title>
</head>
<body>
    
    <?php include 'includes/header.php'; // This includes the header that is located on the includes folder ?> 
    
    <?php if(isset($_GET['id'])): ?>
        <?php foreach($bookData as $book): ?>
            <?php if($book['id'] === $_GET['id']): ?>
                <section>
                    <div class="left-section">
                        <img class="book-cover" src="<?php echo $book['book_cover_location'] ?>" alt="A book cover image">
                    </div>
                    
                    <div class="right-section">
                        <h2><?php echo $book['title'] ?></h2>
                        <small>by <span><?php echo $book['author'] ?></span> | Genre: <?php echo $book['genre'] ?> | Date published: <?php echo $book['date_published'] ?> | Pages: <?php echo $book['pages'] ?></small>

                        <div class="button-wrapper">
                            <a href="<?php echo $book['dl_file_location'] ?>"><button class="dl-btn">Free Download</button></a>
                            <a href="<?php echo $book['read_file_location'] ?>" target="_blank"><button class="read-btn">Read Online</button></a>
                        </div>

                        <p><?php echo $book['description'] ?></p>
                    </div>
                </section>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <?php include 'includes/footer.php'; // This includes the footer that is located on the includes folder ?> 

