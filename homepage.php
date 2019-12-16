<?php
  session_start();
  $var = $_SESSION["username"];
  $name = $_SESSION["name"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bid4Car</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Design.css">
</head>
<body onload="typeWriter()">
<nav id="nvbr" class="navbar fixed-top navbar-expand-lg  navbar-dark ">
  <a class="navbar-logo" href="Homepage.php"><img src="logo.jpg" width="100px" height="40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
     <form class="form-inline " method="post" action="Bid.php">
      <input class="form-control mr-sm-2 ml-5 " type="search" name="search" placeholder="Search" aria-label="Search">
      <input type="submit" value="Search" class="btn btn-primary">
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
              document.write("<a class='dropdown-item' href='Profile.php'>" + name + "</a>");
              document.write("<a class='dropdown-item' href='index.php'>Logout</a>");
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
        document.write("<li class='nav-item mx-2'> <a class='nav-link' href='index.php'>Logout</a></li>");
      }
    </script>
    </div>
    </ul>

  </div>
</nav>

<div class="container">
<h1><big><p id="demo1"></p></h1></big>
<script>
var i = 0;
var txt = 'Sellers of the past meet buyers of the future!';
var speed = 80;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo1").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
</script>
	<h2 style="color: rgb(255,255,242);">Trending deals!</h2>
  <form method="post" action="Bid.php">
	<div class="row justify-content-center">
	<div class="card text-black" id="cdd" style="width: 18rem;">
	  <img src="Mustang.jpg" class="card-img-top" alt="...">
	  <div class="card-body">
      <h5 class="card-title">Ford Mustang 1967</h5>
	    <p class="card-text">Base Price : 70000</p>
	    <input type="submit" value="Place Bid" name="Mustang" class="btn btn-primary">
	  </div>
	</div>
	<div class="card text-black" id="cdd" style="width: 18rem;">
	  <img src="Stingray.jpg" class="card-img-top" alt="...">
	  <div class="card-body">
      <h5 class="card-title">Chevrolet Corvette Stingray 1968</h5>
	    <p class="card-text">Base Price : 90000</p>
      <input type="submit" value="Place Bid" name="Stingray" class="btn btn-primary">
	  </div>
	</div>
	<div class="card text-black" id="cdd" style="width: 18rem;">
	  <img src="Benz.jpg" class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title">1980 Mercedes-Benz SL</h5>
	    <p class="card-text">Base Price : 85000</p>
	    <input type="submit" value="Place Bid" name="Benz" class="btn btn-primary">
	  </div>
	</div>
  </form>
</div>
</div>
<hr>
<footer class="page-footer font-small stylish-color-dark pt-4">
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
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='Profile.php'>" + name + "</a></li>");
        document.write("<li class='list-inline-item'> <a class='btn btn-secondary btn-rounded' href='index.php'>Logout</a></li>");
      }
    </script>
  </ul>
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="homepage.php"> <img src="logo.jpg" width="140px" height="40px">
</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

