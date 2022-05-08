
<!-- Add security question for forget_pass.php -->

<?php session_start();
include('connect.php');
$_SESSION['boolen'] = FALSE;

// $sql = "SELECT user_email, user_password FROM users";
// $result = $conn->query($sql);

// $email = [];
// $password = [];

// if($result){
//     if($result->num_rows > 0){
//         while($row = $result->fetch_assoc()) {
// 			array_push($email, $row["user_email"]);
// 			array_push($password, $row["user_password"]);
//         }
//     }
// } else {
//     echo "Error selecting table " . $conn->error;
// }

// var_dump($email);
// var_dump($password);
?>
<html lang="en">
<head>
	<title>User Authentication App</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/img.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/front_image.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" id="form" name="search-theme-form">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: Mark@gmail.com">
						<input class="input100" type="text" name="email" placeholder="Email" id="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password cannot be empty">
						<input class="input100" type="password" name="pass" placeholder="Password" id="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<p class="tooltiptext" id="error" style="visibility: hidden; color: #D8000C; background-color: #FFBABA; text-align: center; border-radius: 25px;">Email or Password Incorrect</p>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot_pass.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="sign_up.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php
if ($_POST){
	$email = $_POST["email"];
	$password = $_POST["pass"];

	$_SESSION['email_sign_in'] = $email;

	if (($email != '') and ($password != '')){
		$userValid = mysqli_query($conn, "SELECT user_password, user_email FROM users WHERE (user_password = '".$_POST['pass']."' AND user_email = '".$_POST['email']."')");
		if(mysqli_num_rows($userValid)) {
			echo "<script> location.href='library_member.php'; </script>";
        	exit;
		}
	}
}
?>