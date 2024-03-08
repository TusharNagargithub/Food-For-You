<?php
    //Authorization  -  Access Control
    //Check the whether the user logged in or not
    if(!isset($_SESSION['user'])){ // If user session is not set

        //user is not logged in
        //Redirect to login page with Message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //Redirect to login Page
        header('location:'.SITEURL.'admin/login.php');
    }
?>