<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "user_db";

// Create connection
$conn = mysqli_connect($hostName,$dbUser,$dbPassword,$dbName);
if(!$conn){
		die("Connection failed due to ".mysqli_connect_error()
    );
};

?>