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

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- CSS LINK -->
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/login-modal.css">
    <link rel="stylesheet" href="css/sign-up-modal.css">   
    <link rel="stylesheet" href="css/global.css">

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MODAL POP-UP JS -->
    <script src="js/modal-popup.js" defer></script>

    <!-- FORM VALIDATION JS -->
    <script src="js/login-form-validation.js" defer></escript>
    <script src="js/sign-up-form-validation.js" defer></script>
    <title>About Us | Library Information System</title>
</head>
<body>
    
    <?php include 'includes/header.php'; // This includes the header that is located on the includes folder ?> 
    
    <main>
        <section class="section-wrapper">
            <div class="left-section">
                <img class="about-us-img" src="img/about/about-img.jpg" alt="A photo of people in teamwork">
            </div>  
            <div class="right-section">
                <h1>About Us</h1>
                <p>Welcome to our site. This site started as a place where we showcase the wonders of reading books. Why we created is because we want to help people inspire that reading books is one of the most important skills/assets as a person. This Library Information System will help them find what they want and need for free.
                </p>
            </div>
        </section>

        <section class="section-wrapper">  
            <p class="member-intro">Hey there! My name is Mark Vincent Cleofe and I am the founder and one of the creators of his website. I am 19 years of age and I was born in Legazpi City, Albay. I am currently studying in Camarines Sur Polytechnic-College as a 2nd-year BSIT student. I plan to become a Full-stack developer someday. My daily hobbies are watching anime, playing guitar and playing video-games.
            </p>

            <div class="card">
                <h2 class="nametag">MARK</h2>
                <img class="member-image" src="img/about/mark.jpg" alt="A photo of a person posing">
            </div>
        </section>

        <section class="section-wrapper">  
            <div class="card">
                <h2 class="nametag2">JAN FREDRIZ</h2>
                <img class="member-image" src="img/about/jan-fredriz.jpg" alt="A photo of a person smiling">
            </div>
        
            <p class="member-intro">Hello I'm Jan Fredriz Paje and as a student, I am dedicated to learning and constantly improving myself. I am eager to take on new challenges and strive to do my best in everything I do in my free time, I enjoy playing guitar, playing video games, and participating in extracurricular activities. I am passionate about pursuing higher education and achieving my goals.
            </p>
        </section>

        <section class="section-wrapper">  
            <p class="member-intro">Good day! Firstly, I would like to thank you for giving this opportunity and it's my pleasure to introduce myself. I'm John Loyd D. Aballa, 19 years old from La Opinion Nabua Camarines Sur, 2nd year in Bachelor of Science in Information Technology.
            </p>

            <div class="card">
                <h2 class="nametag3">JOHN LOYD</h2>
                <img class="member-image" src="img/about/john-loyd.jpg" alt="A photo of a person posing">
            </div>
    
        </section>
    </main>

    <?php include 'includes/footer.php'; // This includes the footer that is located on the includes folder ?> 

