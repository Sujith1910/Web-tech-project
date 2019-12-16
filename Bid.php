<?php 
  session_start();
  $var = $_SESSION["username"];
  $name = $_SESSION["name"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bid Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Design.css">
  <style>
        p {
            text-align: left;
            font-size: 20px;
            margin-top: 0px;
            overflow: hidden;
          }
        div{
              text-align: left;
          }
          .prdt
          {
            border-radius: 5px;
            margin-right: 200px;
            margin-left: 200px;
            padding-right: 30px;
            display: block;
            margin-top:80px;
            background-color: rgba(38, 38, 38, 0.93);
            color: rgb(255,255,242);
          }
          .pttt
          {
            margin-bottom: 150px;
            margin-right: 40px;
            float: left;
          }
          .deets
          {
            margin-left: 30px;
            float:right;
          }
        button{
                color:black;
                font-size: 20px;
          }
          table, td, th
          {
            border: 1px solid black;
            padding-left: 100px;
            padding-right: 100px;
          }
          .demo:after 
          { content: ''; clear: both; visibility: hidden; 
        }
          #pass, #add , #exp 
          {
              display:none;
          }
          #active
          {
            display:block;
          }
        </style>

</head>
<body onload=logged()>
    <?php 
      session_start();
      $var = $_SESSION["username"];
      $name = $_SESSION["name"];
     if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
            if(isset($_POST['Mustang']))
            {
              $_SESSION["ProductID"] = '01';
            }
            else if(isset($_POST['Stingray']))
            {
              $_SESSION["ProductID"] = '02';
            }
            else if(isset($_POST['Benz7']))
            {
              $_SESSION["ProductID"] = '03';
            }
      }
      $ProductID = $_SESSION["ProductID"];
      include 'connection.php';
      $conn=OpenCon();

        $sql= "SELECT * FROM pd WHERE ProductID = '$ProductID'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0)
         {
          while($row = $result->fetch_assoc()) {
              $image=$row['ImgName'];
              $pname=$row['ProductName'];
              $minbid=$row['MinimumBid'];
              $curbid=$row['CurrentBid'];
              $cbidby=$row['User'];
              $details=$row['Details'];
                  
              }
            } 
            else {
              echo "0 results";
          }

          $sql= "SELECT * FROM productbids WHERE ProductID = '$ProductID'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
           {
            while($row = $result->fetch_assoc()) {
                $bid1=$row['Bid1'];
                $bid2=$row['Bid2'];
                $bid3=$row['Bid3'];
                $bid4=$row['Bid4'];
                $bid5=$row['Bid5'];
                $User1=$row['User1'];
                $User2=$row['User2'];
                $User3=$row['User3'];
                $User4=$row['User4'];
                $User5=$row['User5'];
                    
                }
              } 
              else {
                echo "0 results";
            }

    ?>
<nav id="nvbr" class="navbar fixed-top navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="Homepage.php"><img src="logo.jpg" width="100px" height="40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
     <form class="form-inline " action="">
      <input class="form-control mr-sm-2 ml-5 " type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Hottest deals</a>
          <a class="dropdown-item" href="#">Categories</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Past bids</a>
          <a class="dropdown-item" href="#">Wishlist</a>
          <div class="dropdown-divider"></div>

          <script type="text/javascript">
            var uname = "<?php echo $var ?>";
            var name = "<?php echo $name ?>";
            if (uname=="out")
            {
              document.write("<a class='dropdown-item' href='register.php'>Sign Up</a>");
              document.write("<a class='dropdown-item' href='login.php'>Login</a>");
            }
            else
            {
              document.write("<a class='dropdown-item' href='Profile.html'>" + name + "</a>");
              document.write("<a class='dropdown-item' href='logout.php'>Logout</a>");
            }
          </script>


          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Seller.html">Become a seller</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">About Us</a>
          <a class="dropdown-item" href="#">Contact Us</a>
        </div>
      </li>
     <script type="text/javascript">
      var uname = "<?php echo $var ?>";
      var name = "<?php echo $name ?>";
      if (uname=="out")
      {
        document.write("<li class='nav-item mx-2'> <a class='nav-link' href='register.php'>Sign Up</a></li>");
        document.write("<li class='nav-item mx-2'> <a class='nav-link' href='login.php'>Login</a></li>");
      }
      else
      {
        document.write("<li class='nav-item mx-2'> <a class='nav-link' href='Profile.php'>" + name + "</a></li>");
        document.write("<li class='nav-item mx-2'> <a class='nav-link' href='logout.php'>Logout</a></li>");
      }
    </script>
    </div>
    </ul>

  </div>
</nav>
<div class="demo">
  <div id="product" class = "prdt">
        <img src="<?php echo $image; ?>"  class="pttt" align="left" alt="try again" width="600px" height="400px">
        <p class="deets">
        <h1><?php echo $pname; ?></h1>
        <h3>Minimum bid : <?php echo $minbid; ?></h3>
        <h3 id="bid">Current bid: <?php echo $curbid; ?></h3>
        <p id="demo"></p>
        <h3>Features : </h3><br><ul><?php $deets=explode("~",$details);
        foreach($deets as $val)
          echo "<li> $val </li>";
         ?>
        </ul>
        <div id="active">
          <button class="btn btn-primary" onclick="change()">Place bid</button>
          <div id="pass">
            <form method="post" action="NewBid.php"> 
                <div class="form-group">
                    <input type="number" name="bid" class="form-control required" id="bid" placeholder=" Enter bid">
                  </div>
                <input type="submit" class="btn btn-secondary" value = "Submit">
                </form>
          </div>
        <button class="btn btn-primary" onclick="viewall()">View all bids</button>
        <div id="add">
                 <table>
                  <tr>
                    <th>Username</th>
                    <th>Bid page</th>
                  </tr>
                  <tr>
                    <td><?php echo $User1; ?></td>
                    <td><?php echo $bid1; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $User2; ?></td>
                    <td><?php echo $bid2; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $User3; ?></td>
                    <td><?php echo $bid3; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $User4; ?></td>
                    <td><?php echo $bid4; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $User5; ?></td>
                    <td><?php echo $bid5; ?></td>
                  </tr>
                 </table>
        </div>
      </div>
      <div id="exp">
          <h3 id="bid">Bid Winner: <?php echo $cbidby; ?></h3>
        </div>
      </p>
      <script>
            function expiry(exp) 
            {
              if(exp==1)
              {
                 document.getElementById("active").style.display = "none";
                 document.getElementById("exp").style.display = "block";
                <?php
                        $sql = "UPDATE register SET ProductWon = '$ProductID' WHERE fname =  '$cbidby' " ;
                        mysqli_query($conn, $sql) ;
                ?>
              }
            }
            function logged() 
            {
              var log ="<?php echo $var ?>";
              if(log=="out")
              {
                 document.getElementById("active").style.display = "none";

              }
            }
            function change() 
            {
              var st = document.getElementById("pass").style.display;
              if(st == "none")
                document.getElementById("pass").style.display = "block";
              else
              document.getElementById("pass").style.display = "none";
            }
            function viewall() 
            {
              var st = document.getElementById("add").style.display;
              if(st == "none")
                document.getElementById("add").style.display = "block";
              else
              document.getElementById("add").style.display = "none";
            }
      </script>
      
      
      <script>
        var value_initial=0;

        var countDownDate = new Date("Nov 23, 2019 15:37:25").getTime();
        var x = setInterval(function() {
        
          var now = new Date().getTime();
            
          var distance = countDownDate - now;
            
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        document.getElementById("demo").innerHTML = "Time left: " + days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
        
          if (distance < 0) {
            clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        expiry(1);
          }
        }, 1000);


        </script>
    </div>
  </div>
  </div>

<hr>
<footer class="page-footer font-small  pt-4">
  <div class="text-center text-md-left">
    <div class="row">
      <div class="col-md-4 mx-auto">
  <ul class="list-unstyled list-inline text-center py-2">

    <script type="text/javascript">
      var uname = "<?php echo $var ?>";
      var name = "<?php echo $name ?>";
      if (uname=="out")
      {
        document.write("<li class='list-inline-item'> <h5 class='mb-1'>Register for free or Login</h5></li>");
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='register.php'>Sign Up</a></li>");
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='login.php'>Login</a></li>");
      }
      else
      {
        document.write("<li class='list-inline-item'> <h5 class='mb-1'>Visit your Account or Logout </h5></li>");
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='Profile.html'>" + name + "</a></li>");
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='logout.php'>Logout</a></li>");
      }
    </script>
  </ul>
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="#!"> Brand
</footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
