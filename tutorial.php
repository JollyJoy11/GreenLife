<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Tutorials -->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date: 18/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Tutorials | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Cyndia Teo Ya Aii"/>
	<meta name="description" content="Discover how to create your own herbarium with our comprehensive step-by-step tutorials. Learn plant preservation techniques, proper identification methods, and best practices for collecting, pressing, and storing plants."/>
	<meta name="keywords" content="Green Life, collecting, pressing, labelling, mounting, tutorials"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article class="tutorials">
    <?php include "include/backtotop.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Herbarium Making Tutorials</h1>
    <div id="tut_container">
        <a href="#section-collecting">
            <img src="images/collection.jpg" alt="Collecting Plants"/>
            <span class="guideline">Collecting</span>
        </a>
        <div class="arrow">
            <i class="fa-solid fa-arrow-right"></i>
            <i class="fa-solid fa-arrow-down"></i>
        </div> 
        <a href="#section-pressing">
            <img src="images/pressing.jpg" alt="Pressing Plants"/>
            <span class="guideline">Pressing</span>
        </a>
        <div class="arrow">
            <i class="fa-solid fa-arrow-right"></i>
            <i class="fa-solid fa-arrow-down"></i>
        </div>
        <a href="#section-labelling">
            <img src="images/labelling.jpg" alt="Labelling Herbarium"/>
            <span class="guideline">Labelling</span>
        </a>
        <div class="arrow">
            <i class="fa-solid fa-arrow-right"></i>
            <i class="fa-solid fa-arrow-down"></i>
        </div>
        <a href="#section-mounting">
            <img src="images/mounting.jpg" alt="Mounting Herbarium"/>
            <span class="guideline">Mounting</span>
        </a>
    </div>
    <section id="section-collecting"> 
        <div class="finishline">
            <span class="line"></span>
            <h2>Collecting</h2>
            <span class="line"></span>
        </div>
        <div id="collection-container">
            <div id="collection-box">
                <img src="images/field_collection.jpg" alt="Collecting Herbarium Specimens in Field"/>
            </div>
            <div id="collection-text">
                <h4>Here are some important things to note when collecting specimens:</h4>
                <ul>
                    <li>Record essential details in a notebook, such as scientific name, habitat, collector information, etc.</li>
                    <li>Pack the specimens using moistened newspapers and plastic bags to maintain freshness.</li>
                    <li>Use trowel, clipper and (pruning) knife as tools to collect specimens.</li>
                    <li>Use your own body (knee, shoulder, stretch of fingers) to estimate plant height.</li>
                    <li>For small plants, collect the entire plant, while for large ones, include parts that showing their growth habits.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section-pressing">
        <div class="finishline">
            <span class="line"></span>
            <h2>Pressing</h2>
            <span class="line"></span>
        </div>
        <figure>
            <img src="images/plant_press.jpg" alt="Herbarium Press Structure Diagram"/>
            <figcaption>Detailed Structure of Herbarium Press</figcaption>
        </figure>
        <aside>
            <h3>Precautions</h3>
            <ul>
                <li><strong>Monitoring Drying Conditions:</strong>
                    <ul>
                        <li>Avoid drying specimens to excessive heat as it may cause them to become brittle and damaged.</li>
                        <li>Avoid insufficient drying as it may compromise the quality of specimens.</li>
                    </ul>
                </li>
                <li><strong>Positioning of Specimens:</strong>
                    <ul>
                        <li>Ensure the specimens are laid flat and not overlapped for even drying.</li>
                        <li>Consider using weights (books or rocks) to keep specimens flat.</li>
                    </ul>
                </li>
                <li><strong>Handling during Drying:</strong>
                    <ul>
                        <li>Minimize handling during the drying process to avoid damage or dislocation.</li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div id="pressing_steps">
            <div class="pressing_step">
                <h4>1<sup>st</sup> step:&nbsp; Specimen Arrangement</h4>
                <ul>
                    <li>Arrange carefully before pressing</li>
                    <li>Shake leaves gently for natural positions</li>
                </ul>
            </div>
            <p><i class="fa-solid fa-arrow-down"></i></p>
            <div class="pressing_step">
                <h4>2<sup>nd</sup> step:&nbsp; Dry the Specimen</h4>
                <ul>
                    <li>Handle newspaper and enclosed plant as a single unit to dry together</li>
                    <li>Use absorbent blotters to remove moisture, replace them multiple times as needed</li>
                </ul>
            </div>
            <p><i class="fa-solid fa-arrow-down"></i></p>
            <div class="pressing_step">
                <h4>3<sup>rd</sup> step:&nbsp; Press the Specimen</h4>
                <ul>
                    <li>Use a wooden press with layers of corrugated cardboard and blotters</li>
                    <li>Position the press correctly</li>
                    <li>Tighten press straps and slats</li>
                </ul>
            </div>
            <p><i class="fa-solid fa-arrow-down"></i></p>
            <div class="pressing_step">
                <h4>4<sup>th</sup> step:&nbsp; Expedite Drying</h4>
                <ul>
                    <li>Use simple drier like light bulbs or space heaters to speed up drying</li>
                    <li>Natural sunlight also can be used but should be monitored to avoid overheating</li>
                </ul>
            </div>
            <p><i class="fa-solid fa-arrow-down"></i></p>
            <div class="pressing_step">
                <h4>5<sup>th</sup> step:&nbsp; Freezing</h4>
                <ul>
                    <li>After drying, freeze specimens at -20°F (-29°C) for 2-5 days to kill insects before mounting</li>
                    <li>Store dried specimens in a cool, dry place to prevent further damage</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section id="section-labelling">
        <div class="finishline">
            <span class="line"></span>
            <h2>Labelling</h2>
            <span class="line"></span>
        </div>
        <div id="labelling">
            <figure>
                <img src="images/label.jpg" alt="Label of Herbarium"/>
                <figcaption>Example of a Herbarium Label</figcaption>
            </figure>
            <div id="label_desc">
                <h3>Things you should label:</h3>
                <ul>
                    <li><i class="fa-solid fa-tag"></i>&ensp;Title</li>
                    <li><i class="fa-solid fa-tags"></i>&ensp;Scientific name</li>
                    <li><i class="fa-solid fa-map-location-dot"></i>&ensp;Detailed Location</li>
                    <li><i class="fa-solid fa-tree"></i>&ensp;Altitude & Habitat</li>
                    <li><i class="fa-solid fa-user-tag"></i>&ensp;Collector name</li>
                    <li><i class="fa-solid fa-receipt"></i>&ensp;Specimen number</li>
                    <li><i class="fa-solid fa-calendar-days"></i>&ensp;Date of Collection</li>
                    <li><i class="fa-solid fa-note-sticky"></i>&ensp;Notes</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section-mounting">
        <div class="finishline">
            <span class="line"></span>
            <h2>Mounting</h2>
            <span class="line"></span>
        </div>
        <h3>Spatula & Needle Method</h3>
        <div class="timeline">
            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/setup.jpg" alt="Setup tools required"/>
                    </figure>
                    <div class="text">
                        <h4>1<sup>st</sup> step:&nbsp;Prepare the workspace</h4>
                        <ul>
                            <li>Place a cardboard backing under a mounting paper.</li>
                            <li>Prepare the <a href="tools.php#mounting">tools needed</a>.</li>
                            <li>Carefully open the newspaper containing the dried plant specimen and its label.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/specimen_arrangement.jpg" alt="Arrange specimen on paper"/>
                    </figure>
                    <div class="text">
                        <h4>2<sup>nd</sup> step:&nbsp;Arrange the specimen</h4>
                        <ul>
                            <li>Place the root side down and the flower side up, making sure the entire specimen is within the paper.</li>
                            <li>Leave the bottom right corner for the label and the other corner for the pocket.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/spc_metal.jpg" alt="Place metal washers on top of specimen"/>
                    </figure>
                    <div class="text">
                        <h4>3<sup>rd</sup> step:&nbsp;Position metal washers</h4>
                        <ul>
                            <li>Remove excess soil and foreign material from plants by tapping or poking the soil area lightly with needle.</li>
                            <li>Use metal washers to hold down plant parts that need to stay in place.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/gluing.jpg" alt="Apply glue to stick specimen"/>
                    </figure>
                    <div class="text">
                        <h4>4<sup>th</sup> step:&nbsp;Apply glue</h4>
                        <ul>
                            <li>Use spatula to apply a small amount of glue under plant parts.</li>
                            <li>Lift parts of the plant with an angled needle when applying the glue. Do not over-glued.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/drying.jpg" alt="Dry specimen"/>
                    </figure>
                    <div class="text">
                        <h4>5<sup>th</sup> step:&nbsp;Drying process</h4>
                        <ul>
                            <li>After gluing, place wooden blocks at each corner of the sheet.</li>
                            <li>Stack multiple sheets on top of each other using wooden blocks for separation.</li>
                            <li>Let the sheets dry for 24 hours.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/flip_over.jpg" alt="Flip-over Test"/>
                    </figure>
                    <div class="text">
                        <h4>6<sup>th</sup> step:&nbsp;Final touch</h4>
                        <ul>
                            <li>Perform the "flip-over" test to check if any plant parts come loose.</li>
                            <li>Apply minimum glue to those parts which flop and let it to dry again.</li>
                            <li>If no flopping occurs, carefully remove cardboard sheet, and the specimen is now ready for filing.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>
        </div>
   
        <h3>Dip Method</h3> 
        <div class="timeline">
            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/dip_setup.jpg" alt="Setup tools required"/>
                    </figure>
                    <div class="text">
                        <h4>1<sup>st</sup> step:&nbsp;Set up materials</h4>
                        <ul>
                            <li>Place a cardboard backing under a mounting paper.</li>
                            <li>Prepared a metal tray covered with heavy-duty aluminium foil.</li>
                            <li>Gather plant specimens and prepare the <a href="tools.php#dip-tools">tools needed</a>.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/specimen_arrangement.jpg" alt="Arrange specimen on paper"/>
                    </figure>
                    <div class="text">
                        <h4>2<sup>nd</sup> step:&nbsp;Position the specimen</h4>
                        <ul>
                            <li>Place important features such as flowers in a prominent place.</li>
                            <li>Place the label and packet in appropriate corners.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/dip_glue.jpg" alt="Dip specimen into glue"/>
                    </figure>
                    <div class="text">
                        <h4>3<sup>rd</sup> step:&nbsp;Dip the plant in glue</h4>
                        <ul>
                            <li>Dilute Missouri-type archival glue with water in the foil-covered tray to create a thin layer.</li>
                            <li>Carefully lift the plant with forceps and dip it into the glue.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/place_specimen.jpg" alt="Place dipped specimen on paper"/>
                    </figure>
                    <div class="text">
                        <h4>4<sup>th</sup> step:&nbsp;Place the specimen on paper</h4>
                        <ul>
                            <li>Gently lift the plant out of the glue, and without rearranging too much, "drop" it onto the herbarium sheet.</li>
                            <li>Ensure no glue smudges are left behind.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/dip_drying.jpg" alt="Dry specimen"/>
                    </figure>
                    <div class="text">
                        <h4>5<sup>th</sup> step:&nbsp;Dry the specimen</h4>
                        <ul>
                            <li>Place a sheet of wax paper over the specimen and stack the sheets without using weights or blocks.</li>
                            <li>Tighten the press straps and leave the specimens to dry overnight.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>

            <div class="tl_container">
                <img src="images/leaves_vector.jpg" alt="Leaf icon"/>
                <div class="text-box">
                    <figure>
                        <img src="images/flip_over.jpg" alt="Flip-over Test"/>
                    </figure>
                    <div class="text">
                        <h4>6<sup>th</sup> step:&nbsp;Final check</h4>
                        <ul>
                            <li>Perform the "flip-over" test after drying to see if any plant parts hang loose.</li>
                            <li>Apply minimum glue if necessary and then store the completed specimen.</li>
                        </ul>
                    </div>
                    <span class="container-arrow"></span>
                </div>
            </div>
        </div>
    </section>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>