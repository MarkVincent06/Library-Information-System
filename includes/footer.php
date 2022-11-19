    </main>

    <footer>

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