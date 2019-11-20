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
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-secondary">
  <img class="brand-logo-light" src="images/logo.png" alt="" width="140" height="47" srcset="images/agency/logo-retina-inverse-280x74.png 2x">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
			<?php
				if(isset($_SESSION["AMail"]))
				{
			?>
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="addProduct.php">Add Product</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="Update.php">Update Product</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="operations.php?logout=1">Logout</a>
			</li>
			<?php
				}
			?>
    </ul>
  </div>
</nav>
