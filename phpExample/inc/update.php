<?php
    session_start();
    
    // check if logged in
    if (!isset($_SESSION['id'])) {
        header('Location: ../index.php');
        exit();
    }

    $userId = $_SESSION["id"];

    // check username change
    if (!empty($_POST['username']))
        $formUser = $_POST["username"];
    else
        $formUser = $_SESSION["user"];
        
    // check email change
    if (!empty($_POST['email']))
        $formEmail = $_POST["email"];
    else
        $formEmail = $_SESSION["email"];

    // check color change
    if (!empty($_POST['color']))
        $formColor = $_POST["color"];
    else
        $formColor = $_SESSION["color"];

    // check animal change
    if (!empty($_POST['animal']))
        $formAnimal = $_POST["animal"];
    else
        $formAnimal = $_SESSION["animal"];


    // $formPass = $_POST["pass"];
    // $formPassRepeat = $_POST["passRepeat"];
    

    // find user
    $sql = "UPDATE form
        SET username = ?, email = ?, color = ?, animal = ?
        WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../index.php?error=sql');
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "sssss", $formUser, $formEmail, $formColor, $formAnimal, $userId);
        mysqli_stmt_execute($stmt);

        // get data
        $sql = "SELECT * FROM form WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../index.php?error=sql');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {

                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['color'] = $row['color'];
                $_SESSION['animal'] = $row['animal'];


                header('Location: ../profile.php?user=' . $_SESSION['id']);
                exit();
            }
        }
    }

    // mysqli_stmt_close($stmt);