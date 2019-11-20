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

 <div class="row mt-5">
   <div class="col-6">
     <div class="limiter">
      <div class="container-login100 mt-5">
        <div class="wrap-login100">
          <form class="login100-form validate-form flex-sb flex-w" method="post" enctype="multipart/form-data">
            <span class="login100-form-title p-b-51">
              Update Product
            </span>

            <div class="wrap-input100 validate-input m-b-16">
              <select class="input100" name="Uproduct" style="border:none; -webkit-appearance: none;">
                <?php
                $sql = "SELECT IMEI,MODEL FROM products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                      echo '<option>'.$row["IMEI"].'-'.$row["MODEL"].'</option>';
                    }
                }
                 ?>
              </select>
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-16">
              <input class="input100" type="number" name="price" placeholder="Price" required>
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-16">
              <input class="input100" type="textarea" name="desc" placeholder="Remarks(Not required)" disabled>
              <span class="focus-input100"></span>
            </div>

              <div class="container-login100-form-btn m-t-17">
              <button class="login100-form-btn" type="submit">
                Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
   </div>

   <div class="col-6">
     <div class="limiter">
      <div class="container-login100 mt-5">
        <div class="wrap-login100">
          <form class="login100-form validate-form flex-sb flex-w" method="post" enctype="multipart/form-data">
            <span class="login100-form-title p-b-51">
              Add Features
            </span>

            <div class="wrap-input100 validate-input m-b-16">
              <select class="input100" name="Fproduct" style="border:none; -webkit-appearance: none;">
                <?php
                $sql = "SELECT IMEI,MODEL FROM products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                      echo '<option>'.$row["IMEI"].'-'.$row["MODEL"].'</option>';
                    }
                }
                 ?>
              </select>
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-16">
              <input class="input100" type="text" name="feature" placeholder="Feature Name" required>
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-16">
              <input class="input100" type="textarea" name="desc" placeholder="Feature Decription" required>
              <span class="focus-input100"></span>
            </div>

              <div class="container-login100-form-btn m-t-17">
              <button class="login100-form-btn" type="submit">
                Add Feature
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
   </div>
 </div>

 <?php
    if(isset($_POST["Uproduct"]))
    {
      $price = $_POST["price"];
      $parts = explode('-', $_POST["Uproduct"]);
      $imei = $parts[0];
      $sql = "update products set COST=".$price." where IMEI=".$imei;
      $conn->query($sql);
      echo '<script language="javascript">alert("Updated successfully")</script>';
    }

    if(isset($_POST["Fproduct"]))
    {
      $feature = "'".$_POST["feature"]."'";
      $parts = explode('-', $_POST["Fproduct"]);
      $imei = "'".$parts[0]."'";
      $desc = "'".$_POST["desc"]."'";
      $sql = "insert into features values($imei,$feature,$desc)";
      $conn->query($sql);
      echo '<script language="javascript">alert("Feature Successfully Added")</script>';
    }
  ?>
