<?php
$host = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "lpuevs"; // your database name

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
