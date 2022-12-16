    </main>

    <!-- FOOTER -->
    <footer>
        <div class="div1">

            <small>Copyright &#169;2022 CAP - Library Information System</small>
        </div>

        <div class="div2">
            <h3>CONTACT & ADDRESS</h3>
            <small><b>Address:</b> Nabua, Camarines Sur</small>
            <small><b>Telephone:</b> +63 963 713 7897</small>
            <small><b>Email:</b> macleofe@my.cspc.edu.ph</small>
        </div>

        <div class="div3">
            <h3>SOCIAL MEDIA</h3>
            <a href="https://www.facebook.com/markvincentcleofe06/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://github.com/MarkVincent06"><i class="fa-brands fa-github" target="_blank"></i></a>
        </div>
    </footer>

    <?php 
        include 'includes/login-modal.php'; // This includes the login-modal that is located on the includes folder
        include 'includes/sign-up-modal.php'; // This includes the sign-up-modal that is located on the includes folder

        if(isset($_POST['login']) || isset($_POST['sign-up'])) {
            include 'includes/welcome-msg-popup.php'; // this includes the welcome message located on the includes folder
        }
    ?>

     <!-- This script prevents the form from resubmitting when the browser refreshes -->
     <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>


</body>
</html>