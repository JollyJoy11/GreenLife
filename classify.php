<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Classification -->
<!-- Author: Ellie Teng Ai Lee -->
<!-- Date 10/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Plant Classification | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Ellie Teng Ai Lee"/>
	<meta name="description" content="Learn about plant classification and explore the relationships between plant families, genera, and species. Deepen your understanding of the hierarchical structure of plant taxonomy on our website."/>
	<meta name="keywords" content="Green Life, plant classification, classification, plant, family, genus, species, Lauraceae"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="classification">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <aside>
        <figure>
            <img src="images/carllinnaeus.png" alt="Carl Linnaeus"/>
            <figcaption>Carl Linnaeus</figcaption>
        </figure>
        <p><strong>Linnaeus</strong> was a Swedish biologist and physician who formalised binomial nomenclature, the modern system of naming organisms. He was the first to frame principles for defining natural genera and species of organisms. He is known as the "Father of Modern Taxonomy". </p>
    </aside>
    <div id="def_plant">
        <h1>Plant Classification</h1>
        <div>
            <figure>
                <img src="images/planthierachy.png" alt="Linnaeus's System"/>
                <figcaption>Linnaeus's System of Classification</figcaption>
            </figure>
            <p>The classification of known plants into groups or categories based on their characteristics is a fundamental aspect of botany, known as plant taxonomy. This process involves organizing plants to reflect their relationships with one another, allowing for a better understanding of their evolution and biology. Taxonomy employs a hierarchical system that was originally developed by Carl Linnaeus in the 18th century.</p>
        </div>
        <p>Linnaeus's system categorizes plants into progressively smaller groups, starting with broad classifications and narrowing down to more specific ones. The hierarchy includes the following levels: domains, kingdoms, phyla, classes, orders, families, genera, and species. This system enables botanists to classify and name plants in a structured way, which aids in the study of plant diversity, conservation, and ecology. </p>
    </div>
    <figure id="plant_hierarchy">
        <img src="images/planthierachy.png" alt="Linnaeus's System"/>
        <figcaption>Linnaeus's System of Classification</figcaption>
    </figure>
    <section id="three_def">
        <hr/>
        <h2>Exploring Plant Families, Genera & Species</h2>
        <dl id="def_fgs">
            <div class="def_classify">
                <dt>Plant Family</dt>
                <dd>A plant family is a group of related plants that share similar characteristics. For example, the <em>Lauraceae</em> family includes aromatic plants like cinnamon, bay laurel, and avocado. These plants are grouped together because they share common features. Families help us understand how different plants are connected through evolution. In the classification system, 'Family' is more specific than 'Order' but broader than 'Genus.'</dd>
            </div>
            <div class="def_classify">
                <dt>Plant Genus</dt>
                <dd>A genus is a group of closely related species within a family. For instance, within the <em>Lauraceae</em> family, the <em>Persea</em> genus includes species like <em>Persea americana</em> (avocado). A genus helps organize species that have significant similarities and a common evolutionary background. This level of classification aids in understanding the relationships between different species more precisely.</dd>
            </div>
            <div class="def_classify">
                <dt>Plant Species</dt>
                <dd>Species is the most specific level of classification. It refers to individual plants that can interbreed and produce fertile offspring. For example, <em>Persea americana</em> is the species name for the avocado tree. Each species has unique traits that distinguish it from other species. This classification is crucial for identifying and studying plants, as it represents the most precise group in the taxonomic hierarchy.</dd>
            </div>
        </dl>
    </section>

    <section id="tab_nav">
        <input type="radio" id="family" name="tab_nav" checked="checked"/>
        <label for="family"><i class="fa-solid fa-leaf"></i>&nbsp;Family</label>
        <div class="tab">
            <div class="image-slideshow">
                <figure>
                    <img src="images/lauraceae.jpg" alt="Lauraceae Illustration"/>
                    <figcaption>Physical Characteristic of <em>Lauraceae</em></figcaption>
                </figure>
                <figure>
                    <img src="images/lauraceae_real.jpg" alt="Lauraceae Photograph"/>
                    <figcaption>Close-up of <em>Lauraceae</em></figcaption>
                </figure>
                <div class="indicators">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <h2><em>Lauraceae</em> (Laurels)</h2>	
            <p>The <em>Lauraceae</em> family, comprising mainly subtropical and tropical trees, exhibits remarkable diversity, particularly in the American and Asian tropics. These plants are primarily found in lowland and montane rainforests, thriving across a wide range of elevations from sea level up to the paramos in South America. The family is especially prominent in the foothills and mid-elevations of the Andes, as well as in the relict laurel forests of the Canary Islands and Madeira, where they often dominate the landscape. As a pantropical family, <em>Lauraceae</em> includes not only trees and shrubs but also unique members like the genus <em>Cassytha L.</em>, which consists of parasitic and herbaceous species, highlighting the ecological versatility of this family.</p>
            <p>Members of the <em>Lauraceae</em> family are characterized by their leathery, evergreen leaves, which are often dotted with numerous essential oil cavities. These oil cavities contribute to the aromatic nature of many species within the family. The fruits of <em>Lauraceae</em> are typically drupes—one-seeded, fleshy fruits with a hard, protective layer known as the endocarp surrounding the seed. This combination of aromatic leaves and distinctive fruit structure is a hallmark of the family's physical characteristics.</p>
            <p>The <em>Lauraceae</em> family holds significant economic importance due to several of its species being widely used in culinary and medicinal applications. For instance, the avocado (<em>Persea americana</em>), cinnamon (<em>Cinnamomum verum</em>), and bay laurel (<em>Laurus nobilis</em>) are regularly in kitchens around the world, prized for their flavors and nutritional value. Additionally, the family includes species like camphor (<em>Cinnamomum camphora</em>) and benzoin (<em>Styrax benzoin</em>), which are valued for their medicinal properties, playing important roles in traditional and modern medicine.</p>
            <div id="family-image">
                <figure id="Styrax_benzoin">
                    <img src="images/Styrax_benzoin.jpg" alt="Styrax benzoin"/>
                    <figcaption><em>Styrax benzoin</em></figcaption>
                </figure>
                <figure id="Laurus_nobilis">
                    <img src="images/Laurus_nobilis.jpg" alt="Laurus nobilis"/>
                    <figcaption><em>Laurus nobilis</em></figcaption>
                </figure>
                <figure id="Cinnamomum_verum">
                    <img src="images/Cinnamomum_verum.jpg" alt="Cinnamomum verum"/>
                    <figcaption><em>Cinnamomum verum</em></figcaption>
                </figure>
                <figure id="persea_americana">
                    <img src="images/persea_americana.jpg" alt="Persea americana"/>
                    <figcaption><em>Persea americana</em></figcaption>
                </figure>
                <figure id="Cinnamomum_camphora">
                    <img src="images/Cinnamomum_camphora.jpg" alt="Cinnamomum camphora"/>
                    <figcaption><em>Cinnamomum camphora</em></figcaption>
                </figure>
            </div>
            <p class="caption">Some species of <em>Lauraceae</em></p>
        </div>
        
        <input type="radio" id="genus" name="tab_nav"/>
        <label for="genus"><i class="fa-solid fa-seedling"></i>&nbsp;Genus</label>
        <div class="tab">
            <embed src="https://www.google.com/maps/d/u/0/embed?mid=1-CQxX1p2BSV44M3wqW0EbSpvUP5HvEM&ehbc=2E312F&noprof=1"/>
            <h2><em>Actinodaphne</em></h2>
            <p><em>Actinodaphne</em> is an Asian genus within the <em>Lauraceae</em> family, consisting of approximately 125 species of dioecious evergreen trees and shrubs. This genus is widely distributed across the tropical and subtropical regions of South Asia, Southeast Asia, southern China, Japan, New Guinea, Queensland, the Solomon Islands, and Fiji. In China alone, there are 17 species of <em>Actinodaphne</em>, with 13 of them being endemic to the region. The genus exemplifies the diversity and adaptability of the <em>Lauraceae</em> family in various climates and landscapes across Asia and the Pacific.</p>
            <p><em>Actinodaphne</em> species thrive in continuously moist soils and are highly sensitive to drought and frost. These laurel trees are commonly found within broad-leaved forests, mid-montane deciduous forests, and high-montane mixed stunted forests. Some species are also adapted to high-elevation forests, growing at altitudes ranging from 1,500 to 3,300 meters (4,900 to 10,800 feet). Their ecological preference for moist environments and specific forest types highlights their role in the diverse ecosystems of montane and high-altitude regions.</p>
            <p><em>Actinodaphne</em> trees, which range from 3 to 25 meters in height, typically have clustered or nearly whorled leaves that are unlobed and pinninerved, with some species displaying triplinerved patterns. Their small, star-shaped, greenish flowers are unisexual and often arranged in clusters or whorls. The umbels can be solitary, clustered, or organized in panicles or racemes, with overlapping, deciduous involucral bracts. The short perianth tube typically has six segments arranged in two nearly equal whorls of three. Male flowers usually contain nine fertile stamens in three whorls, with the filaments of the first and second whorls being glandless, while those in the third whorl have glands at the base. Anthers are introrse and four-celled, with cells opening via lids. Female flowers have staminodes corresponding to the male stamens, with a superior ovary and a shield-shaped or dilated stigma. The fruit is a berry-like drupe, seated on a shallow or deep, cup-shaped or discoid perianth tube, containing a single small seed that is mainly dispersed by birds.</p>
            <div id="genus-image">
                <figure id="Actinodaphne_mushaensis">
                    <img src="images/Actinodaphne_mushaensis.jpg" alt="Actinodaphne mushaensis"/>
                    <figcaption>Whorled leaves</figcaption>
                </figure>
                <figure id="Actinodaphne_elegans">
                    <img src="images/Actinodaphne_elegans.jpg" alt="Actinodaphne elegans"/>  
                    <figcaption>Flowers</figcaption>
                </figure>
                <figure id="Actinodaphne_angustifolia">
                    <img src="images/Actinodaphne_angustifolia.jpg" alt="Actinodaphne angustifolia"/>
                    <figcaption>Fruits</figcaption>
                </figure>
                <figure id="Actinodaphne_malabarica">
                    <img src="images/Actinodaphne_malabarica.jpg" alt="Actinodaphne malabarica"/>
                    <figcaption><em>Actinodaphne</em> Tree</figcaption>
                </figure>
                <figure id="actinodaphne_hookeri">
                    <img src="images/actinodaphne_hookeri.jpg" alt="Actinodaphne hookeri"/>
                    <figcaption>Close-up of <em>Actinodaphne</em></figcaption>
                </figure>
            </div>
            <p class="caption">Characteristics of <em>Actinodaphne</em></p>
        </div>

        <input type="radio" id="species" name="tab_nav"/>
        <label for="species"><i class="fa-brands fa-pagelines"></i>&nbsp;Species</label>
        <div class="tab">
            <div class="image-slideshow">
                <figure>
                    <img src="images/Actinodaphne_Macrophylla1.png" alt="Actinodaphne Macrophylla"/>
                    <figcaption><em>Actinodaphne macrophylla</em></figcaption>
                </figure>
                <figure>
                    <img src="images/Actinodaphne_Macrophylla2.jpg" alt="Herbarium of Actinodaphne Macrophylla"/>
                    <figcaption><em>Actinodaphne macrophylla</em> herbarium</figcaption>
                </figure>
                <div class="indicators">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <h2><em>Actinodaphne macrophylla</em> (Blume) Nees</h2>
            <p><em>Actinodaphne macrophylla</em> (Blume) Nees is a mid-canopy tree that can reach heights of up to 37 meters and a diameter at breast height (dbh) of up to 90 centimeters. The tree lacks stipules, a characteristic where the leaves are termed exstipulate. The leaves are arranged in whorls, simple in structure, and penniveined, with a hairy and whitish underside. The small flowers, measuring about 6 millimeters in diameter, are yellowish and typically clustered in bundles. The fruits are fleshy drupes, approximately 18 millimeters in diameter, with a yellow-red color, and are seated on an enlarged, disc-shaped flower base.</p>
            <p><em>Actinodaphne macrophylla</em> (Blume) Nees typically thrives in undisturbed mixed dipterocarp, swamp, keranga, and sub-montane forests, at altitudes reaching up to 1,400 meters. It is commonly found in alluvial sites and along rivers, but also grows on hillsides and ridges with clay to sandy soils. In secondary forests, this species often persists as a pre-disturbance remnant tree, indicating its resilience and ability to survive through various ecological changes.</p>
            <p><em>Actinodaphne macrophylla</em> (Blume) Nees is distributed across Peninsular Malaysia, Sumatra, Jawa, and Borneo, including regions such as Sarawak, Brunei, Sabah, and Central, South, and East Kalimantan. In Borneo, it is locally known as "Medang", reflecting its significance in the region's flora.</p>
        </div>
    </section>
    <br/>
    <br/>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>