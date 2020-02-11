<?php
    // html head
    require("./components/head.php");

    // check if logged in
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
?>

    <h1>Welcome <?php echo $_SESSION['user'] ?>!</h1>

    <div>
        <h2>Your profile:</h2>

        <div id="profileContainer">
            <div class="row">
                <p>Username:</p>
                <p><?php echo $_SESSION['user'] ?></p>
            </div>
            <div class="row">
                <p>Email:</p>
                <p><?php echo $_SESSION['email'] ?></p>
            </div>
            <div class="row">
                <p>Color:</p>
                <p><?php echo $_SESSION['color'] ?></p>
            </div>
            <div class="row">
                <p>Animal:</p>
                <p><?php echo $_SESSION['animal'] ?></p>
            </div>

            <button><a href="./update.php">Update info</a></button>
        </div>

        <form method="POST" action="./inc/process.php">
            <button type="submit" name="submit-logout">Log out!</button>
        </form>
    </div>
