<?php
    // get db connection
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "php_example";

    $conn = mysqli_connect($servername, $username, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // create db
    // $sql = "CREATE DATABASE php_example";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Database created successfully";
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    
    // create table
    // $sql = "CREATE TABLE Form (
    //     id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     firstname VARCHAR(30) NOT NULL,
    //     lastname VARCHAR(30) NOT NULL,
    //     email VARCHAR(50),
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";
        
    // if ($conn->query($sql) === TRUE) {
    //     echo "Table Form created successfully";
    // } else {
    //     echo "Error creating table: " . $conn->error;
    // }

    // insert into db (move to "process.php" in the future)
    // if ( (isset($_GET["first_name"])) && (isset($_GET["last_name"])) && (isset($_GET["email"]))) {
    //     $fName = $_GET["first_name"];
    //     $lName = $_GET["last_name"];
    //     $email = $_GET["email"];

    //     echo $fName . "<br>" . $lName . "<br>" . $email . "<br>";

    //     $sql = "INSERT INTO Form (firstname, lastname, email)
    //     VALUES ($fName, $lName, $email)";
    
    //     if ($conn->query($sql) === TRUE) {
    //         echo "New record created successfully";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
        
    // }

    // $conn->close();