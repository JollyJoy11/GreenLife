<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Profile -->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date 10/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Cyndia Teo | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Cyndia Teo Ya Aii"/>
	<meta name="description" content="This is the profile of Ellie."/>
	<meta name="keywords" content="Cyndia, 104381602, favourite, profile, member, achievement"/>
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
    <figure class="profile_pic_cyndia">
        <img src="images/Cyndia.jpg" alt="Cyndia Teo"/>
    </figure>
    <p class="stud_name">Cyndia Teo Ya Aii</p>
    <p class="stud_id">104381602</p>
    <p class="stud_course">Bachelor of Computer Science</p>

<!-- Demographic -->
    <div class="pf_demo">
        <div class="pf_heading">
            <h2>Demographic Information</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_cyndia">
            <tr>
                <th class="round_tlborder">Birthday</th>
                <td colspan="3">23 May 2005</td>
            </tr>
            <tr>
                <th>Zodiac</th>
                <td colspan="3">Gemini</td>
            </tr>
            <tr>
                <th>Races</th>
                <td>Chinese</td>
                <th>Ethnicity</th>
                <td>Teochew</td>
            </tr>
            <tr>
                <th rowspan="2" class="round_blborder">Hometown</th>
                <td colspan="3">Bintulu, Sarawak</td>
            </tr>
            <tr>
                <td colspan="3">
                    <ul>
                        <li>
                            <figure>
                                <img src="images/tanjungbatu.jpg" alt="Tanjung Batu"/>
                                <figcaption>Popular Beach in Binutlu, Tanjung Batu</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/similajau.jpg" alt="Similajau National Park"/>
                                <figcaption>Unique geographical features of Sarawak, Similajau National Park</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/tamantumbina.jpg" alt="Mount Kinabalu"/>
                                <figcaption>Jungle trekking trail, Taman Tumbina Bintulu</figcaption>
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
        <table class="pf_table_cyndia">
            <tr>
                <th class="round_tlborder">Hometown Dish</th>
                <td>
                    <ul>
                        <li>
                            <figure>
                                <img src="images/bintululaksa.jpg" alt="Laksa"/>
                                <figcaption>Laksa</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/bintulurojak.jpg" alt="Rojak"/>
                                <figcaption>Rojak</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/friedchickenfeet.jpg" alt="Fried Chicken Feet"/>
                                <figcaption>Fried Chicken Feet</figcaption>
                            </figure>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Books</th>
                <td>
                    <ul>
                        <li><img src="images/cyndiabook1.jpg" alt="哥妹俩:漫画故事6" title="哥妹俩:漫画故事6"/></li>
                        <li><img src="images/cyndiabook2.jpg" alt="The Little Prince" title="The Little Prince"/></li>
                        <li><img src="images/cyndiabook3.jpg" alt="Sherlock-Holmes: The Blanched Soldier" title="Sherlock-Holmes: The Blanched Soldier"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Musics</th>
                <td class="music"><embed src="https://open.spotify.com/embed/playlist/7ov5qM1K0SN6EZ5jDi19wT?utm_source=generator&theme=0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"/></td>
            </tr>
            <tr>
                <th>Movies/Dramas</th>
                <td>
                    <ul>
                        <li><img src="images/cyndiamovie1.jpg" alt="Taxi Driver" title="Taxi Driver"/></li>
                        <li><img src="images/cyndiamovie2.jpg" alt="Inspector Koo" title="Inspector Koo"/></li>
                        <li><img src="images/cyndiamovie3.jpg" alt="Mr Queen" title="Mr Queen"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Games</th>
                <td>
                    <ul>
                        <li><img src="images/cyndiagame1.jpg" alt="AFK Journey" title="AFK Journey"/></li>
                        <li><img src="images/cyndiagame2.jpg" alt="Mobile Legends Bang Bang" title="Mobile Legends Bang Bang"/></li>
                        <li><img src="images/overcooked.jpg" alt="Overcooked! 2" title="Overcooked! 2"/></li>
                    </ul> 
                </td>
            </tr>
            <tr>
                <th class="round_blborder">Celebrities</th>
                <td class="round_brborder">
                    <ul>
                        <li>
                            <figure>
                                <img src="images/majiaqi.jpg" alt="Jude Bellingham"/>
                                <figcaption>Ma JiaQi</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/woozi.jpg" alt="Callum Turner"/>
                                <figcaption>Woozi</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/eazinpoe.jpg" alt="Callum Turner"/>
                                <figcaption>Eazin Poe</figcaption>
                            </figure>
                        </li>
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
        <table class="pf_table_cyndia">
            <tr>
                <th class="round_tlborder round_blborder">Achievements</th>
                <td>
                    <ul>
                        <li>SPM 7A</li>
                        <li>Drone license</li>
                        <li>Photography 1st runner up</li>
                        <li>Frisbee mini tournament Champion</li>
                        <li>Maintain a good result in Accounting</li>
                        <li>Constantly challenging oneself</li>
                        <li>Represented the school in a calligraphy competition</li>
                    </ul>
                </td>
            </tr>
        </table>               
    </div>

    <div class="pf_email">
        <a href="mailto:104381602@students.swinburne.edu.my"><i class="fa-solid fa-envelope"></i> EMAIL ME</a>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>