<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Tools -->
<!-- Author: Ellie Teng Ai Lee -->
<!-- Date: 17/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Tools | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Ellie Teng Ai Lee"/>
	<meta name="description" content="Discover essential tools for creating your own herbarium. From plant presses and drying materials to labeling supplies and storage solutions, our guide provides everything you need to successfully preserve and organize your plant specimens."/>
	<meta name="keywords" content="Green Life, tutorials, tools"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article class="tutorials" id="toolspage">
    <?php include "include/backtotop.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Tools Needed for Herbarium Making</h1>
    <section class="tools">
        <div class="finishline">
            <span class="line"></span>
            <h2>Collecting Process</h2>
            <span class="line"></span>
        </div>
        <div id="tools_box1">
            <div class="tools-pic">
                <figure>
                    <img src="images/trowel.jpg" alt="Trowel"/>
                    <figcaption>Trowel</figcaption>
                </figure>
                <p class="tools_desc">Dig up plants to collect roots or entire smaller plants</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/clipper.jpg" alt="Clipper"/>
                    <figcaption>Clipper</figcaption>
                </figure>
                <p class="tools_desc">Cut or trim plants</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/knife.jpg" alt="Knife"/>
                    <figcaption>Knife</figcaption>
                </figure>
                <p class="tools_desc">Make clean cuts of plant parts/ Slice through thicker stems</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/plasticbag.jpg" alt="Plastic bag"/>
                    <figcaption>Plastic bag</figcaption>
                </figure>
                <p class="tools_desc">To store the freshly collected plants</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/newspaper.jpg" alt="Newspaper"/>
                    <figcaption>Newspaper</figcaption>
                </figure>
                <p class="tools_desc">Keep the specimens fresh in the plastic bag</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/notebook.jpg" alt="Notebook"/>
                    <figcaption>Notebook</figcaption>
                </figure>
                <p class="tools_desc">Record essential details of the plants collected</p>
            </div>
        </div>
    </section>

    <section class="tools">
        <div class="finishline">
            <span class="line"></span>
            <h2>Pressing Process</h2>
            <span class="line"></span>
        </div>
        <div id="tools_box2">
            <div class="tools-pic">
                <figure>
                    <img src="images/blotter.jpg" alt="Blotter"/>
                    <figcaption>Blotter</figcaption>
                </figure>
                <p class="tools_desc">Absorb moisture from drying process</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/cardboard.jpg" alt="Cardboard"/>
                    <figcaption>Cardboard</figcaption>
                </figure>
                <p class="tools_desc">Promote airflow between the layers of the press</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/pressing_tools.jpg" alt="Press Straps & Slats"/>
                    <figcaption>Press Straps & Slats</figcaption>
                </figure>
                <p class="tools_desc">To flatten the plant specimen for drying</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/kerosene.jpg" alt="Kerosene Lamp"/>
                    <figcaption>Kerosene Lamp</figcaption>
                </figure>
                <p class="tools_desc">Used for quick heating (drying)</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/newspaper.jpg" alt="Newspaper"/>
                    <figcaption>Newspaper</figcaption>
                </figure>
                <p class="tools_desc">Protects the plant specimen and allows air circulation</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/freezer.jpg" alt="Freezer"/>
                    <figcaption>Freezer</figcaption>
                </figure>
                <p class="tools_desc">To kill insects and preserve the plant's colour</p>
            </div>
        </div>
    </section>
    
    <section class="tools" id="mounting">
        <div class="finishline">
            <span class="line"></span>
            <h2>Mounting Process</h2>
            <span class="line"></span>
        </div>
        <h3>Spatula & Needle Method</h3>
        <div class="tools_box3">
            <div class="tools-pic">
                <figure>
                    <img src="images/foraging_scissors.jpg" alt="Foraging Scissors"/>
                    <figcaption>Foraging Scissor</figcaption>
                </figure>
                <p class="tools_desc">Trim delicate plant parts</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/spatula.jpg" alt="Spatula Set"/>
                    <figcaption>Spatula</figcaption>
                </figure>
                <p class="tools_desc">Apply thin layer of glue to plant specimen</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/needle.jpg" alt="Teasing Needle"/>
                    <figcaption>Teasing Needle</figcaption>
                </figure>
                <p class="tools_desc">Lift, adjust and position delicate plant parts</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/forcep.jpg" alt="Forceps"/>
                    <figcaption>Forceps</figcaption>
                </figure>
                <p class="tools_desc">Handle small, fragile plant parts such as seeds, leaves or petals</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/creasing_tool.jpg" alt="Bone Folder"/>
                    <figcaption>Bone Folder</figcaption>
                </figure>
                <p class="tools_desc">Make sharp, clean folds in paper</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/eraser_sponge.jpg" alt="Magic Sponge Eraser"/>
                    <figcaption>Magic Sponge Eraser</figcaption>
                </figure>
                <p class="tools_desc">Clean off any smudges or excess glue on the paper</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/linen_tape.jpg" alt="Gummed Linen Tape"/>
                    <figcaption>Gummed Linen Tape</figcaption>
                </figure>
                <p class="tools_desc">Secure thicker parts of plant specimens on the paper</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/paper.jpg" alt="Herbarium Paper"/>
                    <figcaption>Herbarium Paper</figcaption>
                </figure>
                <p class="tools_desc">For mounting plant specimens</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/metal_washers.jpg" alt="Metal Washers"/>
                    <figcaption>Metal Washers</figcaption>
                </figure>
                <p class="tools_desc">Use as weights during the gluing and mounting process</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/glue.jpg" alt="Archival Glue"/>
                    <figcaption>Archival Glue</figcaption>
                </figure>
                <p class="tools_desc">Mount plant specimens onto herbarium sheets</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/wooden_block.jpg" alt="Wooden Blocks"/>
                    <figcaption>Wooden Blocks</figcaption>
                </figure>
                <p class="tools_desc">Separate plant specimens during drying process</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/cardboard.jpg" alt="Cardboard"/>
                    <figcaption>Cardboard</figcaption>
                </figure>
                <p class="tools_desc">Provide a stable backing during the mounting process</p>
            </div>
        </div>
    </section>
    <section class="tools" id="dip-tools">
        <h3>Dip Method</h3>
        <div class="tools_box3">
            <div class="tools-pic">
                <figure>
                    <img src="images/metal_tray.jpg" alt="Metal Tray"/>
                    <figcaption>Metal Tray</figcaption>
                </figure>
                <p class="tools_desc">Holds a thin layer of diluted glue for the dipping process</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/glue.jpg" alt="Archival glue"/>
                    <figcaption>Archival Glue</figcaption>
                </figure>
                <p class="tools_desc">Mount plant specimens onto herbarium sheets</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/wax_paper.jpg" alt="Wax Paper"/>
                    <figcaption>Wax Paper</figcaption>
                </figure>
                <p class="tools_desc">Place over the plant specimens during the pressing process</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/aluminium_foil.jpg" alt="Aluminium Foil Roll"/>
                    <figcaption>Aluminium Foil Roll</figcaption>
                </figure>
                <p class="tools_desc">Line the metal tray to prevent glue sticking to the tray</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/bowl.jpg" alt="Bowl"/>
                    <figcaption>Bowl</figcaption>
                </figure>
                <p class="tools_desc">Hold water for diluting glue</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/brush.jpg" alt="Brush"/>
                    <figcaption>Brush</figcaption>
                </figure>
                <p class="tools_desc">Apply glue evenly to the plant specimen</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/spatula.jpg" alt="Spatula set"/>
                    <figcaption>Spatula</figcaption>
                </figure>
                <p class="tools_desc">Apply thin layer of glue to plant specimen</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/forcep.jpg" alt="Forceps"/>
                    <figcaption>Forceps</figcaption>
                </figure>
                <p class="tools_desc">Handle small, fragile plant parts such as seeds, leaves or petals</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/paper.jpg" alt="Herbarium Paper"/>
                    <figcaption>Herbarium Paper</figcaption>
                </figure>
                <p class="tools_desc">For mounting plant specimens</p>
            </div>
            <div class="tools-pic">
                <figure>
                    <img src="images/cardboard.jpg" alt="Cardboard"/>
                    <figcaption>Cardboard</figcaption>
                </figure>
                <p class="tools_desc">Provide a stable backing during the mounting process</p>
            </div>
        </div>
    </section>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>