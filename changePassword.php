<?php
    session_start();
    $passwordErr = "";
    if (empty($_POST["password"]))
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Please enter a password');
        window.location.href='Profile.php';
        </script>");
        $passwordErr ="Error";
    }
    else 
    {
        $pwd = $_POST["password"];
        $passwordErr = "";
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pwd)) 
        {   echo ("<script LANGUAGE='JavaScript'>
            window.alert('Invalid Password Form');
            window.location.href='Profile.php';
            </script>");
            $passwordErr ="Error";
        }
    }
    echo "<script>alert('$pwd')</script>";
    $var = $_SESSION["username"];
    $name = $_SESSION["name"];
    if($passwordErr!="Error")
    {
        include 'connection.php';
        $conn=OpenCon();
    }
    $sql = "UPDATE register SET Password = '$pwd' WHERE Email =  '$var' " ;
    if (mysqli_query($conn, $sql))
    echo ("<script LANGUAGE='JavaScript'>
      window.alert('Succesfully Updated');
      window.location.href='Profile.php';
      </script>");
    else
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
?>
