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
 <link rel="stylesheet" type="text/css" href="css/main.css">
 <link rel="stylesheet" type="text/css" href="css/util.css">

 <div class="limiter">
  <div class="container-login100 mt-5">
    <div class="wrap-login100">
      <form class="login100-form validate-form flex-sb flex-w" method="post" enctype="multipart/form-data">
        <span class="login100-form-title p-b-51">
          Add Product
        </span>
        <div class="wrap-input100 validate-input m-b-16">
          <input class="input100" type="text" name="imei" placeholder="IMEI" required>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-16">
          <input class="input100" type="text" name="os" placeholder="OS" required>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-16">
          <input class="input100" type="text" name="model" placeholder="Model" required>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input m-b-16">
          <input class="input100" type="number" name="cost" placeholder="Cost" required>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-16">
          <input type="file" name="banner" placeholder="Cost" required>
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn m-t-17">
          <button class="login100-form-btn" type="submit">
          Add
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php

  if(isset($_POST['imei']))
  {
    $imei = "'".$_POST['imei']."'";
    $os = "'".$_POST['os']."'";
    $model = "'".$_POST['model']."'";
    $cost = $_POST['cost'];

    $sql = "insert into products values($imei,$os,$model,$cost)";
    $conn->query($sql);

    $banner=$_FILES['banner']['name'];
    $expbanner=explode('.',$banner);
    $bannerexptype=$expbanner[1];
    $bannername= $_POST['imei'].'.'.$bannerexptype;
    $bannerpath="../images/".$bannername;
    move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath);
    echo '<script language="javascript">alert("Added successfully")</script>';
   }
 ?>
