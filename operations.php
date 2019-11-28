<?php
  session_start();
  include('connection.php');
  if(!isset($_SESSION["CID"]))
  {
    header("Location: login.php?error=1");
    exit();
  }

  if($_GET["logout"] == 1)
  {
    unset($_SESSION["CID"]);
    unset($_SESSION["UNAME"]);
    header("Location: index.php");
    exit();
  }

  if($_GET["add"] == 1)
  {
    $imei = "'".$_GET["imei"]."'";
    $cid = $_SESSION["CID"];
    $sql2 = "SELECT fk_imei from cart where fk_imei=".$imei;
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      header("Location: cart.php?error=1");
      exit();
    }
      $sql = "insert into cart values($cid,$imei)";
      $conn->query($sql);
      sleep(1);
      header("Location: cart.php");
      exit();
  }

  if($_GET["buy"] == 1)
  {
    $imei = "'".$_GET["imei"]."'";
    $cid = $_SESSION["CID"];
    $sql = "insert into buys values($cid,$imei)";
    $conn->query($sql);
    $sql = "DELETE from cart where fk_cid=".$cid." and fk_imei=".$imei;
    $conn->query($sql);
    sleep(1);
    header("Location: orders.php");
    exit();
  }

  if($_GET["remove"] == 1)
  {
    $imei = "'".$_GET["imei"]."'";
    $cid = $_SESSION["CID"];
    $sql = "DELETE from cart where fk_cid=".$cid." and fk_imei=".$imei;
    $conn->query($sql);
    header("Location: cart.php");
    exit();
  }

 ?>
