<?php include("header.php");
include('connection.php');
session_start();
if(isset($_GET['error']))
{
	echo '<script language="javascript">alert("To Buy or Add to Cart you need to login First")</script>';
}
?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<style type="text/css">
	.disRow button{
		width:100%;
		margin: 0px;
	}
	#admin , #user{
		display: none;
	}
</style>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<div class="row text-center disRow">
						<div class="col">
							<button type="button" class="btn btn-primary" onclick="hide('admin')">User Login</button>
						</div>
						<div class="col">
							<button type="button" class="btn btn-primary" onclick="hide('user')">Admin Login</button>
						</div>
					</div>


				<form class="login100-form validate-form" id="admin" method="post">
					<span class="login100-form-title p-b-33 mt-3">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="adminemail" placeholder="Admin Email" pattern=".+@gmail.com">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="adminpass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>

				<form class="login100-form validate-form" id="user" method="post">
					<span class="login100-form-title p-b-33 mt-3">
						User Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="useremail" placeholder="User Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="userpass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<span style="float:right;margin-top:5px;"><a href="signup.php">signup?</a></span>
				</form>
			</div>
		</div>
	</div>


	<?php
			if(isset($_POST['useremail']))
			{
				$email = "'".$_POST['useremail']."'";
				$pass = $_POST['userpass'];
				$dbpass = "";
				$cid = "";
				$uname = "";
				$sql = "SELECT C_ID,UNAME,PASS FROM customer where UNAME=".$email;
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        	$dbpass = $row["PASS"];
							$cid = $row["C_ID"];
							$uname = $row["UNAME"];
				    }
				}

				if($pass == $dbpass)
				{
					$_SESSION["CID"] = $cid;
					$_SESSION["UNAME"] = $uname;
					header("Location: index.php");
					exit();
				}
			}


			if(isset($_POST['adminemail']))
			{
				$email = $_POST['adminemail'];
				$pass = $_POST['adminpass'];
				if($email == "abc@gmail.com" && $pass == "123")
				{
					sleep(2);
					$_SESSION["AMail"] = $email;
					header("Location: admin/index.php");
					exit();
				}
			}
	 ?>


	<script type="text/javascript">
		function hide(obj){
			var x = document.getElementById(obj);
			var y = document.getElementById('admin');
			var z = document.getElementById('user');
			y.style.display = 'block';
			z.style.display = 'block';
			x.style.display = "none";
		}
	</script>
	<?php include('footer.php') ?>
