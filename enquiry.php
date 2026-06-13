<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];

    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    unset($_SESSION['errors']);

	require_once __DIR__ . '/config.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_SESSION['username'])){
		$login_user = htmlspecialchars($_SESSION['username']);
		$sql = "SELECT firstname, lastname, email FROM user WHERE username = '$login_user'";
		$login_info = mysqli_query($conn, $sql);

		if ($login_info) {
			$login_retrieve = mysqli_fetch_assoc($login_info);
			$login_firstname = $login_retrieve['firstname'];
			$login_lastname = $login_retrieve['lastname'];
			$login_email = $login_retrieve['email'];
		}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Enquiry Page -->
<!-- Author: Aryn Jee Mei Wei & Cyndia Teo Ya Aii-->
<!-- Date 10/11/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Enquire Now | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Aryn Jee Mei Wei, Cyndia Teo Ya Aii"/>
	<meta name="description" content="Get in touch for any inquiries about plant herbarium, classification, species identification, and care techniques. The Green Life team is ready to assist with all your plant-related questions and provide expert guidance."/>
	<meta name="keywords" content="plant, identification, plant identification, species, genus, plant family, enquiry"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="enquirypage">
	<?php include "include/enquiry_btn.php"; ?>
	<?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
	
	<!-- antispam -->
	<?php if (isset($_SESSION['spam'])): ?>
		<div class="pop-up_message spam">
			<p><i class="fa-regular fa-circle-xmark"></i> &nbsp; You have exceeded the maximum number of submissions. Please try again later.</p>
		</div>
		<?php unset($_SESSION['spam']); ?>
	<?php endif; ?>
	
	<form id="enquiry-form" name="enquiry" method="post" action="enquiry_process.php" novalidate="novalidate">
		<h1>Enquiry Form</h1>
		<?php include "include/errors.php" ?>
		<p><label for="firstname">Name: </label></p>
		<?php 
            if (isset($_SESSION['field_error']['name'])){
                echo "<p class='error-messages'>" . $_SESSION['field_error']['name'] . "</p>";
                unset($_SESSION['field_error']['name']);
            } 
        ?> 
		<p><input type="text" name="firstname" maxlength="25" id="firstname"  placeholder="First Name" value="<?php echo isset($_SESSION['username']) ? $login_firstname : ''; ?>">&emsp;<input type="text" name="lastname" maxlength="25" id="lastname" placeholder="Last Name" value="<?php echo isset($_SESSION['username']) ? $login_lastname : ''; ?>"/></p>
		<p><label for="email">Email: </label></p>
		<?php 
            if (isset($_SESSION['field_error']['email'])){
                echo "<p class='error-messages'>" . $_SESSION['field_error']['email'] . "</p>";
                unset($_SESSION['field_error']['email']);
            } 
        ?>
		<p><input type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo isset($_SESSION['username']) ? $login_email : ''; ?>"/></p>
		<p><label for="phone">Phone No.:</label></p>
		<?php 
            if (isset($_SESSION['field_error']['phone'])){
                echo "<p class='error-messages'>" . $_SESSION['field_error']['phone'] . "</p>";
                unset($_SESSION['field_error']['phone']);
            } 
        ?>
		<p><input type="text" id="phone" name="phone" maxlength="12" placeholder="e.g. 012-3456789" value=""/></p>
		<fieldset>
			<legend>Address</legend>
			<p><label for="street">Street Address: </label></p>
			<p><input type="text" id="street" name="street" maxlength="60" placeholder="e.g. Lot/No, Jalan, Taman, Lorong" value="<?php echo isset($street) ? $street : ''; ?>"/></p>
			<div id="address">
				<p><label for="city">City/Town: </label><br/>
				<?php 
					if (isset($_SESSION['field_error']['city'])){
						echo "<span class='error-messages'>" . $_SESSION['field_error']['city'] . "</span><br/>";
						unset($_SESSION['field_error']['city']);
					} 
				?>
				<input type="text" id="city" name="city" maxlength="20" placeholder="Enter City/Town" value=""/></p>
				<p><label for="postcode">Postcode:</label><br>
				<?php 
					if (isset($_SESSION['field_error']['postcode'])){
						echo "<span class='error-messages'>" . $_SESSION['field_error']['postcode'] . "</span><br/>";
						unset($_SESSION['field_error']['postcode']);
					} 
				?>
				<input type="text" id="postcode" name="postcode" maxlength="5" placeholder="XXXXX" value=""/></p>
				<p><label for="state">State: </label><br>
				<select id="state" name="state" size="1">
					<option value="">Please select</option>
					<option value="Johor">Johor</option>
					<option value="Kedah">Kedah</option>
					<option value="Kelantan">Kelantan</option>
					<option value="Kuala Lumpur">Kuala Lumpur</option>
					<option value="Labuan">Labuan</option>
					<option value="Melaka">Melaka</option>
					<option value="Negeri Sembilan">Negeri Sembilan</option>
					<option value="Pahang">Pahang</option>
					<option value="Penang">Penang</option>
					<option value="Perak">Perak</option>
					<option value="Perlis">Perlis</option>
					<option value="Putrajaya">Putrajaya</option>
					<option value="Sabah">Sabah</option>
					<option value="Sarawak">Sarawak</option>
					<option value="Selangor">Selangor</option>
					<option value="Terengganu">Terengganu</option>
				</select></p>
			</div>
		</fieldset>
		<p>Herbarium Tutorial:</p>
		<p>
			<input type="radio" id="tutorial" name="herb_tutorial" value="Tutorial" checked="checked" />
			<label for="tutorial">Tutorial</label> &emsp;
			<input type="radio" id="tools" name="herb_tutorial" value="Tools"/>
			<label for="tools">Tools</label> &emsp;
			<input type="radio" id="care" name="herb_tutorial" value="Care"/>
			<label for="care">Care</label>
		</p>
		<p><label for="question">Enquiry:</label></p>
		<p><textarea name="question" rows="5" cols="55" id="question"></textarea></p>
		<p><input type="submit" value="SUBMIT" name="enquiry"/></p>
		<p><input type="reset" value="CANCEL"/></p>
	</form>	
</article>

<?php include "include/footer.php"; ?>
</body>
</html>