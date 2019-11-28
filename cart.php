<?php
  include('header.php');
  include('connection.php');
  session_start();
  if(!isset($_SESSION["UNAME"]))
	{
		header("Location: index.php");
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

 <div class="container" style="margin-top:30px;margin-bottom:30px">
   <center><h3>YOUR CART</h3></center>
   <?php
     $sql = 'SELECT * FROM products where IMEI IN(select fk_imei from cart where fk_cid='.$_SESSION["CID"].')';
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {

            ?>

            <div class="row prow">
              <div class="col-2 ">
                <img src="images/<?php echo $row["IMEI"]; ?>.jpg" alt="IMAGE">
              </div>
              <div class="col-6 mt-3 ml-3">
                 <h4 class=""><?php echo $row["MODEL"]; ?></h4>
                 <?php
                 $sql2 = "SELECT FEATURE,DESCR FROM features where FK_IMEI="."'".$row["IMEI"]."'"." LIMIT 7";
                 $result2 = $conn->query($sql2);
                 if ($result2->num_rows > 0) {
                 while($row2 = $result2->fetch_assoc()) {
                       echo '<span id="sp1">'.$row2["FEATURE"].'</span>';
                       echo ' - '.$row2["DESCR"].'<br>';

                     }
                 }
                 else {
                   echo 'No features are currently available';
                 }
                  ?>
              </div>
              <div class="col-3 mt-3">
                 <h4 class="ml-3">Rs.<?php echo $row["COST"]; ?></h4>
                 <h6 class="ml-3"><strike>Rs.<?php echo round($row["COST"] + ($row["COST"])*0.1);?></strike> 10% Off</h6>
                 <h6 class="ml-3">Rs.<?php echo round($row["COST"]*0.8) ?> OFF on Exchange</h6>
                 <a href="buy.php?imei=<?php echo $row["IMEI"] ?>"><button class="btn btn-primary mb-auto ml-3 mt-3">Buy Now</button></a>
                 <a href="operations.php?remove=1&imei=<?php echo $row["IMEI"] ?>"><button class="btn btn-primary mb-auto ml-3 mt-3">Remove</button></a>
              </div>
            </div>

            <?php
         }

          echo '<center><img src="offer.png" class="mt-3"></center>';

     }
     else{
       echo '<center>';
       echo "<h4 style='color:red'>No Items in Your Cart!!</h4>";
       echo '<img src="noitem.png">';
       echo "</center>";
     }
    ?>
    </div>
    <?php include('footer.php') ?>
