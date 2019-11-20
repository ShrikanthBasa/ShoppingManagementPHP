<?php
session_start();
error_reporting(0);
include('header.php');
include('connection.php');
if(!isset($_SESSION["AMail"]))
{
  header("Location: ../index.php");
  exit();
}
 ?>
 <style media="screen">
   #pimages{
     height: 120px;
     width: 100px;
   }
 </style>

<div class="container" style="margin-top:70px">
  <center><h4>Available Mobiles</h4></center>
  <table class="table mt-3">
     <thead>
       <tr>
         <th>IMEI</th>
         <th>MODEL</th>
         <th>OPERATING SYSTEM</th>
         <th>PRICE</th>
         <th>IMAGE</th>
         <th>DELETE</th>
       </tr>
     </thead>
     <tbody>

       <?php
       $sql = "SELECT * FROM products";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
            echo "<tr>";
             echo '<td>'.$row["IMEI"].'</td>';
             echo '<td>'.$row["MODEL"].'</td>';
             echo '<td>'.$row["OS"].'</td>';
             echo '<td>Rs.'.$row["COST"].'</td>';
             echo '<td><img id="pimages" src="../images/'.$row["IMEI"].'.jpg"></td>';
             echo '<td><a href="operations.php?imei='.$row["IMEI"].'"><button class="btn btn-secondary">Delete</button></a></td>';
             echo '</tr>';
           }
       }
        ?>
     </tbody>
   </table>
</div>
