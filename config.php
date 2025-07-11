<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toDoList";

$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
    die("Cannot Connect". mysqli_error());
}
mysqli_select_db($conn, "toDoList") or die("Cannot Connect");
?>