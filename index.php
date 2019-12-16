<?php 
    session_start();
    $_SESSION["username"] = "out";
    $_SESSION["name"] = " ";
    echo "<script> window.location.href = 'homepage.php'</script>";
?> 

