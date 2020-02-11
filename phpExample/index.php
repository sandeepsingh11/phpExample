<?php

    // html head
    require("./components/head.php");
    ?>

    <!-- banner -->
    <h1>PHP Example!</h1>
    <p>This site attempts to move form data among different pages</p>

    <!-- form / welcome component -->
    <?php
    if (!isset($_SESSION['id'])) {
        $formHtml = '
        <form method="POST" action="./inc/process.php">
            <h2>Log in</h2>
            <input type="text" name="user-email" placeholder="Username or Email" require>
            <input type="password" name="pass" placeholder="Password" require>
    
            <button type="submit" name="submit-login" id="submit">Log in!</button>
        </form>

        <p>Don\'t have an account? <a href="./signup.php">Sign up here!</a></p>
        ';

        echo $formHtml;
    }
    else {
        echo '<h2>Welcome ' . $_SESSION['user'] . '!</h2>';

        $formHtml = '
        <form method="POST" action="./inc/process.php">
            <button type="submit" name="submit-logout">Log out!</button>
        </form>
        ';
        echo $formHtml;
    }
    ?>

    
    <?php
    // footer component
    require("./components/footer.php");