<?php 
	include "include/session.php";
	include "include/database.php"; 
	include "include/functions.php";
	$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
	
	if (isset($_SESSION['username']) && $_SESSION['username'] == 'Admin') {
		header('Location: view_user.php');
		exit();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "greenlife";

		$conn =  mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$goal = $_POST['goal'];
		$ratings = $_POST['ratings'];
		$comments = sanitise_input($_POST['comment']);
		
		$sql = "INSERT INTO feedback(goal, star_rating, comment)
				VALUE ('$goal', '$ratings', '$comments')";
		
		if (mysqli_query($conn, $sql)){
			$_SESSION['feedback'] = TRUE;
		}
		mysqli_close($conn);
		header("Location: ".$_SERVER['PHP_SELF']); 
		exit();
	}
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Homepage -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 4/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="Explore the world of plants with our herbarium and plant identification tools. Contribute, discover, and learn about various plant species through an interactive database. Join our community to share your knowledge and enhance your plant identification skills."/>
	<meta name="keywords" content="Green Life, herbarium, herbarium tutorial, plant, identification, plant identification, species, genus, plant family, plant classification"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="homepage">
	<?php include "include/enquiry_btn.php"; ?>
	<?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
	<div id="splashpage">
		<div id="splash-text">
			<h1>Capture Nature Across Time</h1>
			<p id="splash_desc">Build your own herbarium, unlock plant mysteries, and share your discoveries with a global botanical community.</p>
			<?php if (!isset($_SESSION['success'])): ?>
				<p class="sign-btn"><a href="login.php">Sign In</a></p>
				<p class="sign-btn"><a href="registration.php">Join Now <span id="hero-arrow">&#8594;</span></a></p>
			<?php endif; ?>
		</div>
	</div>
	
	<section>
		<div class="image-text">
			<figure>
				<img src="images/herbarium-def.jpg" alt="Herbarium Specimen"/>
			</figure>
			<div class="index-sect">
				<h2>What is Herbarium?</h2>
				<p>Herbarium are collection of dried plant specimens mounted on sheets of paper. The plants are usually collected from where they were growing in nature, identified by experts, pressed, and then carefully mounted to archival paper so that all major morphological characteristics are visible. The mounted plants are labeled with their scientific names, the collector's name, the information about where they were collected and how they grew, and general observations. The specimens are commonly filed in cases according to families and genera and are available for ready reference.</p>
			</div>
		</div>
		<table class="main-table">
			<tr>
				<th>Benefits<br/>of<br/>Herbarium</th>
				<td>
					<ul>
						<li>Provide reference samples for the identification of plants</li>
						<li>Serve as a reference library for the identification of parts of the plants</li>
						<li>Can be made as bookmarks and decorations</li>
						<li>Provide information for studies of expeditions and explorers</li>
						<li>Provide the basis for an illustration of a plant</li>
					</ul>
				</td>
			</tr>
		</table>
	</section>
	
	<section id="herbarium-sect">
		<h2>Interested in Making Your Own Herbarium?</h2>
		<div id="gridbox">
			<p id="herb-desc">Here are the things you need to know to DIY your own herbarium.</p>
			<div class="gallery" id="gal1">
				<img src="images/herbarium-tutorial.jpg" alt="Tutorial"/>
				<p><a href="tutorial.php"><span>Tutorial</span> &#10230;</a></p>
				<p class="desc">Making herbarium for catalogue or aesthetic purposes is a tougher job than it looks. Need a hand?</p>
			</div>
			<div class="gallery" id="gal2">
				<img src="images/herbarium-tools.jpg" alt="Tools"/>
				<p><a href="tools.php"><span>Tools</span> &#10230;</a></p>
				<p class="desc">There are specific tools and equipment required to properly make a herbarium. </p>
			</div>
			<div class="gallery" id="gal3">
				<img src="images/herbarium-care.jpg" alt="Care"/>
				<p><a href="care.php"><span>Care</span> &#10230;</a></p>
				<p class="desc">Herbarium needs plenty of attention. Maintaining a herbarium will require technique and utmost care. </p>
			</div>
		</div>
	</section>
	<div class="index-sect">
		<h2>Fellow plant lovers, we need your help! </h2>
		<p>Share your plant photos with us to help grow our plant identification database. Every contribution brings us closer to building a rich resource for plant enthusiasts and researchers alike. Your support is much appreciated!</p>
		<p>Submit your photos and be part of our growing plant community!</p>
		<p><a href="contribute.php">CONTRIBUTE <i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
	</div>
	<div class="image-text" id="identify-sect">
		<figure>
			<img src="images/identify.png" alt="Identify with Phone"/>
		</figure>
		<div class="index-sect">
			<h2>Struggling to Identify a Plant?</h2>
			<p>Simply snap a photo and let Green Life identify the species, genus, or family instantly. Explore the world of plants effortlessly and build your own herbarium with ease.</p>
			<p><a href="identify.php">IDENTIFY <i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
		</div>
	</div>
		<!-- Feedback Pop-Up -->

	<?php 
		if (isset($_SESSION['feedback'])){
			echo 
			"<div class='pop-up_message'>
				<p><i class='fa-regular fa-circle-check'></i> &nbsp; Your feedback has been submitted!</p>
			</div>";
			unset($_SESSION['feedback']);
		}
	?>
	<div id="feedback-sect">
		<div class="finishline">
			<span class="line"></span>
			<p>We would like to hear from you</p>
			<span class="line"></span>
		</div>
		<label for="cross" id="feedback-btn">Feedback</label>
		<br/>
		<br/>
		<input type="checkbox" id="cross">
		<label for="cross" id="feedback_overlay"></label>
		<div id="feedback">
			<label for="cross">&times;</label>
			<form name="feedback" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">	
				<ol>
					<li>
						Did you find the information you were looking for?
						<p><input type="radio" name="goal" value="yes" checked="checked" id="yes"/><label for="yes">Yes</label>
						<input type="radio" name="goal" value="no" id="no"/><label for="no">No</label></p>
					</li>
					<li>
						Please rate your overall satisfaction of this website?
						<div id="star-widget">
							<input type="radio" name="ratings" value="rate-5" id="rate-5"/><label for="rate-5" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-4" id="rate-4"/><label for="rate-4" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-3" id="rate-3"/><label for="rate-3" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-2" id="rate-2"/><label for="rate-2" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-1" id="rate-1"/><label for="rate-1" class="fa-solid fa-star"></label>
						</div>
					</li>
					<li>
						<label for="comment">Please let us know how we can improve this website?</label>
						<p><textarea name="comment" rows="5" cols="55" required="required" id="comment"></textarea></p>
					</li>
				</ol>
				<input type="submit" value="SUBMIT"/>
			</form>
		</div>
	</div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>