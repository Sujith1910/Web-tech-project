<?php
function OpenCon()
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "onlineauction";
    $conn = new mysqli ($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
?>