<?php
    // html head
    require("./components/head.php");

    // form vars
    $formUser = 'Username';
    $formEmail = 'Email';

    if (isset($_GET['username'])) {
        $formUser = $_GET['username'];
    }

    if (isset($_GET['email'])) {
        $formEmail = $_GET['email'];
    }
    ?>

    <!-- banner -->
    <h1>PHP Example!</h1>
    <p>This site attempts to move form data among different pages</p>

    <!-- form component -->
    <form method="POST" action="./inc/process.php">
        <h2>Sign Up</h2>
        <input type="text" name="username" placeholder="Username" value=<?php if (isset($_GET['username'])) echo $_GET['username'] ?>>
        <input type="email" name="email" placeholder="Email" value=<?php if (isset($_GET['email'])) echo $_GET['email'] ?>>
        <input type="password" name="pass" placeholder="Password" require>
        <input type="password" name="passRepeat" placeholder="Repeat Password" require>
        <input type="text" name="color" placeholder="Color" value=<?php if (isset($_GET['color'])) echo $_GET['color'] ?>>
        <input type="text" name="animal" placeholder="Animal" value=<?php if (isset($_GET['animal'])) echo $_GET['animal'] ?>>

        <button type="submit" name="submit-signup" id="submit">Sign up!</button>
    </form>
    
    <p>Have an account? <a href="./index.php">Log in!</a></p>
    
    <?php
    // footer component
    require("./components/footer.php");