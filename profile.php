<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Profile -->
<!-- Author: Ellie Teng Ai Lee -->
<!-- Date 11/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Our Members | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Ellie Teng Ai Lee"/>
	<meta name="description" content="Members of Green Life Developer"/>
	<meta name="keywords" content="member, Green Life, Joanne, Ellie, Cyndia, Aryn"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="main_profile">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Our Members</h1>
    <div id="pf_container">
        <div class="pf_card">
            <div class="pic_head">
                <img src="images/Joanne.jpg" alt="Joanne Profile Pic"/>
                <p class="pf_username"><a href="aboutme1.php">Joanne Chin</a></p>
            </div>
            <div class="pic_post">
                <img src="images/joanne_ins.jpg" alt="Joanne"/>
                <div class="layer">
                    <a href="aboutme1.php">SHOW MORE</a>
                </div>
            </div>
            <div class="ig_icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-regular fa-comment"></i>
                <i class="fa-regular fa-paper-plane"></i>
            </div>
            <div class="pf_detail">
                <p><strong>Joanne</strong> How does my wings look? &#129498;</p>
                <p class="pf_comment">Add comment...</p>
            </div>
        </div>
        
        <div class="pf_card">
            <div class="pic_head">
                <img src="images/Ellie.jpg" alt="Ellie Profile Pic"/>
                <p class="pf_username"><a href="aboutme2.php">Ellie Teng</a></p>
            </div>
            <div class="pic_post">
                <img src="images/ellie_ins.jpg" alt="Ellie"/>
                <div class="layer">
                    <a href="aboutme2.php">SHOW MORE</a>
                </div>
            </div>
            <div class="ig_icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-regular fa-comment"></i>
                <i class="fa-regular fa-paper-plane"></i>
            </div>
            <div class="pf_detail">
                <p><strong>Ellie</strong> I hope you are here for me. &#10024;</p>
                <p class="pf_comment">Add comment...</p>
            </div>
        </div>

        <div class="pf_card">
            <div class="pic_head">
                <img src="images/Aryn.jpg" alt="Aryn Profile Pic"/>
                <p class="pf_username"><a href="aboutme3.php">Aryn Jee</a></p>
            </div>
            <div class="pic_post">
                <img src="images/aryn_ins.jpg" alt="Aryn"/>
                <div class="layer">
                    <a href="aboutme3.php">SHOW MORE</a>
                </div>
            </div>
            <div class="ig_icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-regular fa-comment"></i>
                <i class="fa-regular fa-paper-plane"></i>
            </div>
            <div class="pf_detail">
                <p><strong>Aryn</strong> Love the beach! &#127958;</p>
                <p class="pf_comment">Add comment...</p>
            </div>
        </div>

        <div class="pf_card">
            <div class="pic_head">
                <img src="images/Cyndia.jpg" alt="Cyndia Profile Pic"/>
                <p class="pf_username"><a href="aboutme4.php">Cyndia Teo</a></p>
            </div>
            <div class="pic_post">
                <img src="images/cyndia_ins.jpg" alt="Cyndia"/>
                <div class="layer">
                    <a href="aboutme4.php">SHOW MORE</a>
                </div>
            </div>
            <div class="ig_icon">
                <i class="fa-solid fa-heart"></i>
                <i class="fa-regular fa-comment"></i>
                <i class="fa-regular fa-paper-plane"></i>
            </div>
            <div class="pf_detail">
                <p><strong>Cyndia</strong> Sssssss.....</p>
                <p class="pf_comment">Add comment...</p>
            </div>
        </div>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>