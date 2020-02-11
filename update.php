<?php
    // html head
    require('./components/head.php');

    // check if logged in
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
?>

    <h1>Welcome <?php echo $_SESSION['user'] ?>!</h1>

    <div>
        <h2>Update your profile:</h2>

        <form method="POST" action="./inc/process.php">
            <input type="text" name="username" placeholder="Username" value=<?php echo $_SESSION['user'] ?>>
            <input type="email" name="email" placeholder="Email" value=<?php echo $_SESSION['email'] ?>>
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="passRepeat" placeholder="Repeat Password">
            <input type="text" name="color" placeholder="Favorite color">
            <input type="text" name="animal" placeholder="Favorite animal">

            <button type="submit" name="submit-update">Update!</button>
        </form>
    </div>