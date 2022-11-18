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
        <?php if(isset($_SESSION['active-user'])): ?>
            <img class="user-avatar" id="user-avatar" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User's avatar" draggable="false">

            <div class="sub-menu-wrapper" id="sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img class="sub-menu-avatar" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User's avatar">
                        <h2 class="sub-menu-name"><?php echo "$newFirstName  $newLastName" ?></h2>
                    </div>

                    <hr>

                    <a href="#" class="sub-menu-link">
                        <i class="fa-solid fa-gear"></i>
                        <p>Settings</p>
                        <span>></span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Log out</p>
                        <span>></span>
                    </a>

                </div>

                 <!-- JS script for opening and closing of the sub-menu -->
                <script>
                    document.getElementById("user-avatar").addEventListener('click', () => {
                        document.getElementById("sub-menu").classList.toggle('open-sub-menu')
                    })
                </script>
            </div>
        <?php else: ?>
            <button class="login-btn" id="login-btn">Login <i class="fa-solid fa-right-to-bracket"></i></button>
        <?php endif; ?>
    </nav>
</header>

<main>