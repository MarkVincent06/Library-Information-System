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
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/log-in-modal.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Home | Library Information System</title>
</head>
<body>

    <?php include 'includes/header.php'; ?> <!-- This includes the header that is located on the includes folder -->

    <section class="hero">  
        <div class="hero-overlay">
            <h1 class="hero--title">Library Information System</h1>
            <h2 class="hero--subtitle">We bring what you need.</h2>
        </div>
    </section>

    <?php include 'includes/login-modal.php'; ?> <!-- This includes the login-modal that is located on the includes folder -->

    <?php include 'includes/footer.php'; ?> <!-- This includes the footer that is located on the includes folder -->
   