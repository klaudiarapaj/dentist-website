<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LoginDB";

    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

/* Create database
$loginsql = "CREATE DATABASE LoginDB";
if ($conn->query($loginsql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/

/* Create table
$usersql = "CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 username varchar(50) NOT NULL,
 email varchar(50) NOT NULL,
 password varchar(50) NOT NULL,
 create_datetime datetime NOT NULL
 )"; 

if ($conn->query($usersql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} 

$appsql = "CREATE TABLE appointments (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(60) NOT NULL,
    email VARCHAR(50) NOT NULL,
    number VARCHAR(10) NOT NULL,
    date datetime NOT NULL
    )";


if ($conn->query($appsql) === TRUE) {
    echo "Table appointments created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} 

$servsql = "CREATE TABLE services (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    service VARCHAR(60) NOT NULL,
    description TEXT NOT NULL
    )";


if ($conn->query($servsql) === TRUE) {
    echo "Table services created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$revsql = "CREATE TABLE reviews (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    review TEXT NOT NULL,
    rating INT (1) NOT NULL,
    approved BOOLEAN NOT NULL DEFAULT 0
    )";

if ($conn->query($revsql) === TRUE) {
    echo "Table reviews created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/