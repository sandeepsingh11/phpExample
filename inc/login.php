<?php
    $formUserEmail = $_POST["user-email"];
    $formPass = $_POST["pass"];

    
    // find login entry
    $sql = "SELECT * FROM form WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../index.php?error=sql');
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $formUserEmail, $formUserEmail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $passCheck = password_verify($formPass, $row['pass']);

            if ($passCheck == true) {
                session_start();

                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['color'] = $row['color'];
                $_SESSION['animal'] = $row['animal'];
                
                header('Location: ../profile.php?user=' . $_SESSION['id']);
            }
            else {
                header('Location: ../index.php?error=incorrectpw');
                exit();
            }
        }
        else {
            header('Location: ../index.php?error=loginfailed');
            exit();
        }
    }