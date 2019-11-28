<?php
  include('header.php');
  include('connection.php');
  $imei = "'".$_GET["imei"]."'";
	if(!isset($_GET["imei"]) || !isset($_SESSION["CID"]))
	{
		header("Location: login.php?error=1");
    exit();
	}
 ?>
<style media="screen">
  .col-2 , .col-3, .col-6{
    margin: 10px;
  }
  .card-img-top{
    width:100%;
    height: 400px;
  }
  .prow{
    -webkit-box-shadow: -2px 3px 24px -9px rgba(0,0,0,0.75);
    -moz-box-shadow: -2px 3px 24px -9px rgba(0,0,0,0.75);
    box-shadow: -2px 3px 24px -9px rgba(0,0,0,0.75);
    margin-top: 10px;
    margin-bottom: 10px;
  }
  #sp1{
    display: inline-block;
    width:120px;
  }
</style>

 <div class="container" style="margin-top:80px">
   <?php
     $sql = "SELECT * FROM products where IMEI=".$imei;
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {

            ?>
            <form method="post">
            <div class="row prow">
              <div class="col-2 ">
                <img src="images/<?php echo $row["IMEI"]; ?>.jpg" alt="IMAGE">
              </div>
              <div class="col-6 mt-3 ml-3">
                 <h4 class=""><?php echo $row["MODEL"]; ?></h4>
                 <h5 class="mt-3">Shipping Address</h5>
                 <?php
                 $sql2 = "SELECT ADDRESS FROM customer where C_ID=".$_SESSION["CID"];
                 $result2 = $conn->query($sql2);
                 if ($result2->num_rows > 0) {
                 while($row2 = $result2->fetch_assoc()) {
                    $address = $row2["ADDRESS"];
                 }
               }
                  ?>
                 <textarea name="addr" rows="5" cols="50" required><?php echo $address ?></textarea>

              </div>
              <div class="col-3 mt-3">
                 <h4 class="">Rs.<?php echo $row["COST"]; ?></h4>
                 <input type="radio" name="rad1" required> Debit Card <br>
                 <input type="radio" name="rad1"> Credit Card <br>
                 <input type="radio" name="rad1"> UPI <br>
                 <input type="radio" name="rad1"> COD <br>
                 <button class="btn btn-primary mb-auto mt-3" type="submit">Buy Now</button>
              </div>
            </div>

            <?php
         }
         echo '<center><img src="offer.png" class="mt-3"></center>';
     }
    ?>
    </div>
    </form>
    <?php
        if(isset($_POST["addr"]) && isset($_POST["rad1"]))
        {
          $addr = "'".$_POST["addr"]."'";
          $sql3 = "UPDATE customer set ADDRESS=".$addr." where C_ID=".$_SESSION["CID"];
          $conn->query($sql3);
          $loc = "Location: operations.php?buy=1&imei=".$_GET['imei'];
          header($loc);
          exit();
        }
     ?>

    <?php include('footer.php') ?>
