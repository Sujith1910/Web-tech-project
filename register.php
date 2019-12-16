<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SignUp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Design.css">
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

.container-small {
    max-width: 100%;
}
.error {color: #FF0000;}}
  </style>
  </head>
  <?php
      $fnameErr = $lnameErr = $emailErr = $passwordErr = $checkboxErr = "";
      $submitErr = "wrong";
      $fname = $lname = $email = $password = "";
      
      if($_SESSION['username']== "out")
      {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          if (empty($_POST["fname"])) 
            $fnameErr = "*First Name is required";
          else 
          {
            $fname = test_input($_POST["fname"]);
            $fnameErr = "";
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
              $fnameErr = "*Only letters and white space allowed";
          }
              
          if (empty($_POST["lname"]))
            $lnameErr = "*Last Name is required";
          else 
          {
            $lname = test_input($_POST["lname"]);
            $lnameErr = "";
            if (!preg_match("/^[a-zA-Z ]*$/",$lname))
              $lnameErr = "*Only letters and white space allowed";
          }
          
          if (empty($_POST["email"]))
            $emailErr = "*Email is required";
          else 
          {
            $email = test_input($_POST["email"]);
            $emailErr = "";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
              $emailErr = "*Invalid email format";
          }
                
          if (empty($_POST["password"]))
            $passwordErr = "*Please Enter a Password";
          else 
          {
            $password = test_input($_POST["password"]);
            $passwordErr = "";
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) 
              $passwordErr = "*Invalid Password";
          }

          if(!isset($_POST['tnc']))
            $checkboxErr = "*Please check the box to proceed";
          else       
            $checkboxErr = "";

          if($fnameErr=="" && $lnameErr=="" && $emailErr=="" && $passwordErr=="" && $checkboxErr=="")
          {
            $submitErr="go";
          }

          if(isset($_POST["submit"]))
          {
            if($submitErr == "wrong")
            {
              echo "";
            }
            else 
            {
              include 'connection.php';
              $conn=OpenCon();
              $sql = "INSERT INTO register(fname,lname,Email,Password)VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["password"]."')";
              $bids ="INSERT INTO userbids(Email)VALUES ('".$_POST["email"]."')";

              if (mysqli_query($conn, $sql))
              {
                //echo "<script type='text/javascript'> alert('Registered')</script>";
              }
              else
                echo "Error: " . $sql . "" . mysqli_error($conn);
              if (mysqli_query($conn, $bids))
              {
                  //echo "<script type='text/javascript'> alert('Registered')</script>";
                  echo "<script type='text/javascript'> window.location.href = 'login.php' </script>";
              }
                else
                  echo "Error: " . $bids . "" . mysqli_error($conn);
              CloseCon($conn);
            }
          }
        }
      }
      else 
      {
        echo "<script> alert('You are already logged in')</script>";
      }

      
      function test_input($data) 
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
  <body> 


    <h1 class="symboll"><a href="Homepage.php"><img src="logo.jpg" width="160px" height="60px"></a></h1>
    <br>
    <div class="container container-small signupcd">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="form-row">
  	      <div class="form-group col-md-12">
            <label for="inputname1">First Name</label>
            <input type="text" class="form-control" id="inputname1" name="fname" value="<?php echo $fname;?>" placeholder="First Name">
            <span class="error"> <?php echo $fnameErr;?></span>
            <br>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputname2">Last Name</label>
            <input type="text" class="form-control" id="inputname2" name="lname" value="<?php echo $lname;?>" placeholder="Last Name">
            <span class="error"> <?php echo $lnameErr;?></span>
            <br>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control" id="inputEmail4" name="email" value="<?php echo $email;?>" placeholder="Email">
            <span class="error"> <?php echo $emailErr;?></span>
            <br>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password">
            <span class="error"> <?php echo $passwordErr;?></span>
            <br>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input required" type="checkbox" name="tnc" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              I agree to the <a href="#">Terms and Conditions</a>
            </label>
            <br>
            <span class="error"> <?php echo $checkboxErr;?></span>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-secondary">Sign up</button>

      </form>
      <div class="form-group">
        <label class="form-check-label">
              Already have an account? <a href="login.php"> <button class="btn btn-secondary">Login</button> </a>
        </label>
        </div>
    </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>