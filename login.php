<?php
    include "include/session.php";
    include "include/functions.php";
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    unset($_SESSION['errors']); 

    require_once __DIR__ . '/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Login 
    if (isset($_POST['login_user'])) {
        $user_name = mysqli_real_escape_string($conn, $_POST['username']);
        $user_password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($user_name) or empty($user_password)) {
            array_push($errors, " Please fill in all the required fields.");
        }

        if (count($errors) == 0) {
            $check_query = "SELECT username FROM user WHERE username = '$user_name'
            UNION
            SELECT admin_username FROM admin_ WHERE admin_username = '$user_name'";
            $check_results = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_results) == 0) {
                array_push($errors, " User does not exist.");
            } else {
                $query = "SELECT username, user_password FROM user WHERE username = '$user_name' AND user_password = '$user_password'"; 
                $admin_query = "SELECT admin_username, admin_password FROM admin_ WHERE admin_username = '$user_name' AND admin_password = '$user_password'";
                $results = mysqli_query($conn, $query);
                $admin_results = mysqli_query($conn, $admin_query);
                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['username'] = $user_name;
                    $_SESSION['success'] = "Logged In";
                    $_SESSION['pop_up'] = TRUE;
                    if (isset($_SESSION['redirect_to'])) {
                        $redirectUrl = $_SESSION['redirect_to'];
                        unset($_SESSION['redirect_to']); 
                        header("Location: " . $redirectUrl); 
                        exit();
                    } else {
                        header('Location: index.php');
                        exit();
                    }
                } elseif (mysqli_num_rows($admin_results) == 1) {
                    $_SESSION['username'] = $user_name;
                    $_SESSION['success'] = "Logged In";
                    if (isset($_SESSION['redirect_to'])) {
                        $redirectUrl = $_SESSION['redirect_to'];
                        unset($_SESSION['redirect_to']); 
                        header("Location: " . $redirectUrl); 
                        exit();
                    } else {
                        header('Location: view_user.php');
                        exit();
                    }
                } else {
                    array_push($errors, " Incorrect username or password.");
                }
            } 
        } else {
            $_SESSION['errors'] = $errors;
            header('Location: login.php'); 
            exit();
        }
    }

    //Send email to the email get
    if (isset($_POST['forgot_user'])){
        if(empty($_POST['forgot_email'])) {
            array_push($errors, " Please fill in your email.");
        } elseif (!filter_var($_POST['forgot_email'], FILTER_VALIDATE_EMAIL)) {
            array_push($errors, " Invalid email format.");
        } else {
            $forgot_email = sanitise_input($_POST['forgot_email']);
            $check_exist = "SELECT username, email FROM user WHERE email = '$forgot_email'";
            $check_results = mysqli_query($conn, $check_exist);
            if (mysqli_num_rows($check_results) > 0) {
                $forgot_username = mysqli_fetch_assoc($check_results)['username']; 
                $to = $forgot_email; 
                $otp = rand(100000, 999999); 
                $subject = "Reset Your Password"; 
                $message = "Hi $forgot_username, \n\nForgot your password?\nWe received a request to reset the password for your account.\n\nYour verification code is: $otp\n\nIf you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.\n\nThanks,\nGreen Life"; 
                if (sendEmail($to, $subject, $message)){ 
                    $otp_time = date("Y-m-d H:i:s"); 
                    $insert_otp = "INSERT INTO otp (email, otp, otp_time) VALUES ('$forgot_email', '$otp', '$otp_time') ON DUPLICATE KEY UPDATE otp='$otp', otp_time='$otp_time'"; 
                    mysqli_query($conn, $insert_otp); 

                    $_SESSION['forgot_email'] = $forgot_email;
                    $_SESSION['forgot_username'] = $forgot_username;
                    header('Location: ?verify_page');
                    exit();
                } 
            } else { 
                array_push($errors, " The email is not registered."); 
            } 
        } 
    } 

    //Resend OTP
    if(isset($_SESSION['forgot_email']) && isset($_GET['resend_otp'])){
        $forgot_email = $_SESSION['forgot_email']; 
        $forgot_username = $_SESSION['forgot_username'];
        $otp = rand(100000, 999999);
        $otp_time = date("Y-m-d H:i:s"); 
        $subject = "Reset Your Password";
        $message = "Hi $forgot_username, \n\nForgot your password?\nWe received a request to reset the password for your account.\n\nYour verification code is: $otp\n\nIf you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.\n\nThanks,\nGreen Life";
        if (sendEmail($forgot_email, $subject, $message)){
            $insert_otp = "UPDATE otp SET otp='$otp', otp_time='$otp_time' WHERE email='$forgot_email'"; 
            mysqli_query($conn, $insert_otp); 

            header('Location: ?verify_page');
            exit();
        }
    }

    //Verify OTP
    if (isset($_POST['verify_otp'])){
        $forgot_email = $_SESSION['forgot_email'];
        $forgot_code = $_POST['forgot_code'];
        $find_emailotp = "SELECT * FROM otp WHERE email='$forgot_email'";
        $find_result = mysqli_query($conn, $find_emailotp);
        if (mysqli_num_rows($find_result) > 0){
            $row = mysqli_fetch_assoc($find_result); 
            $forgot_otp = $row['otp'];
            $last_otptime = strtotime($row['otp_time']); 
            $current_time = time(); 
            $timeout_duration = 300; //5 minutes

            if (($current_time - $last_otptime) > $timeout_duration) { 
                array_push($errors, " The verification code has expired."); 
            } elseif ($forgot_code != $forgot_otp){
                array_push($errors, " Wrong verification code.");
            } else {
                header('Location: ?reset_password');
                exit();
            }
        }
    }

    //New password
    if (isset($_POST['change_password'])){
        if ($_POST['new_password'] != $_POST['confirm_password']) {
            array_push($errors, " Please make sure your passwords match.");
        } elseif (!preg_match("/^[A-Za-z]+$/", $_POST['new_password'])) {
            array_push($errors, " Password can only contain letters.");
        } else {
            $new_password = sanitise_input($_POST['new_password']);
            $forgot_email =  $_SESSION['forgot_email'];
            $forgot_username = $_SESSION['forgot_username'];
            $update_password = "UPDATE user SET user_password='$new_password' WHERE email='$forgot_email'";
            if (mysqli_query($conn, $update_password)){
                $to = $forgot_email;
                $subject = "Password Reset Successfully";
                $message = "Hi $forgot_username, \n\nYour password has been reset successfully. We hope you enjoy exploring our website.\n\nBest regards,\nGreen Life";
                if (sendEmail($to, $subject, $message)){
                    unset($_SESSION['forgot_email']);
                    unset($_SESSION['forgot_username']);
                    header('Location: login.php');
                    exit();
                }
            } else {
                echo "Password reset unsuccessful";
            }
        }
    }
?>
<!DOCTYPE html>

<html lang = "en">
<!-- Description: Login -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 22/10/2024 -->
<!-- Validated: OK 22/10/2024 -->

<head>
    <title>Sign In | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="Join our community by creating an account. Register to contribute plant photos, access advanced identification tools, and manage your activity on our platform."/>
    <meta name="keywords" content="Green Life, herbarium, herbarium tutorial, plant, identification, plant identification, species, genus, plant family, plant classification, register, join now, sign up"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article>
	<?php include "include/enquiry_btn.php"; ?>
	<div id="loginform">
        <?php if (!isset($_GET['forgot_password']) && !isset($_GET['verify_page']) && !isset($_GET['reset_password'])): ?>
		<form name="login_form" method="post" action="">
            <fieldset>
			    <legend><h1>Welcome Back</h1></legend>
                <?php include "include/errors.php" ?>
                <p><label for="username">Username: </label></p>
                <p><input type="text" name="username" maxlength="25" id="username" placeholder="Enter Username"/></p>
                <p><label for="password">Password:</label></p>
                <p id="password-box">
                    <input type="checkbox" id="showPassword"/>
                    <input type="text" name="password" maxlength="25" id="password" placeholder="••••••••"/>
                    <label for="showPassword">
                        <i class="fa-regular fa-eye-slash"></i>
                        <i class="fa-regular fa-eye"></i>
                    </label>
                </p>
                <p id="forgot_password"><a href="?forgot_password">Forgot password?</a></p>
                <p><input type="submit" name="login_user" value="LOGIN"/></p>
                <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
            </fieldset>
        </form>
        <?php elseif (isset($_GET['forgot_password'])): ?>
        <form method="post" action="" novalidate>
            <fieldset>
                <legend><h1>Forgot Password?</h1></legend>
                <p>Enter your email:</p>
                <?php include "include/errors.php" ?>
                <p><input type="email" name="forgot_email" maxlength="25" placeholder="Enter Email"/></p>
                <p><input type="submit" name="forgot_user" value="CONTINUE"/></p>
                <p><a href="login.php">Back to Login</a></p>
            </fieldset>
        </form>
        <?php elseif (isset($_GET['verify_page']) || isset($_GET['resend_otp'])): ?>
        <form method="post" action="">
            <fieldset>
                <legend><h1>Verification</h1></legend>
                <p>Enter the verification code:</p>
                <?php include "include/errors.php" ?>
                <p><input type="text" name="forgot_code" maxlength="6" placeholder="Enter Code"/></p>
                <p><input type="submit" name="verify_otp" value="VERIFY"/></p>
                <p>Didn't receive the verification code? <a href="?resend_otp">Resend</a></p>
            </fieldset>
        </form>
        <?php elseif (isset($_GET['reset_password'])): ?>
        <form method="post" action="">
            <fieldset>
                <legend><h1>Reset Password</h1></legend>
                <?php include "include/errors.php" ?>
                <p>New Password:</p>
                <p><input type="password" name="new_password" maxlength="25" /></p>
                <p>Confirm New Password:</p>
                <p><input type="password" name="confirm_password" maxlength="25" /></p>
                <p><input type="submit" name="change_password" value="RESET MY PASSWORD"/></p>
            </fieldset>
        </form>
        <?php endif; ?>
	</div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>