<header>
    <nav>
        <div class="nav--logo-wrapper">
            <a href="#"><img class="main-logo" src="img/home/main-logo.png" alt="The main logo of the website."></a>
            <a href="#"><h3 class="main-logo-title">CAP - Library Information System</h3></a>
        </div>
        <ul class="nav--links-wrapper">
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="about.php">About Us</a></li>          
        </ul>
        <?php if(isset($_SESSION['active-user'])): ?>
            <?php if(isset($_SESSION['active-user-avatar'])): ?>
                <img 
                    src="<?php 
                            // Checks if the file exists in the uploads folder 
                            if(file_exists($_SESSION['active-user-avatar']['img_destination'])) {
                                echo $_SESSION['active-user-avatar']['img_destination']; 
                            } else {
                                echo 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
                            }
                        ?>" 
                    class="user-avatar"
                    id="user-avatar"
                    onclick="toggleSubMenu()"
                    alt="User's avatar"
                    draggable="false"
                >
            <?php else: ?>
                <img 
                    class="user-avatar" 
                    id="user-avatar"
                    onclick="toggleSubMenu()"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User's avatar"
                    draggable="false"
                >
            <?php endif ?>
            <div class="sub-menu-wrapper" id="sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <?php if(isset($_SESSION['active-user-avatar'])): ?>
                            <img 
                                src="<?php 
                                        // Checks if the file exists in the uploads folder 
                                        if(file_exists($_SESSION['active-user-avatar']['img_destination'])) {
                                            echo $_SESSION['active-user-avatar']['img_destination']; 
                                        } else {
                                            echo 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
                                        }
                                    ?>" 
                                class="sub-menu-avatar"
                            >
                        <?php else: ?>
                            <img class="sub-menu-avatar" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User's avatar">
                        <?php endif ?>
                        <h2 class="sub-menu-name">
                            <?php echo $_SESSION['active-user']['firstname'] . " " . $_SESSION['active-user']['lastname'] ?>
                        <h2>
                    </div>

                    <hr>

                    <a href="settings.php" class="sub-menu-link">
                        <i class="fa-solid fa-gear"></i>
                        <p>Settings</p>
                    </a>

                    <a href="includes/logout.php" class="sub-menu-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Log Out</p>
                    </a>

                </div>

                 <!-- JS script for opening and closing of the sub-menu -->
                <script>
                    const subMenu = document.getElementById("sub-menu")
                    
                    function toggleSubMenu() {
                        subMenu.classList.toggle('open-sub-menu')
                    }

                    // This closes the sub-menu when clicked outside of it
                    window.onclick = e => {
                        if(!e.target.matches('.user-avatar')) {
                            if(subMenu.classList.contains('open-sub-menu')) {
                                subMenu.classList.remove('open-sub-menu')     
                            }
                        }   
                    }

                    subMenu.addEventListener('click', e => e.stopPropagation())
                </script>
            </div>
        <?php else: ?>
            <button class="login-btn" id="login-btn">Login <i class="fa-solid fa-right-to-bracket"></i></button>
        <?php endif; ?>
    </nav>
</header>

<main>