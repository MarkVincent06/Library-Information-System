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

    <header>
        <nav>
            <div class="nav--logo-wrapper">
                <a href="#"><img class="main-logo" src="img/home/main-logo.png" alt="The main logo of the website."></a>
                <a href="#"><h3 class="main-logo-title">CAP - Library Information System</h3></a>
            </div>
            <ul class="nav--links-wrapper">
                <li><a href="#">Home</a></li>
                <li><a href="">Books</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About</a></li>          
            </ul>
            <button class="login-btn">Login</button>
        </nav>
    </header>

    <main>
        <section class="hero">  
            <div class="hero-overlay">
                <h1 class="hero--title">Library Information System</h1>
                <h2 class="hero--subtitle">We bring what you need.</h2>
            </div>
        </section>
    </main>

    <footer>

    </footer>

    <section class="modal">
        <div class="modal-close-btn-wrapper">
            <i class="close-btn fa-solid fa-xmark"></i>
        </div>
        <div class="modal-body">
            <form class="form-wrapper" action="">
                <h3 class="form-title">Login</h3>
                <div class="form-input-wrapper">
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input class="form-input" id="email" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-input-wrapper">
                    <label for="password"><i class="fa-solid fa-key"></i></label>
                    <input class="form-input" id="password" type="password" name="password" placeholder="Password">
                </div>
                <input class="form-login-btn" type="submit" name="login" value="Login">
                <a class="form-forgot-pass-link" href="#"><p>Forgot Password?</p></a>
            </form>
        </div>
        <div class="modal-footer">
            <hr>
            <p>Don't have an account? <a class="sign-up-link" href="">Create one</a></p>
        </div>
    </section>

</body>
</html>