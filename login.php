<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Design.css">
    <style type="text/css">
        @media (min-width: 768px) {
    .container-small {
        width: 200px;
    }
} 
@media (min-width: 992px) {
    .container-small {
        width: 300px;
    }
} 
@media (min-width: 1200px) {
    .container-small {
        width: 500px;
    }
}

.container-small{
    max-width: 100%;
}

    </style>
</head>
<body>
<?php
        $emailErr = $passwordErr = "";
        $myemail = $mypassword = "";
        include 'connection.php';
        $db=OpenCon();
        if($_SESSION['username']== "out")
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $myemail="";
                $mypassword="";
                $myemail = $_POST['email'];
                $mypassword = $_POST['password']; 
                $sql = "SELECT * FROM register WHERE email = '$myemail'";
                if($result = mysqli_query($db,$sql))
                {
                    if($row = mysqli_fetch_row($result))
                    {
                        if($row[3] == $mypassword)
                        {
                            echo "<script type='text/javascript'> alert('Logged In');
                            $('#email').val() = '' ; $('#password').val() = '';
                            </script>"; 
                            header("Location: homepage.php");
                            $_SESSION["username"] = $myemail;
                            $_SESSION["name"] = $row[0];
                            $_SESSION["lname"] = $row[1];
                            $_SESSION["Address"] = $row[4];
                            
                        }
                        else 
                        {
                            echo "<script type='text/javascript'> alert('Invalid Password!') ; 
                            $('#email').val() = '' ; $('#password').val() = '';
                            </script>";
                        }
                    }
                    else 
                    {
                        echo "<script type='text/javascript'> alert('Email does not exist!') ; 
                        $('#email').val() = '' ; $('#password').val() = '';
                        </script>";
                    }
                }
                CloseCon($db);
            }
        }
        else 
        {
            echo "<script> alert('You are already logged in')</script>";
            header("Location: homepage.php");

        }
?>


    <h1 class="symboll"><a href="homepage.php"><img src="logo.jpg" width="100px" height="40px"></a></h1>
	<div class="container container-small signupcd" style="margin-top: 200px;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control required" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <span class="error"> <?php echo $emailErr;?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control required" id="password" placeholder="Password">
                <span class="error"> <?php echo $passwordErr;?></span>
            </div>
            <br>
            <input type="submit" class="btn btn-secondary" value = "Submit">
            </form>
            <br>
            <div class="form-group">
                <label>Don't have an account?</label>
                <a href="register.php"><button class="btn btn-secondary">Register</button></a>
            </div>
            </div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>