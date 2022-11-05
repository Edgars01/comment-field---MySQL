<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "comment_field_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn)
{
    die('Connection failed:' . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS comment_table (
        id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name varchar(255) NOT NULL,
        comment text NOT NULL,
        reply text DEFAULT NULL
)";

if(mysqli_query($conn, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}





