<?php
    $formUser = $_POST["username"];
    $formEmail = $_POST["email"];
    $formPass = $_POST["pass"];
    $formPassRepeat = $_POST["passRepeat"];
    $formColor = $_POST["color"];
    $formAnimal = $_POST["animal"];

    // check for unentered data
    if (empty($formUser) || empty($formEmail) || empty($formPassRepeat) || empty($formPassRepeat)) {
        header('Location: ../signup.php?error=emptyfields&username=' . $formUser . '&email=' . $formEmail . '&color=' . $formColor . '&animal=' . $formAnimal);
        exit();
    }
    // check for invalid email AND username
    else if (!filter_var($formEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $formUser)) {
        header('Location: ../signup.php?error=invaliduseremail&color=' . $formColor . '&animal=' . $formAnimal);
        exit();
    }
    // check for invalid username
    else if (!preg_match("/^[a-zA-z0-9]*$/", $formUser)) {
        header('Location: ../signup.php?error=invalidusername&email=' . $formEmail . '&color=' . $formColor . '&animal=' . $formAnimal);
        exit();
    }
    // check for invalid email
    else if (!filter_var($formEmail, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../signup.php?error=invalidemail&username=' . $formUser . '&color=' . $formColor . '&animal=' . $formAnimal);
        exit();
    }
    // check for matching password
    else if ($formPass !== $formPassRepeat) {
        header('Location: ../signup.php?error=wrongpassword&username=' . $formUser . '&email=' . $formEmail . '&color=' . $formColor . '&animal=' . $formAnimal);
        exit();
    }
    else {
        // check for repeated username
        $sql = 'SELECT username FROM form WHERE username = ?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../signup.php?error=sql');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $formUser);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $usernameMatchFlag = mysqli_stmt_num_rows($stmt);

            if ($usernameMatchFlag > 0) {
                header('Location: ../signup.php?error=duplicateusername&email=' . $formEmail . '&color=' . $formColor . '&animal=' . $formAnimal);
                exit();
            }
            else {
                // insert form data
                $sql = "INSERT INTO form (username, email, pass, color, animal) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: ../signup.php?error=sql');
                    exit();
                }
                else {
                    $hashedPass = password_hash($formPass, PASSWORD_DEFAULT);
            
                    mysqli_stmt_bind_param($stmt, "sssss", $formUser, $formEmail, $hashedPass, $formColor, $formAnimal);
                    mysqli_stmt_execute($stmt);
                    
                    header('Location: ../index.php?status=success');
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);