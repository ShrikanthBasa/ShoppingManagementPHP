<?php include("header.php");
	include('connection.php');
 ?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<style type="text/css">

</style>
<div class="limiter mt-5">
		<div class="container-login100 mt-5">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-33 mt-3">
						User Sign Up
					</span>

					<div class="wrap-input100 rs1 validate-input" >
						<input class="input100" type="text" name="name" placeholder="Name" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="text" name="Username" placeholder="Username" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" required>
						<input class="input100" type="text" name="email" placeholder="Email" pattern=".+@gmail.com">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" id="psw1" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="confirm" placeholder="Confirm Password"  id="psw2" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" onclick="validate()">
							Sign up
						</button>
					</div>
				</form>

				<script type="text/javascript">
					function validate()
					{
						var x = document.getElementById("psw1").value;
						var y = document.getElementById("psw2").value;
						if(x != y)
						{
							alert("Passwords doesn't match");
							return false;
						}
					}
				</script>

				<?php
					if(isset($_POST['name']))
					{
						$name = "'".$_POST['name']."'";
						$email = "'".$_POST['email']."'";
						$uname = "'".$_POST['Username']."'";
						$pass = "'".$_POST['pass']."'";
						$sql = "insert into customer(FNAME,UNAME,PASS,EMAIL) values($name,$uname,$pass,$email)";
						$conn->query($sql);
						sleep(3);
						header("Location: index.php");
						exit();
					}

				 ?>
