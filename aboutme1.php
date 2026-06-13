<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Profile -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date 10/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Joanne Chin | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="This is the profile of Joanne."/>
	<meta name="keywords" content="Joanne, 104384232, favourite, profile, member, achievement"/>
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
    <figure class="profile_pic_joanne">
        <img src="images/Joanne.jpg" alt="Joanne Chin"/>
    </figure>
    <p class="stud_name">Joanne Chin Jia Xuan</p>
    <p class="stud_id">104384232</p>
    <p class="stud_course">Bachelor of Computer Science</p>
   
<!-- Demographic -->
    <div class="pf_demo">
        <div class="pf_heading">
            <h2>Demographic Information</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_joanne">
            <tr>
                <th class="round_tlborder">Birthday</th>
                <td colspan="3">11 January 2005</td>
            </tr>
            <tr>
                <th>Zodiac</th>
                <td colspan="3">Capricorn</td>
            </tr>
            <tr>
                <th>Races</th>
                <td>Chinese</td>
                <th>Ethnicity</th>
                <td>Hakka</td>
            </tr>
            <tr>
                <th rowspan="2" class="round_blborder">Hometown</th>
                <td colspan="3">Kota Kinabalu, Sabah</td>
            </tr>
            <tr>
                <td colspan="3">
                    <ul>
                        <li>
                            <figure>
                                <img src="images/kksunset.jpg" alt="Tanjung Aru Sunset"/>
                                <figcaption>Top 3 Sunset in the World at Tanjung Aru Beach</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/pulausapi.jpg" alt="Pulau Sapi"/>
                                <figcaption>One of the islands in Kota Kinabalu, Pulau Sapi</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/mountkinabalu.jpg" alt="Mount Kinabalu"/>
                                <figcaption>Highest Mountain in Southeast Asia, Mount Kinabalu</figcaption>
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
        <table class="pf_table_joanne">
            <tr>
                <th class="round_tlborder">Hometown Dish</th>
                <td>
                    <ul>
                        <li>
                            <figure>
                                <img src="images/sangnyukmian.png" alt="Sang Nyuk Mee"/>
                                <figcaption>Sang Nyuk Mee</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/fishnoodle.jpg" alt="Fatt Kee Fish Noodle"/>
                                <figcaption>Fatt Kee Fish Noodle</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/pekingduck.jpg" alt="King Hu Peking Duck"/>
                                <figcaption>King Hu Peking Duck</figcaption>
                            </figure>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Books</th>
                <td>
                    <ul>
                        <li><img src="images/joannebook1.jpg" alt="Thea Stilton and the Cherry Blossom Adventure" title="Thea Stilton and the Cherry Blossom Adventure"/></li>
                        <li><img src="images/joannebook2.jpeg" alt="Geronimo Stilton Graphic Novel: Last Ride at Luna Park" title="Geronimo Stilton Graphic Novel: Last Ride at Luna Park"/></li>
                        <li><img src="images/joannebook3.jpg" alt="Diary of a Wimpy Kid: No Brainer" title="Diary of a Wimpy Kid: No Brainer"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Musics</th>
                <td class="music"><embed src="https://open.spotify.com/embed/playlist/4jDrKv3DEulK1PBbBrF3qI?utm_source=generator" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"/></td>
            </tr>
            <tr>
                <th>Movies/Dramas</th>
                <td>
                    <ul>
                        <li><img src="images/joannemovie1.jpg" alt="Inception" title="Inception"/></li>
                        <li><img src="images/joannemovie2.jpeg" alt="Strong Woman Do Bong Soon" title="Strong Woman Do Bong Soon"/></li>
                        <li><img src="images/joannemovie3.jpg" alt="Catch Me If You Can" title="Catch Me If You Can"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Games</th>
                <td>
                    <ul>
                        <li><img src="images/overcooked.jpg" alt="Overcooked 2!" title="Overcooked! 2"/></li>
                        <li><img src="images/joannegame2.jpg" alt="Assassin's Creed: Odyssey" title="Assassin's Creed: Odyssey"/></li>
                        <li><img src="images/joannegame3.jpg" alt="Rhythm Hive" title="Rhythm Hive"/></li>
                    </ul> 
                </td>
            </tr>
            <tr>
                <th class="round_blborder">Celebrities</th>
                <td class="round_brborder">
                    <ul>
                        <li>Wonwoo</li>
                        <li><img src="images/wonwoo1.jpg" alt="Wonwoo"/></li>
                        <li><img src="images/wonwoo2.jpg" alt="Wonwoo"/></li>
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
        <table class="pf_table_joanne">
            <tr>
                <th class="round_tlborder round_blborder">Achievements</th>
                <td>
                    <ul>
                        <li>Maintain to be single for almost 20 years</li>
                        <li>Travel to another country by myself</li>
                        <li>Learn a new language</li>
                        <li>Foundation studies CGPA 4.0</li>
                        <li>SPM 10A</li>
                        <li>UPSR 8A</li>
                        <li>UEC 7A</li>
                    </ul>
                </td>
            </tr>
        </table>               
    </div>

    <div class="pf_email">
        <a href="mailto:104384232@students.swinburne.edu.my"><i class="fa-solid fa-envelope"></i> EMAIL ME</a>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>