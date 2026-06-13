<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Care-->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date: 24/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Herbarium Care | Green Life</title>
	<meta charset="utf-8" />
	<meta name="author" content="Cyndia Teo Ya Aii" />
	<meta name="description" content="Learn how to properly care for and maintain your herbarium specimens. Discover best practices for storage, preservation techniques, and tips to ensure the longevity of your plant collections while preventing damage from pests and environmental factors." />
	<meta name="keywords" content="Green Life, herbarium, care, specimens" />
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" /> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" /> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>

<body>
<?php include "include/header.php"; ?>

<article class="tutorials">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Care for Herbarium Specimens</h1>
    <div class="finishline">
        <span class="line"></span>
        <h2>Examples of Damage Herbarium Specimen</h2>
        <span class="line"></span>
    </div>
    <section id="care-container">
        <div id="slider-wrapper">
            <div id="slider">
                <img src="images/damaged_specimen1.png" alt="Careless Handling Damage Herbarium" />
                <img src="images/damaged_specimen2.png" alt="Careless Handling Damage Herbarium" />
                <img src="images/damaged_specimen3.png" alt="Breakdown of Materials Damage Herbarium" />
                <img src="images/damaged_specimen4.png" alt="Flood Damage Herbarium" />
                <img src="images/damaged_specimen5.jpg" alt="Accidental Damage Herbarium" />
                <img src="images/damaged_specimen6.jpg" alt="Insect Damage Herbarium" />
            </div>
            <div id="slider-nav">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="reason-damaged">
            <h3>Herbarium specimens may become damaged due to:</h3>
            <ul>
                <li>Poor storage environment</li>
                <li>Breakdown of the materials used</li>
                <li>Insect damage</li>
                <li>Careless handling</li>
                <li>Major disaster such as fire or flood</li>
                <li>Accidental damage due to physical contact</li>
            </ul>
        </div>
    </section>

    <section>
        <div class="finishline">
            <span class="line"></span>
            <h2>How Can We Protect Herbarium Against Damage and Loss?</h2>
            <span class="line"></span>
        </div>

        <div class="care-content">
            <figure class="images-care">
                <img src="images/cabinet.jpg" alt="Cabinet with Herbarium" />
            </figure>
            <div class="text-care">
                <h3>Safe Storage Environment</h3>
                <p>Keep the specimens in a cool (ideally below 20°C) and dry environment, with humidity levels of 50%. This can prevent the mold growth and avoid the specimens brittle. Metal storage cabinets with rubber door seals protect is the most suitable place to store the specimens as it can prevent specimens direct contact with the sunlight, dust and insects.</p>
            </div>
        </div>

        <div class="care-content">
            <figure class="images-care">
                <img src="images/mounting_material.jpg" alt="Herbarium Specimens" />
            </figure>
            <div class="text-care">
                <h3>Mounting Materials</h3>
                <p>Mounting board used to prepare herbarium specimens are archival quality and acid-free, so that they won't deteriorate over time. Mounting board should be strong enough to support the weight of the plant specimen. For exmaple, 550 microns for most flowering plants and 1100 microns for heavy woody plants.</p>
            </div>
        </div>

        <div class="care-content">
            <figure class="images-care">
                <img src="images/freezing.jpg" alt="Herbarium in Freezer"/>
            </figure>
            <div class="text-care">
                <h3>Freezing Specimens</h3>
                <p>After mounting the specimens, the stack of specimens that capped with thick boards need to place in the freezer for 72 hours. This is an important step for eliminating any potentially harmful insects or fungus that might still be residing in the specimens.</p>
            </div>
        </div>

        <table class="main-table">
            <tr>
                <th>Handling procedures</th>
                <td>
                    <ul>
                        <li>Always handle specimens with dry hands.</li>
                        <li>Always carry specimens on a piece of cardboard to prevent damage from bending or tearing.</li>
                        <li>Always keep the specimens horizontal and flat and must never be bent.</li>
                        <li>Hold both sides of the sheet when handling specimens.</li>
                        <li>Make sure the sheets are all aligned when placing the specimens in the cupboard.</li>
                        <li>Never rest an object on a specimen.</li>
                        <li>Do not pack the specimens tightly onto one shelf when storing them.</li>
                    </ul>
                </td>
            </tr>
        </table>
        <br/>
    </section>
</article>

<?php include "include/footer.php"; ?>
</body>
</html> 