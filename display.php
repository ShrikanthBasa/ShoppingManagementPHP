<?php include('header.php');
include('connection.php');
session_start();
	$imei = "'".$_GET["imei"]."'";
	if(!isset($_GET["imei"]))
	{
		header("Location: index.php");
    exit();
	}
?>

<style type="text/css">
	.fixedCol{
		position:fixed;
	}

	.MainContent p{
		margin: 0px;
	}
	#sp1{
    display: inline-block;
    width:120px;
		color : green;
		margin-left: 5px;
  }
	button{
		z-index: 0;
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container mainCont mt-5">
	<div class="row ">
		<div class="col">

			<?php
				$sql = "SELECT * FROM products where IMEI=".$imei;
	      $result = $conn->query($sql);
	      if ($result->num_rows > 0) {
	      while($row = $result->fetch_assoc()) {

					?>

					<div class="col-4 fixedCol mt-5">
						<img src="images/<?php echo $row["IMEI"];?>.jpg">
						<div>
						<a href="operations.php?add=1&imei=<?php echo $_GET["imei"] ?>"><button type="button" class="btn btn-success mt-3"><span><i class="fa fa-shopping-cart"></i></span> Add to cart</button></a>
						<a href="buy.php?imei=<?php echo $_GET["imei"] ?>"><button type="button" class="btn btn-warning mt-3"><span><i class="fa fa-bolt"></i></span> Buy now</button></a>
						</div>
					</div>

				</div>

				<div class="col-8 MainContent mt-5">
					<div class="container-fluid">

						<h5><?php echo $row["MODEL"]?></h5>
						<h4 class="ml-5">Rs.<?php echo $row["COST"]?></h4>
						<h5 class="ml-5">IMEI: <?php echo $row["IMEI"]?></h5>
					</div>
					<div class="container-fluid mt-3">
						<h4>Offers</h4>
						<p class="ml-5"><i class="fa fa-cart-plus"></i> 5% Off on Debit Card</p>
						<p class="ml-5"><i class="fa fa-cart-plus"></i> 15% Off on Credit Card</p>
					</div>
					<div class="container-fluid mt-3">
						<h4>Features</h4>
						<div class="ml-5">
							<?php
							$sql2 = "SELECT FEATURE,DESCR FROM features where FK_IMEI="."'".$row["IMEI"]."'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
							while($row2 = $result2->fetch_assoc()) {
									echo '<p><i class="fa fa-check"></i><span id="sp1">'.$row2["FEATURE"]."</span>: ".$row2["DESCR"].'</p>';

									}
							}
							else {
								echo "<p style='color:red'>No Features Available Currently</p>";
							}
							 ?>


						</div>
					</div>
				</div>
			</div>
		</div>


					<?php

					}
				}
 				?>

				<?php include('footer.php'); ?>
