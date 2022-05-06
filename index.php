
<!-- Add security question for forget_pass.php -->

<?php session_start();
include('connect.php');
$_SESSION['boolen'] = FALSE;

$sql = "SELECT user_email, user_password FROM users";
$result = $conn->query($sql);

$email = [];
$password = [];

if($result){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
			array_push($email, $row["user_email"]);
			array_push($password, $row["user_password"]);
        }
    }
} else {
    echo "Error selecting table " . $conn->error;
}

var_dump($email);
var_dump($password);
?>
<html lang="en">
<head>
	<title>User Authentication App</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
	<script>
		function verify() {
			bool = false

			var test_email = document.getElementById("email").value;
			var test_pass = document.getElementById("password").value;
			console.log(test_email)
			console.log(test_pass)

			if (bool == false){
				document.getElementById("error").style.visibility = "hidden"
				document.getElementById("form").submit();
			} else {
				document.getElementById("error").style.visibility = "visible"
			}
		}
	</script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="library_member.php" id="form" name="search-theme-form">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email" id="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pass" placeholder="Password" id="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<p class="tooltiptext" id="error" style="visibility: hidden; color: #D8000C; background-color: #FFBABA; text-align: center; border-radius: 25px;">Email or Password Incorrect</p>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" onclick="verify()">
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

// if ($_POST) {
// 	$emailPost = $_POST['email'];
// 	$passwordPost = $_POST['pass'];
// 	$check1 = False;
// 	$check2 = False;
// 	$check3 = False;

// 	for ($x = 0; $x < count($email); $x++) {
// 		if ($emailPost == $email[$x]) {
// 			$check1 = True;
// 			$_SESSION['boolen'] = TRUE;
// 		}
// 		if ($passwordPost == $password[$x]) {
// 			$check2 = True;
// 			$_SESSION['boolen'] = TRUE;
// 		}
// 		if ($check1 && $check2) {
// 			$check3 = True;
// 		} else {
// 			$check1 = False;
// 			$check2 = False;
// 		}
// 	}
// 	if ($check3 == True){
// 		echo "User is valid";
// 	}
// }
?>