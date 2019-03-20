<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$tbname = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE ".$dbname;
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE ".$tbname."(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
active TINYINT(1),
first VARCHAR(15), 
last VARCHAR(15),
username VARCHAR(30) UNIQUE,
password VARCHAR(50) UNIQUE,
email VARCHAR(40) UNIQUE,
phone VARCHAR(10),
gender VARCHAR(7),
balance INT(11)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>