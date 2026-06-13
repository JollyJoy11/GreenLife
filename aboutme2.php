<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Profile -->
<!-- Author: Ellie Teng Ai Lee -->
<!-- Date 10/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Ellie Teng | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Ellie Teng Ai Lee"/>
	<meta name="description" content="This is the profile of Ellie."/>
	<meta name="keywords" content="Ellie, 104381518, favourite, profile, member, achievement"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article class="profile_page">
    <?php include "include/enquiry_btn.php"; ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <h1>Member Profile</h1>
    <figure class="profile_pic_ellie">
        <img src="images/Ellie.jpg" alt="Ellie Teng"/>
    </figure>
    <p class="stud_name">Ellie Teng Ai Lee</p>
    <p class="stud_id">104381518</p>
    <p class="stud_course">Bachelor of Computer Science</p>

<!-- Demographic -->
    <div class="pf_demo">
        <div class="pf_heading">
            <h2>Demographic Information</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_ellie">
            <tr>
                <th class="round_tlborder">Birthday</th>
                <td colspan="3">09 September 2005</td>
            </tr>
            <tr>
                <th>Zodiac</th>
                <td colspan="3">Virgo</td>
            </tr>
            <tr>
                <th>Races</th>
                <td>Chinese</td>
                <th>Ethnicity</th>
                <td>FooChow</td>
            </tr>
            <tr>
                <th rowspan="2" class="round_blborder">Hometown</th>
                <td colspan="3">Sarikei, Sarawak</td>
            </tr>
            <tr>
                <td colspan="3">
                    <ul>
                        <li>
                            <figure>
                                <img src="images/munsohwaterfall.jpg" alt="Pala Munsoh Waterfalls"/>
                                <figcaption>Pala Munsoh Waterfalls, Bayong, Sarikei</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/sebangkoi.jpg" alt="Sebangkoi Nature Park"/>
                                <figcaption>Sebangkoi Nature Park, Sarikei</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/pineapplesarikei.jpg" alt="Mount Kinabalu"/>
                                <figcaption>Sarikei Famous Landmark, Pineapple</figcaption>
                            </figure>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
<!-- Favourite -->
    <div class="pf_fav">
        <div class="pf_heading">
            <h2>Favourite</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_ellie">
            <tr>
                <th class="round_tlborder">Hometown Dish</th>
                <td>
                    <ul>
                        <li>
                            <figure>
                                <img src="images/coconutprawnnoodle.jpg" alt="Big Prawn Noodle in Coconut Shell"/>
                                <figcaption>Big Prawn Noodle</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/kompia.jpg" alt="Kompia"/>
                                <figcaption>Kompia</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/rojak.jpg" alt="Rojak"/>
                                <figcaption>Rojak</figcaption>
                            </figure>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Books</th>
                <td>
                    <ul>
                        <li><img src="images/elliebook1.jpg" alt="Harry Potter and the Philosopher's Stone" title="Harry Potter and the Philosopher's Stone"/></li>
                        <li><img src="images/elliebook2.jpg" alt="Harry Potter and the Deathly Hallows" title="Harry Potter and the Deathly Hallows"/></li>
                        <li><img src="images/elliebook3.jpg" alt="Harry Potter and the Goblet of Fire" title="Harry Potter and the Goblet of Fire"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Musics</th>
                <td class="music"><embed src="https://open.spotify.com/embed/track/33RQjaenIPK9cplxP0WL5F?utm_source=generator" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"/></td>
            </tr>
            <tr>
                <th>Movies/Dramas</th>
                <td>
                    <ul>
                        <li><img src="images/elliemovie1.jpg" alt="宁安如梦" title="宁安如梦"/></li>
                        <li><img src="images/elliemovie2.jpg" alt="四海重明" title="四海重明"/></li>
                        <li><img src="images/elliemovie3.jpg" alt="Wonka" title="Wonka"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Games</th>
                <td>
                    <ul>
                        <li><img src="images/elliegame1.jpg" alt="It Takes Two" title="It Takes Two"/></li>
                        <li><img src="images/elliegame2.jpg" alt="Figment" title="Figment"/></li>
                        <li><img src="images/overcooked.jpg" alt="Overcooked! 2" title="Overcooked! 2"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th class="round_blborder">Celebrities</th>
                <td class="round_brborder">
                    <ul>
                        <li>Zhang LingHe</li>
                        <li><img src="images/linghe1.jpg" alt="Zhang LingHe"/></li>
                        <li><img src="images/linghe2.jpg" alt="Zhang LingHe"/></li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
<!-- Achievement -->
    <div class="pf_achievement">
        <div class="pf_heading">
            <h2>Life Achievements</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_ellie">
            <tr>
                <th class="round_tlborder round_blborder">Achievements</th>
                <td>
                    <ul>
                        <li>Drove a long distance trip alone</li>
                        <li>President of School Brass Band</li>
                        <li>Bronze in international brass band competition</li>
                        <li>Gold in Chemistry Quiz Competition</li>
                        <li>Get Motorbike and Car Driving License at the same time</li>
                        <li>Has two ex-boyfriends</li>
                        <li>Went to 13 beaches in one day</li>
                    </ul>
                </td>
            </tr>
        </table>               
    </div>

    <div class="pf_email">
        <a href="mailto:104381518@students.swinburne.edu.my"><i class="fa-solid fa-envelope"></i> EMAIL ME</a>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>