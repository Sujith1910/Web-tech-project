<?php
    session_start();
    $var = $_SESSION["username"];
    $name = $_SESSION["name"];
    $ProductID = $_SESSION["ProductID"];
    $BidErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {      
        include 'connection.php';
        $db=OpenCon();

        $sql= "SELECT * FROM pd WHERE ProductID = '$ProductID'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_row($result);
        $MinBid = $row[3];
        $CurBid = $row[4];
    }
    if (empty($_POST["bid"]))
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Please enter a Bid');
        window.location.href='Bid.php';
        </script>");
        $BidErr ="Error";
    }
    else if ($_POST["bid"] < $MinBid)
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Bid less than Minimum bid');
        window.location.href='Bid.php';
        </script>");
        $BidErr ="Error";
    }
    else if ($_POST["bid"] < $CurBid)
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Bid less than Current bid');
        window.location.href='Bid.php';
        </script>");
        $BidErr ="Error";
    }
    else 
    {
        $CurBid = $_POST["bid"]; 
        $sql = "UPDATE pd SET CurrentBid = '$CurBid' , User = '$name' WHERE ProductID =  '$ProductID' " ;
        switch ($ProductID) 
        {
            case '1':
                $sql1 = "UPDATE userbids SET Product1 = '$CurBid' WHERE Email =  '$var' " ;
                break;
            case '2':
                $sql1 = "UPDATE userbids SET Product2 = '$CurBid' WHERE Email =  '$var' " ;
                break;
            case '3':
                $sql1 = "UPDATE userbids SET Product3 = '$CurBid' WHERE Email =  '$var' " ;
                break;
            case '4':
                $sql1 = "UPDATE userbids SET Product4 = '$CurBid' WHERE Email =  '$var' " ;
                break;
            case '5':
                $sql1 = "UPDATE userbids SET Product5 = '$CurBid' WHERE Email =  '$var' " ;
                break;
        }
        $sql2= "SELECT * FROM productbids WHERE ProductID = '$ProductID'";
        $result = mysqli_query($db,$sql2);
        $row = mysqli_fetch_row($result);
        if($row[1]==0)
        {
            $sql2 = "UPDATE productbids SET Bid1 = '$CurBid', User1 = '$name' WHERE ProductID =  '$ProductID' " ;
        }
        else if($row[3]==0)
        {
            $sql2 = "UPDATE productbids SET Bid2 = '$CurBid', User2 = '$name' WHERE ProductID =  '$ProductID' " ;
        }
        else if($row[5]==0)
        {
            $sql2 = "UPDATE productbids SET Bid3 = '$CurBid', User3 = '$name' WHERE ProductID =  '$ProductID' " ;
        }
        else if($row[7]==0)
        {
            $sql2 = "UPDATE productbids SET Bid4 = '$CurBid', User4 = '$name' WHERE ProductID =  '$ProductID' " ;
        }
        else if($row[9]==0)
        {
            $sql2 = "UPDATE productbids SET Bid5 = '$CurBid', User5 = '$name' WHERE ProductID =  '$ProductID' " ;
        }


        if (mysqli_query($db, $sql) && mysqli_query($db, $sql1) && mysqli_query($db, $sql2))
        {
            $_SESSION["CurrentBid"] = $CurBid;
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully Updated');
                window.location.href='Bid.php';
                </script>");
        }
        else
          echo "Error: " . $sql . "<br>" . mysqli_error($db);
          CloseCon($db);

        
    }

   

?>
