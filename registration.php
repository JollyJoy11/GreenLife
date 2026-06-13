<?php
    include "include/session.php";
    include "include/functions.php";
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    unset($_SESSION['errors']); 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greenlife";

    $conn =  mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // USER REGISTRATION
    if (isset($_POST['reg_user'])) {
        $firstname = ucwords(strtolower(sanitise_input($_POST['firstname'])));
        $lastname = ucwords(strtolower(sanitise_input($_POST['lastname'])));
        $email = sanitise_input($_POST['email']);
        $user_name = sanitise_input($_POST['username']);
        $user_password = sanitise_input($_POST['user_password']);

        $field_error = [];

        //input validation
        if (empty($firstname) or empty($lastname) or empty($email) or empty($user_name) or empty($user_password)) {
            array_push($errors, " Please fill in all the required fields.");
        } else {
            if (!preg_match("/^[A-Za-z\s]+$/", $firstname) || !preg_match("/^[A-Za-z\s]+$/", $lastname)) {
                $field_error['name'] = "* Name can only contain letters.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $field_error['email'] = "* Invalid email format.";
            }
            if (!preg_match("/^[A-Za-z0-9!@#$%^&*]+$/", $user_name)) {
                $field_error['user_name'] = "* Username cannot contain space.";
            }
            if (!preg_match("/^[A-Za-z]+$/", $user_password)) {
                $field_error['user_password'] = "* Password can only contain letters.";
            }
        }

        $user_check_query = "SELECT username, email FROM user WHERE username = '$user_name' OR email = '$email'";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['username'] == $user_name) {
                array_push($errors, " Username already exists.");
            } else {
                array_push($errors, " Email already exists.");
            }
        } elseif (strtolower($user_name) == strtolower('Admin')) {
            array_push($errors, " Username already exists.");
        }

        if (count($errors) == 0 && count($field_error) == 0) {
            $user_query = "INSERT INTO user (firstname, lastname, email, username, user_password)
                           VALUES ('$firstname', '$lastname', '$email', '$user_name', '$user_password')";
            if (mysqli_query($conn, $user_query)) {
                $_SESSION['username'] = $user_name;
                $_SESSION['success'] = "Logged In";
                $_SESSION['pop_up'] = TRUE;
                if (isset($_SESSION['redirect_to'])) {
                    $redirectUrl = $_SESSION['redirect_to'];
                    unset($_SESSION['redirect_to']); 
                    header("Location: " . $redirectUrl);
                } else {
                    header('Location: index.php');
                    exit();
                } 
                exit(); 
            } else {
                array_push($errors, " Error registering user: " . mysqli_error($conn));
            }
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header('Location: registration.php'); 
            exit();
        }
        if (count($field_error) > 0) {
            $_SESSION['field_error'] = $field_error;
            header('Location: registration.php'); 
            exit();
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Registration -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 4/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Register Now | Green Life</title>
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
	<div id="registration">
		<form name="registration_form" method="post" action="" novalidate="novalidate">
            <fieldset>
			    <legend><h1>Create Account</h1></legend>
                <?php include "include/errors.php" ?>
                <p><label for="firstname">Name: </label></p>
                <?php 
                    if (isset($_SESSION['field_error']['name'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['name'] . "</p>";
                        unset($_SESSION['field_error']['name']);
                    } 
                ?>
                <p><input type="text" name="firstname" maxlength="25" id="firstname" placeholder="First Name" value="" />&emsp;
                	<input type="text" name="lastname" maxlength="25"  id="lastname"  placeholder="Last Name" value="" /></p>
                <p><label for="email">Email: </label></p>
                <?php 
                    if (isset($_SESSION['field_error']['email'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['email'] . "</p>";
                        unset($_SESSION['field_error']['email']);
                    } 
                ?>
                <input type="email" name="email" id="email" placeholder="Enter Email" value="" /></p>
				<p><label for="username">Username: </label></p>
                <?php 
                    if (isset($_SESSION['field_error']['user_name'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['user_name'] . "</p>";
                        unset($_SESSION['field_error']['user_name']);
                    } 
                ?>
                <p><input type="text" name="username" maxlength="25" id="username" placeholder="Create Username" value="" /></p>
                <p><label for="password">Password:</label></p>
                <?php 
                    if (isset($_SESSION['field_error']['user_password'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['user_password'] . "</p>";
                        unset($_SESSION['field_error']['user_password']);
                    } 
                ?>
                <p id="password-box">
                    <input type="checkbox" id="showPassword"/>
					<input type="text" name="user_password" maxlength="25" id="password" placeholder="••••••••" title="Only alphabetical characters" value="" />
					<label for="showPassword">
                        <i class="fa-regular fa-eye-slash"></i>
                        <i class="fa-regular fa-eye"></i>
                    </label>
                </p>
                <p><input type="submit" name="reg_user" value="SUBMIT"/></p>
				<p>Already have an account? <a href="login.php">Sign In</a></p>
            </fieldset>
        </form>
	</div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>