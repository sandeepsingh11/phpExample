<?php
    require('./connection.php');

    echo "In process!\n";

    // echo $_POST["username"];

    if (isset($_POST['submit-signup'])) {
        echo "signup!";
        require('signup.php');
    }
    else if (isset($_POST['submit-login'])) {
        echo "login!";
        require('login.php');
    }
    else if (isset($_POST['submit-logout'])) {
        echo "logout!";
        require('logout.php');
    }
    else if (isset($_POST['submit-update'])) {
        echo "update!";
        require('update.php');
    }
    else {
        echo "nothing";
    }