<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Acknowledgement -->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date 14/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Acknowledgement | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Cyndia Teo Ya Aii"/>
	<meta name="description" content="Acknowledgement for Green Life content"/>
	<meta name="keywords" content="acknowledgement, information, images"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="acknowledgement">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
	<h1>Acknowledgement</h1>
	<div id="acknowledgement-list">
		<p>We would like to express our sincere gratitude to the following websites for providing invaluable resources and information: </p>
        <h2>Homepage</h2>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://estliving.com/product/house-of-hackey-herbarium-wallpaper/" target="_blank">https://estliving.com/product/house-of-hackey-herbarium-wallpaper/</a></li>
            <li><a href="https://www.freshlypressed.ch/blog/2017/7/2/herbarium-how-to-1-ythsk" target="_blank">https://www.freshlypressed.ch/blog/2017/7/2/herbarium-how-to-1-ythsk</a></li>
            <li><a href="https://www.pinterest.com/pin/297519119129828666/" target="_blank">https://www.pinterest.com/pin/297519119129828666/</a></li>
            <li><a href="https://blossomplant.com/features/plant-identification" target="_blank">https://blossomplant.com/features/plant-identification</a></li>
        </ol>
        <h2>Classification Page</h2>
        <h3>Information:</h3>
        <ol>
			<li><a href="https://www.britannica.com/plant/Laurales" target="_blank">https://www.britannica.com/plant/Laurales</a></li>
            <li><a href="https://www.sciencedirect.com/topics/agricultural-and-biological-sciences/lauraceae#:~:text=The%20Lauraceae%20consist%20of%20mostly,pinnate%2Dnetted%2C%20usually%20punctate" target="_blank">https://www.sciencedirect.com/topics/agricultural-and-biological-sciences/lauraceae#:~:text=The%20Lauraceae%20consist%20of%20mostly,pinnate%2Dnetted%2C%20usually%20punctate</a></li>
            <li><a href="https://www.sciencedirect.com/science/article/pii/S0254629923000959" target="_blank">https://www.sciencedirect.com/science/article/pii/S0254629923000959</a></li>
            <li><a href="https://en.wikipedia.org/wiki/Actinodaphne" target="_blank">https://en.wikipedia.org/wiki/Actinodaphne</a></li>
            <li><a href="https://asianplant.net/Lauraceae/Actinodaphne_macrophylla.htm#:~:text=Actinodaphne%20macrophylla%20(Blume)%20Nees%2C,(1836)&text=Mid%2Dcanopy%20tree%20up%20to,lower%20side%20hairy%20and%20whitish" target="_blank">https://asianplant.net/Lauraceae/Actinodaphne_macrophylla.htm#:~:text=Actinodaphne%20macrophylla%20(Blume)%20Nees%2C,(1836)&text=Mid%2Dcanopy%20tree%20up%20to,lower%20side%20hairy%20and%20whitish</a></li>
            <li><a href="https://www.britannica.com/plant/Lauraceae" target="_blank">https://www.britannica.com/plant/Lauraceae</a></li>
            <li><a href="https://en.wikipedia.org/wiki/Lauraceae" target="_blank">https://en.wikipedia.org/wiki/Lauraceae</a></li>
            <li><a href="https://powo.science.kew.org/taxon/urn:lsid:ipni.org:names:462280-1" target="_blank">https://powo.science.kew.org/taxon/urn:lsid:ipni.org:names:462280-1</a></li>
        </ol>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://www.britannica.com/biography/Carolus-Linnaeus" target="_blank">https://www.britannica.com/biography/Carolus-Linnaeus</a></li>
            <li><a href="https://www.inaturalist.org/taxa/48809-Lauraceae/browse_photos" target="_blank">https://www.inaturalist.org/taxa/48809-Lauraceae/browse_photos</a></li>
            <li><a href="https://www.flickr.com/photos/wwwssncomphotos/32832258184" target="_blank">https://www.flickr.com/photos/wwwssncomphotos/32832258184</a></li>
            <li><a href="https://www.flickr.com/photos/wwwssncomphotos/13980738418" target="_blank">https://www.flickr.com/photos/wwwssncomphotos/13980738418</a></li>
            <li><a href="https://www.researchgate.net/figure/Young-sapling-of-Actinodaphne-macrophylla-showing-the-growing-tip-and-yellow-green-young_fig2_316739353" target="_blank">https://www.researchgate.net/figure/Young-sapling-of-Actinodaphne-macrophylla-showing-the-growing-tip-and-yellow-green-young_fig2_316739353</a></li>
            <li><a href="https://powo.science.kew.org/results?q=Actinodaphne+macrophylla" target="_blank">https://powo.science.kew.org/results?q=Actinodaphne+macrophylla</a></li>
            <li><a href="https://identify.plantnet.org/zh/k-world-flora/species/Pittosporum%20brevicalyx%20(Oliv.)%20Gagnep./data" target="_blank">https://identify.plantnet.org/zh/k-world-flora/species/Pittosporum%20brevicalyx%20(Oliv.)%20Gagnep./data</a></li>
            <li><a href="https://garden.org/plants/photo/381597/" target="_blank">https://garden.org/plants/photo/381597/</a></li>
            <li><a href="https://k.sina.cn/article_3960624673_pec12562102700qrdy.php" target="_blank">https://k.sina.cn/article_3960624673_pec12562102700qrdy.php</a></li>
            <li><a href="http://www.floraofbangladesh.com/2020/06/daruchini-or-true-cinnamon-tree.php" target="_blank">http://www.floraofbangladesh.com/2020/06/daruchini-or-true-cinnamon-tree.php</a></li>
            <li><a href="https://zh.wikipedia.org/zh-cn/File:Illustration_Laurus_nobilis0.jpg" target="_blank">https://zh.wikipedia.org/zh-cn/File:Illustration_Laurus_nobilis0.jpg</a></li>
            <li><a href="https://www.britannica.com/plant/California-laurel" target="_blank">https://www.britannica.com/plant/California-laurel</a></li>
            <li><a href="https://www.bomagardencentre.co.uk/product/laurus-nobilis-spiral-stem-foliage-diameter-d40" target="_blank">https://www.bomagardencentre.co.uk/product/laurus-nobilis-spiral-stem-foliage-diameter-d40</a></li>
            <li><a href="https://fo-fo.facebook.com/plantsdirecttasmania/" target="_blank">https://fo-fo.facebook.com/plantsdirecttasmania/</a></li>
            <li><a href="https://www.pinterest.com/pin/288652657337869051/" target="_blank">https://www.pinterest.com/pin/288652657337869051/</a></li>
            <li><a href="https://www.tipsbulletin.com/trees-with-white-flowers/" target="_blank">https://www.tipsbulletin.com/trees-with-white-flowers/</a></li>
        </ol>
        <h2>Tutorial Page</h2>
        <h3>Information:</h3>
        <ol>
            <li><a href="https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2" target="_blank">https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2</a></li>
            <li><a href="https://www.slideshare.net/slideshow/taxonomy-herbarium/37866560" target="_blank">https://www.slideshare.net/slideshow/taxonomy-herbarium/37866560</a></li>
        </ol>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://unbherbarium.lib.unb.ca/page/guidelines-collecting" target="_blank">https://unbherbarium.lib.unb.ca/page/guidelines-collecting</a></li>
            <li><a href="https://www.floridamuseum.ufl.edu/herbarium/methods/vouchers/" target="_blank">https://www.floridamuseum.ufl.edu/herbarium/methods/vouchers/</a></li>
            <li><a href="https://depositphotos.com/vectors/leaf.php" target="_blank">https://depositphotos.com/vectors/leaf.php</a></li>
            <li><a href="https://www.prints-online.com/curator-working-botany-department-8594365.php" target="_blank">https://www.prints-online.com/curator-working-botany-department-8594365.php</a></li>
            <li><a href="https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2" target="_blank">https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2</a></li>
            <li><a href="https://www.cnps.org/flora-magazine/homemade-herbarium-18932" target="_blank">https://www.cnps.org/flora-magazine/homemade-herbarium-18932</a></li>
            <li><a href="https://stories.rbge.org.uk/archives/24762" target="_blank">https://stories.rbge.org.uk/archives/24762</a></li>
            <li><a href="https://carnegiemnh.org/expanding-the-value-of-herbarium-specimens-with-citizen-science-app-inaturalist/" target="_blank">https://carnegiemnh.org/expanding-the-value-of-herbarium-specimens-with-citizen-science-app-inaturalist/</a></li>
            <li><a href="https://norcalbotanists.org/scholarships/dean-w-taylor-botanical-exploration-memorial-award/" target="_blank">https://norcalbotanists.org/scholarships/dean-w-taylor-botanical-exploration-memorial-award/</a></li>
        </ol>
        <h2>Tools Page</h2>
        <h3>Information:</h3>
        <ol>
            <li><a href="https://www.oshibana.com/herbarium/en/about-plant-specimens/labeling.php" target="_blank">https://www.oshibana.com/herbarium/en/about-plant-specimens/labeling.php</a></li>
            <li><a href="https://www.usu.edu/herbarium/education/learning-about-plants/plant-collecting" target="_blank">https://www.usu.edu/herbarium/education/learning-about-plants/plant-collecting</a></li>
            <li><a href="https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2" target="_blank">https://www.herbsociety.org/file_download/inline/2c81731f-ecd5-4f5d-a142-666830a89ed2</a></li>
        </ol>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://associatedplastics.com.au/product/cardboard/" target="_blank">https://associatedplastics.com.au/product/cardboard/</a></li>
            <li><a href="https://herbariumsupply.com/product/hikers-press-blotter-refills/" target="_blank">https://herbariumsupply.com/product/hikers-press-blotter-refills/</a></li>
            <li><a href="https://www.rtrmax.com/en/product/pointing-trowel/" target="_blank">https://www.rtrmax.com/en/product/pointing-trowel/</a></li>
            <li><a href="https://www.u-buy.com.ng/product/1699YYK8S-classiccut-1-in-forged-steel-branch-and-stem-pruner-6-piece" target="_blank">https://www.u-buy.com.ng/product/1699YYK8S-classiccut-1-in-forged-steel-branch-and-stem-pruner-6-piece</a></li>
            <li><a href="https://giftsn.com.sg/product-category/adhesive-consumable/florist-cutters-knives/" target="_blank">https://giftsn.com.sg/product-category/adhesive-consumable/florist-cutters-knives/</a></li>
            <li><a href="https://multirange.com.au/shop/singlet-bags-carton-of-5000-small/" target="_blank">https://multirange.com.au/shop/singlet-bags-carton-of-5000-small/</a></li>
            <li><a href="https://www.thoughtco.com/free-newspaper-printables-1832431" target="_blank">https://www.thoughtco.com/free-newspaper-printables-1832431</a></li>
            <li><a href="https://www.boss-inc.com/product/field-notes-kraft-3-pack/" target="_blank">https://www.boss-inc.com/product/field-notes-kraft-3-pack/</a></li>
            <li><a href="https://www.cnps.org/flora-magazine/homemade-herbarium-18932" target="_blank">https://www.cnps.org/flora-magazine/homemade-herbarium-18932</a></li>
            <li><a href="https://reserves.canmananna.cat/how-to-pack-a-herbarium-specimen-for-loan-the-ff-nByG0MIb/" target="_blank">https://reserves.canmananna.cat/how-to-pack-a-herbarium-specimen-for-loan-the-ff-nByG0MIb/</a></li>
            <li><a href="https://carnegiemnh.org/expanding-the-value-of-herbarium-specimens-with-citizen-science-app-inaturalist/" target="_blank">https://carnegiemnh.org/expanding-the-value-of-herbarium-specimens-with-citizen-science-app-inaturalist/</a></li>
            <li><a href="https://stories.rbge.org.uk/archives/24762" target="_blank">https://stories.rbge.org.uk/archives/24762</a></li>
            <li><a href="https://www.eiscolabs.com/products/bi0126" target="_blank">https://www.eiscolabs.com/products/bi0126</a></li>
            <li><a href="https://www.amazon.com/Opaeroo-Emergency-Substitute-Hurricane-Decoration-Black/dp/B09VZ5C8GL" target="_blank">https://www.amazon.com/Opaeroo-Emergency-Substitute-Hurricane-Decoration-Black/dp/B09VZ5C8GL</a></li>
            <li><a href="https://nordic-lab.com/freezer/lt-c400-large-laboratory-chest-freezer/" target="_blank">https://nordic-lab.com/freezer/lt-c400-large-laboratory-chest-freezer/</a></li>
            <li><a href="https://www.walmart.com/ip/Barebones-Garden-Scissors/588581520" target="_blank">https://www.walmart.com/ip/Barebones-Garden-Scissors/588581520</a></li>
            <li><a href="https://www.amazon.com/Palette-Stirring-Cosmetics-Stainless-Cosmetic/dp/B0CWPMSW3W" target="_blank">https://www.amazon.com/Palette-Stirring-Cosmetics-Stainless-Cosmetic/dp/B0CWPMSW3W</a></li>
            <li><a href="https://www.amazon.in/AAProTools-Teasing-Needle-Straight-Angled/dp/B088M4VVQN" target="_blank">https://www.amazon.in/AAProTools-Teasing-Needle-Straight-Angled/dp/B088M4VVQN</a></li>
            <li><a href="https://www.homesciencetools.com/product/forceps-curved-tip/" target="_blank">https://www.homesciencetools.com/product/forceps-curved-tip/</a></li>
            <li><a href="https://www.amazon.com/Large-Genuine-Bone-Folder-Tool/dp/B07JMJ5XGD" target="_blank">https://www.amazon.com/Large-Genuine-Bone-Folder-Tool/dp/B07JMJ5XGD</a></li>
            <li><a href="https://topecoclean.en.made-in-china.com/product/JdntFqCVnUry/China-Topeco-Daily-Necessities-Kitchen-Sponges-Melamine-Nano-Sponge-Magic-Sponge-Cleaning-Durable-Pad.php" target="_blank">https://topecoclean.en.made-in-china.com/product/JdntFqCVnUry/China-Topeco-Daily-Necessities-Kitchen-Sponges-Melamine-Nano-Sponge-Magic-Sponge-Cleaning-Durable-Pad.php</a></li>
            <li><a href="https://mx.pinterest.com/pin/143059725658309580/" target="_blank">https://mx.pinterest.com/pin/143059725658309580/</a></li>
            <li><a href="https://shopee.com.my/A4-All-Purpose-70gsm-1-Carton-Box-(5-Reams)-(500-sheets-ream)-i.103435544.12912856969" target="_blank">https://shopee.com.my/A4-All-Purpose-70gsm-1-Carton-Box-(5-Reams)-(500-sheets-ream)-i.103435544.12912856969</a></li>
            <li><a href="https://www.amazon.ae/XYZOOM-100Pcs-Stainless-Steel-Washer/dp/B0CKHXSH3R" target="_blank">https://www.amazon.ae/XYZOOM-100Pcs-Stainless-Steel-Washer/dp/B0CKHXSH3R</a></li>
            <li><a href="https://www.artsupplywarehouse.com/products/lineco-neutral-ph-adhesive-4oz%7CLINBBHM207.php" target="_blank">https://www.artsupplywarehouse.com/products/lineco-neutral-ph-adhesive-4oz%7CLINBBHM207.php</a></li>
            <li><a href="https://www.lazada.com.my/products/100-pcs-1-x-1-x-1-inch-blocks-natural-wood-blocks-bulk-small-square-wooden-blocks-for-diy-crafts-i3574674561.php" target="_blank">https://www.lazada.com.my/products/100-pcs-1-x-1-x-1-inch-blocks-natural-wood-blocks-bulk-small-square-wooden-blocks-for-diy-crafts-i3574674561.php</a></li>
            <li><a href="https://freshening.com/product/aluminium-foil-tray-full-size/" target="_blank">https://freshening.com/product/aluminium-foil-tray-full-size/</a></li>
            <li><a href="https://wooba.com.my/e-shop/food-beverage/miscellaneous/aluminium-foil/" target="_blank">https://wooba.com.my/e-shop/food-beverage/miscellaneous/aluminium-foil/</a></li>
            <li><a href="https://www.desertcart.sc/products/47942339" target="_blank">https://www.desertcart.sc/products/47942339</a></li>
            <li><a href="https://utrading.com.my/product/sharpie-classic-f-permanent-marker-pen-black-blue-green-red/" target="_blank">https://utrading.com.my/product/sharpie-classic-f-permanent-marker-pen-black-blue-green-red/</a></li>
            <li><a href="https://www.ikea.com/my/en/p/ikea-365-bowl-rounded-sides-white-40278350/" target="_blank">https://www.ikea.com/my/en/p/ikea-365-bowl-rounded-sides-white-40278350/</a></li>
            <li><a href="https://yallabuyit.ae/product/premium-brush-25-inch" target="_blank">https://yallabuyit.ae/product/premium-brush-25-inch</a></li>
            <li><a href="https://www.mentalfloss.com/smart-shopping/diy-gift-guide" target="_blank">https://www.mentalfloss.com/smart-shopping/diy-gift-guide</a></li>
        </ol>
        <h2>Care Page</h2>
        <h3>Information:</h3>
        <ol>
            <li><a href="https://www.rbge.org.uk/science-and-conservation/herbarium/specimen-preparation-care/care-and-conservation-of-herbarium-specimens/" target="_blank">https://www.rbge.org.uk/science-and-conservation/herbarium/specimen-preparation-care/care-and-conservation-of-herbarium-specimens/</a></li>
            <li><a href="https://www.freshlypressed.ch/blog/2017/7/2/herbarium-how-to-1-ythsk" target="_blank">https://www.freshlypressed.ch/blog/2017/7/2/herbarium-how-to-1-ythsk</a></li>
        </ol>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://www.rbge.org.uk/science-and-conservation/herbarium/specimen-preparation-care/care-and-conservation-of-herbarium-specimens/" target="_blank">https://www.rbge.org.uk/science-and-conservation/herbarium/specimen-preparation-care/care-and-conservation-of-herbarium-specimens/</a></li>
            <li><a href="https://www.sciencedirect.com/science/article/pii/S1574954121000340" target="_blank">https://www.sciencedirect.com/science/article/pii/S1574954121000340</a></li>
            <li><a href="https://emilykmeineke.com/projects" target="_blank">https://emilykmeineke.com/projects</a></li>
            <li><a href="https://www.nybg.org/planttalk/continuing-nybgs-botanical-fieldwork-in-the-age-of-covid-19-the-long-journey-of-herbarium-specimens-from-vanuatu-to-the-bronx/" target="_blank">https://www.nybg.org/planttalk/continuing-nybgs-botanical-fieldwork-in-the-age-of-covid-19-the-long-journey-of-herbarium-specimens-from-vanuatu-to-the-bronx/</a></li>
            <li><a href="https://fwbg.org/phytophilia-blog/john-atwood-the-bryophytes-of-the-missouri-botanical-garden-herbarium-library/" target="_blank">https://fwbg.org/phytophilia-blog/john-atwood-the-bryophytes-of-the-missouri-botanical-garden-herbarium-library/</a></li>
            <li><a href="https://www.yourweather.co.uk/news/science/scientists-reveal-climate-induced-changes-in-flora-through-analysis-of-centuries-old-herbaria.php" target="_blank">https://www.yourweather.co.uk/news/science/scientists-reveal-climate-induced-changes-in-flora-through-analysis-of-centuries-old-herbaria.php</a></li>
        </ol>
        <h2>Contribution Page</h2>
        <h3>Image:</h3>
        <ol>
            <li><a href="https://www.freepik.com/premium-ai-image/black-monstera-leaves-background-wallpaper_87202586.htm" target="_blank">https://www.freepik.com/premium-ai-image/black-monstera-leaves-background-wallpaper_87202586.htm</a></li>
        </ol>
        <h2>Registration Page</h2>
        <h3>Image:</h3>
        <ol>
            <li><a href="https://www.vecteezy.com/free-photos/exotic-plants" target="_blank">https://www.vecteezy.com/free-photos/exotic-plants</a></li>
        </ol>
        <h2>Profile Page(s)</h2>
        <h3>Images:</h3>
        <ol>
            <li><a href="https://www.pinterest.com/yangh736/%E6%96%B0%E7%94%B0%E7%9C%9F%E5%8A%8D%E4%BD%91/" target="_blank">https://www.pinterest.com/yangh736/%E6%96%B0%E7%94%B0%E7%9C%9F%E5%8A%8D%E4%BD%91/</a></li>
            <li><a href="https://www.bookurve.com/book/9780062961372/almond-a-novel" target="_blank">https://www.bookurve.com/book/9780062961372/almond-a-novel</a></li>
            <li><a href="https://www.bookurve.com/book/9781783290215/vicious" target="_blank">https://www.bookurve.com/book/9781783290215/vicious</a></li>
            <li><a href="https://www.pcgames4u.com/product-page/stardew-valley-v1-6-8-%E6%98%9F%E9%9C%B2%E8%B0%B7%E7%89%A9%E8%AF%AD-v1-6-8-%E7%A7%8D%E7%94%B0%E7%A5%9E%E4%BD%9C" target="_blank">https://www.pcgames4u.com/product-page/stardew-valley-v1-6-8-%E6%98%9F%E9%9C%B2%E8%B0%B7%E7%89%A9%E8%AF%AD-v1-6-8-%E7%A7%8D%E7%94%B0%E7%A5%9E%E4%BD%9C</a></li>
            <li><a href="https://genshin-impact.fandom.com/wiki/Character" target="_blank">https://genshin-impact.fandom.com/wiki/Character</a></li>
            <li><a href="https://japaneseanime.fandom.com/wiki/A_Silent_Voice" target="_blank">https://japaneseanime.fandom.com/wiki/A_Silent_Voice</a></li>
            <li><a href="https://buzzer.gr/shop/paichnidia/geniki-katigoria/the-song-of-achilles-pb/" target="_blank">https://buzzer.gr/shop/paichnidia/geniki-katigoria/the-song-of-achilles-pb/</a></li>
            <li><a href="https://zh.wikipedia.org/w/index.php?title=%E4%B9%98%E6%B5%AA%E4%B9%8B%E7%B4%84&oldformat=true&variant=zh-cn" target="_blank">https://zh.wikipedia.org/w/index.php?title=%E4%B9%98%E6%B5%AA%E4%B9%8B%E7%B4%84&oldformat=true&variant=zh-cn</a></li>
            <li><a href="https://www.ebay.com.my/itm/265215042474" target="_blank">https://www.ebay.com.my/itm/265215042474</a></li>
            <li><a href="https://www.facebook.com/p/Bintulu-Laksa-Delivery-Service-COD-100066315387115/?locale=zh_CN" target="_blank">https://www.facebook.com/p/Bintulu-Laksa-Delivery-Service-COD-100066315387115/?locale=zh_CN</a></li>
            <li><a href="https://mirifoodsharing.blogspot.com/2015/04/rojak-warisan-piasau-utara-miri.php" target="_blank">https://mirifoodsharing.blogspot.com/2015/04/rojak-warisan-piasau-utara-miri.php</a></li>
            <li><a href="http://jackstclivebay.blogspot.com/2015/03/coconut-tom-yam-big-head-prawn-mee.php" target="_blank">http://jackstclivebay.blogspot.com/2015/03/coconut-tom-yam-big-head-prawn-mee.php</a></li>
            <li><a href="https://www.popularonline.com.my/default/6.php?did=8" target="_blank">https://www.popularonline.com.my/default/6.php?did=8</a></li>
            <li><a href="https://ivivan.com/2015/10/18/words-are-the-source-of-misunderstandings/" target="_blank">https://ivivan.com/2015/10/18/words-are-the-source-of-misunderstandings/</a></li>
            <li><a href="https://www.youbeli.com/m/product_info.php?products_id=5798898&language=en" target="_blank">https://www.youbeli.com/m/product_info.php?products_id=5798898&language=en</a></li>
            <li><a href="https://m-apps.qoo-app.com/en-US/app/30947" target="_blank">https://m-apps.qoo-app.com/en-US/app/30947</a></li>
            <li><a href="https://www.apalevel.com/game/mobile-legends-bang-bang/" target="_blank">https://www.apalevel.com/game/mobile-legends-bang-bang/</a></li>
            <li><a href="https://www.hancinema.net/korean_drama_Taxi_Driver-shopping.php" target="_blank">https://www.hancinema.net/korean_drama_Taxi_Driver-shopping.php</a></li>
            <li><a href="https://www.rottentomatoes.com/tv/inspector_koo" target="_blank">https://www.rottentomatoes.com/tv/inspector_koo</a></li>
            <li><a href="https://darura.tistory.com/8" target="_blank">https://darura.tistory.com/8</a></li>
            <li><a href="https://sarawaktourism.com/attraction/darul-hana-bridge" target="_blank">https://sarawaktourism.com/attraction/darul-hana-bridge</a></li>
            <li><a href="https://www.bilibili.com/video/BV1NJ4m1b7PN/?spm_id_from=333.788.recommend_more_video.6" target="_blank">https://www.bilibili.com/video/BV1NJ4m1b7PN/?spm_id_from=333.788.recommend_more_video.6</a></li>
            <li><a href="https://malaysia.kinokuniya.com/bw/9781408855652" target="_blank">https://malaysia.kinokuniya.com/bw/9781408855652</a></li>
            <li><a href="https://www.books.ba/en/bookshop/science-fiction-fantasy/harry-potter-and-the-deathly-hallows-book-7-detail" target="_blank">https://www.books.ba/en/bookshop/science-fiction-fantasy/harry-potter-and-the-deathly-hallows-book-7-detail</a></li>
            <li><a href="https://www.ebay.com.my/itm/115960259265" target="_blank">https://www.ebay.com.my/itm/115960259265</a></li>
            <li><a href="https://www.carousell.com.my/p/it-takes-two-digital-download-ps4-1305049486/" target="_blank">https://www.carousell.com.my/p/it-takes-two-digital-download-ps4-1305049486/</a></li>
            <li><a href="https://sea.ign.com/figment" target="_blank">https://sea.ign.com/figment</a></li>
            <li><a href="https://www.themoviedb.org/tv/207197/images/posters?language=zh-CN" target="_blank">https://www.themoviedb.org/tv/207197/images/posters?language=zh-CN</a></li>
            <li><a href="https://fr.mydramalist.com/list/10dlDWP1" target="_blank">https://fr.mydramalist.com/list/10dlDWP1</a></li>
            <li><a href="https://zh.m.wikipedia.org/zh-my/%E6%97%BA%E5%8D%A1_%28%E9%9B%BB%E5%BD%B1%29?oldformat=true" target="_blank">https://zh.m.wikipedia.org/zh-my/%E6%97%BA%E5%8D%A1_%28%E9%9B%BB%E5%BD%B1%29?oldformat=true</a></li>
            <li><a href="https://www.everydayfoodilove.co/2014/08/fatt-kee-fish-noodle-jin-jin-seafood.php" target="_blank">https://www.everydayfoodilove.co/2014/08/fatt-kee-fish-noodle-jin-jin-seafood.php</a></li>
            <li><a href="https://www.geocaching.com/geocache/GCAJJY4" target="_blank">https://www.geocaching.com/geocache/GCAJJY4</a></li>
            <li><a href="https://www.instagram.com/wongtongwei/p/Chm4txpvXZ4/" target="_blank">https://www.instagram.com/wongtongwei/p/Chm4txpvXZ4/</a></li>
            <li><a href="https://cn.scholastic.asia/book/thea-stilton-and-the-cherry-blossom-adventure" target="_blank">https://cn.scholastic.asia/book/thea-stilton-and-the-cherry-blossom-adventure</a></li>
            <li><a href="https://www.popularonline.com.my/cnsimplified/catalog/product/view/id/194354/s/9781338729399/?did=9549" target="_blank">https://www.popularonline.com.my/cnsimplified/catalog/product/view/id/194354/s/9781338729399/?did=9549</a></li>
            <li><a href="https://shopee.com.my/Diary-of-a-Wimpy-Kid-18-No-Brainer-Author-Kinney-Jeff-ISBN-9780241583135-i.70790205.22288078245" target="_blank">https://shopee.com.my/Diary-of-a-Wimpy-Kid-18-No-Brainer-Author-Kinney-Jeff-ISBN-9780241583135-i.70790205.22288078245</a></li>
            <li><a href="https://www.ebay.com.my/itm/394332705186" target="_blank">https://www.ebay.com.my/itm/394332705186</a></li>
            <li><a href="https://rhythmhive.hybecorp.com/" target="_blank">https://rhythmhive.hybecorp.com/</a></li>
            <li><a href="https://www.ebay.com.my/itm/292208461859" target="_blank">https://www.ebay.com.my/itm/292208461859</a></li>
            <li><a href="https://www.sohu.com/a/130995258_612211" target="_blank">https://www.sohu.com/a/130995258_612211</a></li>
            <li><a href="https://www.mycast.io/stories/catch-me-if-you-can-2012" target="_blank">https://www.mycast.io/stories/catch-me-if-you-can-2012</a></li>
            <li><a href="https://www.pinterest.com/tiiriloutinen/" target="_blank">https://www.pinterest.com/tiiriloutinen/</a></li>
            <li><a href="https://www.periuk.my/recipes/kacangma-chicken" target="_blank">https://www.periuk.my/recipes/kacangma-chicken</a></li>
            <li><a href="https://seamauiborneo.com/2023/06/09/enjoy-the-sunset-at-tanjung-aru/" target="_blank">https://seamauiborneo.com/2023/06/09/enjoy-the-sunset-at-tanjung-aru/</a></li>
            <li><a href="https://steemit.com/food/@dolphinstudios/the-foods-must-have-in-sibu-sarawak-201768t12135184z" target="_blank">https://steemit.com/food/@dolphinstudios/the-foods-must-have-in-sibu-sarawak-201768t12135184z</a></li>
            <li><a href="https://sarawaktourism.com/HeritageDetail.aspx?pid=3003&plat=1.561209000000000&plng=110.347233000000000" target="_blank">https://sarawaktourism.com/HeritageDetail.aspx?pid=3003&plat=1.561209000000000&plng=110.347233000000000</a></li>
            <li><a href="https://www.shutterstock.com/image-photo/type-frugal-food-chinese-kuching-sarawak-1059336758" target="_blank">https://www.shutterstock.com/image-photo/type-frugal-food-chinese-kuching-sarawak-1059336758</a></li>
            <li><a href="https://www.pinterest.com/pin/for-zhang-linghe--781867185331137349/" target="_blank">https://www.pinterest.com/pin/for-zhang-linghe--781867185331137349/</a></li>
            <li><a href="https://twitter.com/dailyzlinghe/status/1793485314855760149" target="_blank">https://twitter.com/dailyzlinghe/status/1793485314855760149</a></li>
            <li><a href="https://baijiahao.baidu.com/s?id=1733249973389129138&wfr=spider&for=pc&searchword=tnt%E6%97%B6%E4%BB%A3%E5%B0%91%E5%B9%B4%E5%9B%A2%E9%87%91%E5%8F%A5" target="_blank">https://baijiahao.baidu.com/s?id=1733249973389129138&wfr=spider&for=pc&searchword=tnt%E6%97%B6%E4%BB%A3%E5%B0%91%E5%B9%B4%E5%9B%A2%E9%87%91%E5%8F%A5</a></li>
            <li><a href="https://theculturetrip.com/asia/malaysia/articles/why-malaysias-mt-kinabalu-is-so-sacred" target="_blank">https://theculturetrip.com/asia/malaysia/articles/why-malaysias-mt-kinabalu-is-so-sacred</a></li>
            <li><a href="http://lilianajalin.blogspot.com/2017/04/blog-post.php" target="_blank">http://lilianajalin.blogspot.com/2017/04/blog-post.php</a></li> 
            <li><a href="https://www.playstation.com/en-my/games/overcooked-2/" target="_blank">https://www.playstation.com/en-my/games/overcooked-2/</a></li>
            <li><a href="https://www.lemon8-app.com/amyyyyy98/7149952796995944961?region=us" target="_blank">https://www.lemon8-app.com/amyyyyy98/7149952796995944961?region=us</a></li>
            <li><a href="https://commons.wikimedia.org/wiki/File:Sarikei_pineapple_symbol.jpg" target="_blank">https://commons.wikimedia.org/wiki/File:Sarikei_pineapple_symbol.jpg</a></li>
            <li><a href="https://www.kkday.com/zh-my/product/125836-sapi-island-manukan-island-hopping-day-tour-sabah" target="_blank">https://www.kkday.com/zh-my/product/125836-sapi-island-manukan-island-hopping-day-tour-sabah</a></li>
            <li><a href="https://melissathegreat.com/category/food/location/sarikei-location/" target="_blank" >https://melissathegreat.com/category/food/location/sarikei-location/</a></li>
            <li><a href="https://www.tumblr.com/perthfoodreview/187121213134/kk-sabah-sheng-rou-mian-%E7%94%9F%E8%82%89%E9%9D%A2-yummy-pork" target="_blank">https://www.tumblr.com/perthfoodreview/187121213134/kk-sabah-sheng-rou-mian-%E7%94%9F%E8%82%89%E9%9D%A2-yummy-pork</a></li>
            <li><a href="http://sixthseal.com/2008/06/24/sebangkoi-country-resort-sarikei/" target="_blank">http://sixthseal.com/2008/06/24/sebangkoi-country-resort-sarikei/</a></li> 
            <li><a href="https://www.iloveborneo.my/lokasi-skuba-diving-bawah-laut-di-sarawak/" target="_blank">https://www.iloveborneo.my/lokasi-skuba-diving-bawah-laut-di-sarawak/</a></li>
            <li><a href="https://www.iloveborneo.my/jungle-trekking-taman-bukit-tumbina-bintulu/" target="_blank">https://www.iloveborneo.my/jungle-trekking-taman-bukit-tumbina-bintulu/</a></li>
            <li><a href="https://triphie.com/pointOfInterest/pantai_tanjung_batu_bintulu_adfdbce8-ab09-42b4-b829-11164fe0262d" target="_blank">https://triphie.com/pointOfInterest/pantai_tanjung_batu_bintulu_adfdbce8-ab09-42b4-b829-11164fe0262d</a></li>
            <li><a href="https://www.tatlerasia.com/dining/food/underrated-sabah-sarawak-dishes" target="_blank">https://www.tatlerasia.com/dining/food/underrated-sabah-sarawak-dishes</a></li>
            <li><a href="https://www.instagram.com/p/C_qZFM9gNBP/?locale=zh-hans&hl=bn" target="_blank">https://www.instagram.com/p/C_qZFM9gNBP/?locale=zh-hans&hl=bn</a></li>
            <li><a href="https://www.pinterest.com/peicicen544/wonwoo/" target="_blank">https://www.pinterest.com/peicicen544/wonwoo/</a></li>
            <li><a href="https://kr.pinterest.com/pin/220324606763732781/" target="_blank">https://kr.pinterest.com/pin/220324606763732781/</a></li>
        </ol>
	</div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>