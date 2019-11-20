<?php
  session_start();
  include('connection.php');

  if($_GET["logout"] == 1)
  {
    unset($_SESSION["AMail"]);
    header("Location: ../index.php");
    exit();
  }

  if(isset($_GET["imei"]))
  {
    $imei = "'".$_GET['imei']."'";
    $sql = "DELETE from cart where fk_imei=".$imei;
    $conn->query($sql);
    $sql = "DELETE from buys where fk_imei=".$imei;
    $conn->query($sql);
    $sql = "DELETE from features where FK_IMEI=".$imei;
    $conn->query($sql);
    $sql = "DELETE from products where IMEI=".$imei;
    $conn->query($sql);
    $img = "../images/".$_GET["imei"].".jpg";
    unlink($img);
    header("Location: index.php");
    exit();
  }
 ?>
