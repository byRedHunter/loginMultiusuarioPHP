<?php
    // parametros
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('DATABASE', 'login');
    define('PASSWORD', 'quispemysql1999');

    // Create a new connection to the MySQL database using PDO
    $conn = new mysqli(SERVER, USER, PASSWORD, DATABASE);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // echo "Connected successfully";
?>