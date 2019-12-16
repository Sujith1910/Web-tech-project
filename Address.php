<?php
  session_start();
    $AddressErr = "";
    if (empty($_POST["address"]))
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Please enter a Address');
        window.location.href='Profile.php';
        </script>");
        $AddressErr ="Error";
    }
    else 
    {
        $Add = $_POST["address"];
        $AddressErr= "";
    }
    echo "<script>alert('$Add')</script>";
    $var = $_SESSION["username"];
    $name = $_SESSION["name"];
    if($AddressErr!="Error")
    {
      include 'connection.php';
      $db=OpenCon();
    }
    $sql = "UPDATE register SET Address = '$Add' WHERE Email =  '$var' " ;
    if (mysqli_query($db, $sql))
    {
        $_SESSION["Address"] = $Add;
    echo ("<script LANGUAGE='JavaScript'>
      window.alert('Succesfully Updated');
      window.location.href='Profile.php';
      </script>");
    
    }
    else
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
?>
