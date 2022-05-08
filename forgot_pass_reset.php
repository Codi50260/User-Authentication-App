<?php
include('connect.php');
session_start();
if ($_SESSION['forgotHasPost'] == True){
	$_SESSION['forgotEmail'] = $_POST['email'];
}
$q1 = "What year did you graduate?";
$q2 = "What is the name of your first pet?";
$q3 = "Where did you meet your spouse?";
?>
<?php if ($_SESSION['forgotHasPost'] == True){ $_SESSION['forgotHasPost'] = False;?>
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
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/front_image.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Security Question cannot be empty">
						<select class="input100" name="question" id="question" style="color: #999">
							<option value="" disabled selected>Security Question</option>
							<option value="<?php echo $q1?>"><?php echo $q1?></option>
							<option value="<?php echo $q2?>"><?php echo $q2?></option>
							<option value="<?php echo $q3?>"><?php echo $q3?></option>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-question" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Answer cannot be empty">
						<input class="input100" type="password" name="sec_pass" placeholder=" Security Answer" id="sec_pass">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "New Password cannot be empty">
						<input class="input100" type="password" name="new_pass" placeholder=" New Password" id="new_pass">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset Password
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Back to Sign-In
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
} else if ($_SESSION['forgotHasPost'] == False){
	if (($_POST["question"] == '') and ($_POST["sec_pass"] == '')){
		header("Location: forgot_pass.php");
		exit();
	} else if (($_POST["question"] == '') or ($_POST["sec_pass"] == '')){
		header("Location: forgot_pass.php");
		exit();
	} 

	$question = $_POST["question"];
	$answer = $_POST["sec_pass"];	
	$newPass = $_POST["new_pass"];	
	$email = $_SESSION['forgotEmail'];

	if (($question != '') and ($answer != '')){
		$sql = "UPDATE users SET user_password = '$newPass' WHERE (security_question = '$question') and (security_answer = '$answer') and (user_email = '$email')";

		// Check whether insert was successful
		if ($conn->query($sql) === TRUE) {
			// echo $sql;
			header("Location: Password_reset.php");
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$_SESSION['hasPost'] = False;
	}
}
?>