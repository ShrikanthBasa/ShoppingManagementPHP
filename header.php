<?php
	session_start();
 ?>
<!DOCTYPE html>
<html>
<style type="text/css">
	body{
		font-family: helvetica!important;
	}
</style>
<body>
	<source src="bootstrap/js/bootstrap.min.js" type="text/javascript">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
  <img class="brand-logo-light" src="logo.png" alt="" width="140" height="47" srcset="images/agency/logo-retina-inverse-280x74.png 2x">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>

			<?php
				if(isset($_SESSION["UNAME"]))
				{
			?>
			<li class="nav-item active">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
			<li class="nav-item active">
        <a class="nav-link" href="orders.php">Your Orders</a>
      </li>
			<li class="nav-item active">
				<a class="nav-link" href="operations.php?logout=1">Logout</a>
			</li>
			<?php
				}
			?>

			<?php
				if(!isset($_SESSION["UNAME"]) && basename($_SERVER['PHP_SELF'])!= "login.php")
				{
					?>
			<li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
      </li>

			<?php
				}
			?>

    </ul>
  </div>
</nav>
