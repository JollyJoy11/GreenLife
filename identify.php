<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Identify -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date 15/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Identify Your Plant | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Aryn Jee Mei Wei"/>
	<meta name="description" content="Identify plants quickly and accurately with our advanced tools. Upload plant photos or use key features to help determine the species, genus, and family of various plants.">
	<meta name="keywords" content="plant, identification, plant identification, species, genus, plant family"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="identify">
	<?php 
		include "include/enquiry_btn.php";
	?>
	<?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
	<aside id="map">
		<embed src="https://www.globalforestwatch.org/embed/map/"/>
	</aside>
	<h1>Unfold the Identity of the Unknown Plants</h1>
	<section id="identify_plant">
		<h2>Steps to Identify a Plant: </h2>
		<ol>
			<li>
				<strong>Take a Clear Photo:</strong>&nbsp;
				Ensure that the plant is the main focus of the photo. A well-lit, close-up image of the leaves, flowers, or fruits will increase the accuracy of identification.
			</li>
			<li>
				<strong>Upload the Image:</strong>&nbsp;
				Click the button below to upload your photo. You can select an image directly from your device. Our system supports various file formats like JPG, JPEG, and PNG.
			</li>
			<li>
				<strong>Get Your Results:</strong>&nbsp;
				Once uploaded, our advanced plant identification system will analyze the image and provide you with detailed information about the plant, including its scientific name and common names.
			</li>
		</ol>
		<h2>Tips for the Best Identification Results:</h2>
		<ul>
			<li>Ensure the plant is in focus and well-lit.</li>
			<li>Avoid taking photos in direct sunlight, as this can cause shadows and glare.</li>
			<li>Capture multiple parts of the plant, such as leaves, flowers, and stems, for a more accurate identification.</li>
			<li>Upload photos in a 1:1 ratio for accurate processing.</li>
		</ul>	
		<p><a href="?action=identify"><i class="fa-regular fa-image"></i>&emsp;IDENTIFY NOW</a></p>
		<?php 
			if (isset($_GET['action']) && $_GET['action']=='identify') {
				require "include/identify_result.php";
				unset($_POST['identify_submit']);
				unset($_SESSION['field_error']['identifyphoto']);
			} 
		?>
	</section>
	<br/>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>