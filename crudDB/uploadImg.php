<?php
    if(isset($_POST['change-avatar-btn'])) {
        session_start();

        include '../includes/database.php';

        $activeUserId = $_SESSION['active-user']['id'];
        $activeUserFirstName = $_SESSION['active-user']['firstname'];

        $imgFile = $_FILES['imgFile'];

        $imgName = $_FILES['imgFile']['name'];
        $imgTmpName = $_FILES['imgFile']['tmp_name'];
        $imgSize = $_FILES['imgFile']['size'];
        $imgError = $_FILES['imgFile']['error'];
        $imgType = $_FILES['imgFile']['type'];

        $imgExtension = explode('.', $imgName);
        $imgActualExtension = strtolower(end($imgExtension));

        $allowedImgExtensions = array('jpg', 'jpeg', 'png');

        if(in_array($imgActualExtension, $allowedImgExtensions)) {
            if($imgError === 0) {
                // checks if img size is less than 2mb
                if($imgSize < 2000000) {
                    $imgNewName = $activeUserFirstName . $activeUserId . "avatar" . "." .$imgActualExtension;
                    $imgDestination = '../img/uploads/' . $imgNewName;
                    move_uploaded_file($imgTmpName, $imgDestination);
                    $imgDestination = 'img/uploads/' . $imgNewName;
                        
                    $sql1 = "SELECT * FROM lis_users_avatar WHERE lis_users_accounts_id = '$activeUserId'";
                    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                
                    if($result > 0) {
                        $sql2 = "UPDATE lis_users_avatar 
                        SET img_destination = '$imgDestination'
                        WHERE lis_users_accounts_id = $activeUserId";
                    } else {
                        $sql2 = "INSERT INTO lis_users_avatar (lis_users_accounts_id, img_destination)
                        VALUES ('$activeUserId', '$imgDestination')";
                    }

                    if(mysqli_query($conn, $sql2)) { 
                        $sql3 = "SELECT * FROM lis_users_avatar WHERE lis_users_accounts_id ='$activeUserId'";
                        $result = mysqli_query($conn, $sql3);
                        $lisUserAvatar = mysqli_fetch_assoc($result);
                        $_SESSION['active-user-avatar'] = $lisUserAvatar;

                        // Free result set
                        mysqli_free_result($result);

                        // closing the connection to the db
                        mysqli_close($conn);

                        header('Location: ../settings.php');
                    } else {
                        die("Query error: " . mysqli_error($conn));
                    }   
                } else {
                    echo "<h2 style='color: red'>ERROR: Your file is too big!</h2>";
                    exit(); 
                }
            } else {
                echo "<h2 style='color: red'>ERROR: There was an error uploading your image!</h2>";
                exit(); 
            }
        } else {
            echo "<h2 style='color: red'>ERROR: Invalid file type/extension!</h2>";
            exit();
        }

    }
?>