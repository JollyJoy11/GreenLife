<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Enhancement Page -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date: 24/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Enhancement 1 | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Aryn Jee Mei Wei"/>
	<meta name="description" content="Enhancement in Green Life"/>
	<meta name="keywords" content="plant, identification, plant identification, species, genus, plant family"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="enhancement">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Enhancement 1</h1>
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Card Hover</h2>
            <ol>
                <li>To increase user interactivity.</li>
                <li>To show a brief description of what the tools are used for.</li>
                <li>To expand the identified plant image result for better view.</li>
                <li>When mouse hover over the image, image will be enlarged/a textbox containing the tools' function will be displayed.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="tools.php">Tools</a>
                <a href="identify.php">Identify</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/2ipVafDw2ss?si=32DqcibQRHutVk1t" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Image Slider</h2>
            <ol>
                <li>To show images related to the content.</li>
                <li>The images will display itself in a slideshow behaviour automatically every 10 seconds.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="classify.php#tab_nav">Classify</a>
                <a href="care.php">Care</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/McPdzhLRzCg?si=2flNm_jQVcTUv7zr" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Tab Navigation</h2>
            <ol>
                <li>To seperate contents into sections.</li>
                <li>To ensure contents are properly organised according to their respective categories.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="classify.php#tab_nav">Classify</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/oLqdy95LZSw?si=1HAPic1vUM1xXs-6" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
    
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Image Grid Gallery</h2>
            <ol>
                <li>To display multiple images at once with captions.</li>
                <li>To organise images in a structured manner to enhance visual appeal.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="classify.php#tab_nav">Classify</a>
                <a href="identify.php">Identify</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/rnhoY5Cdmy0?si=2bqrquH2q-0X397_" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Embed Map</h2>
            <ol>
                <li>To provide information on locations for users in which users can get directions by zooming in or pan in the embed map.</li>
                <li>Ensure convenience for users to have instant access to the locations.</li>
            </ol>

            <p>Pages with the enhancement:</p>
            <div>
                <a href="classify.php#tab_nav">Classify</a>
                <a href="identify.php">Identify</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/825ZZcArSWY?si=ROewb9TuEvCqFJJ2" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Embed Spotify Playlist</h2>
            <ol>
                <li>To promote user interactivity of the website.</li>
                <li>To capture attention more effectively than texts.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/FDFoXkLMB_g?si=9EbgoNsD97lxjRr5" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Instagram Post Cards</h2>
            <ol>
                <li>To enhance visual appeal of the webpage.</li>
                <li>To display each of the group members via mimicking the social media app - Instagram.</li>
                <li>"About me" pages will be displayed once after clicked on the Username on top of the post cards or the "SHOW MORE" which appears when hovering the image posts.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="profile.php">Member</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/y4UF-vQ8vws?si=G_VVC3zkbQMbnnWz" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Fluid Layout</h2>
            <ol>
                <li>To properly fit all content on the webpages perfectly despite change in width of the media screen.</li>
                <li>To allow users to navigate the website comfortably without the need for zooming or scrolling horizontally.</li>
                <li>To enhance usability and accessabiity.</li>
                <li>When screen size changes, the structure of the webpages changes to fit the media screen.</li>
            </ol>
        </div>

        <div class="links">
            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="index.php">Index</a>
                <a href="classify.php">Classify</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tools.php">Tools</a>
                <a href="care.php">Care</a>
                <a href="identify.php">Identify</a>
                <a href="contribute.php">Contribution</a>
                <a href="enquiry.php">Enquiry</a>
                <a href="registration.php">Registration</a>
                <a href="acknowledgement.php">Acknowledgement</a>
                <a href="enhancement1.php">Enhancement</a>
                <a href="profile.php">Member</a>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/HHtMMS42cWs?si=vRZQMLuQ-3GBMaJI" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
        
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Hamburger Menu</h2>
            <ol>
                <li>To properly display the menu for users to navigate through the website despite change in width of the media screen.</li>
                <li>To allow users to concentrate more on website's content without distraction as hamburger menu will only be displayed when being clicked on.</li>
                <li>To enhance usability and accessabiity.</li>
            </ol>
        </div>

        <div class="links">
            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="index.php">Index</a>
                <a href="classify.php">Classify</a>
                <a href="tutorial.php">Tutorial</a>
                <a href="tools.php">Tools</a>
                <a href="care.php">Care</a>
                <a href="identify.php">Identify</a>
                <a href="contribute.php">Contribution</a>
                <a href="enquiry.php">Enquiry</a>
                <a href="registration.php">Registration</a>
                <a href="acknowledgement.php">Acknowledgement</a>
                <a href="enhancement1.php">Enhancement</a>
                <a href="profile.php">Member</a>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed width="560" height="315" src="https://www.youtube.com/embed/QQlxvj_GKss?si=QxBZfvQhwnK-YuQ5" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
    <br/>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>