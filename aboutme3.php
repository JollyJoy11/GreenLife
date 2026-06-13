<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Profile -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date 10/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Aryn Jee | Green Life</title>
	<meta charset="utf-8">
	<meta name="author" content="Aryn Jee Mei Wei"/>
	<meta name="description" content="This is the profile of Aryn."/>
	<meta name="keywords" content="Aryn, 102789770, favourite, profile, member, achievement"/>
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
    <figure class="profile_pic_aryn">
        <img src="images/Aryn.jpg" alt="Aryn Jee"/>
    </figure>
    <p class="stud_name">Aryn Jee Mei Wei</p>
    <p class="stud_id">102789770</p>
    <p class="stud_course">Bachelor of Computer Science</p>

<!-- Demographic -->
    <div class="pf_demo">
        <div class="pf_heading">
            <h2>Demographic Information</h2>
            <span class="line"></span>
        </div>
        <table class="pf_table_aryn">
            <tr>
                <th class="round_tlborder">Birthday</th>
                <td colspan="3">09 June 2005</td>
            </tr>
            <tr>
                <th>Zodiac</th>
                <td colspan="3">Gemini</td>
            </tr>
            <tr>
                <th>Races</th>
                <td>Chinese</td>
                <th>Ethnicity</th>
                <td>Hakka</td>
            </tr>
            <tr>
                <th rowspan="2" class="round_blborder">Hometown</th>
                <td colspan="3">Kuching, Sarawak</td>
            </tr>
            <tr>
                <td colspan="3">
                    <ul>
                        <li>
                            <figure>
                                <img src="images/darulhanabridge.jpg" alt="Darul Hana Bridge"/>
                                <figcaption>Darul Hana Bridge connecting northen and southern parts of Kuching</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/flagpole.jpg" alt="Tallest Flagpole in Malaysia"/>
                                <figcaption>Tallest flagpole in Malaysia with Sarawak flag</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/kuchingdun.jpg" alt="DUN Kuching"/>
                                <figcaption>Dewan Undangan Negeri (DUN) located in south Kuching</figcaption>
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
        <table class="pf_table_aryn">
            <tr>
                <th class="round_tlborder">Hometown Dish</th>
                <td>
                    <ul>
                        <li>
                            <figure>
                                <img src="images/kacangma.jpg" alt="Kacang Ma"/>
                                <figcaption>Kacang Ma</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/kuehchap.jpg" alt="Kueh Chap"/>
                                <figcaption>Kueh Chap</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/umai.jpg" alt="Umai"/>
                                <figcaption>Umai</figcaption>
                            </figure>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Books</th>
                <td>
                    <ul>
                        <li><img src="images/arynbook1.jpg" alt="Almond" title="Almond"/></li>
                        <li><img src="images/arynbook2.jpg" alt="The Song of Achilles" title="The Song of Achilles"/></li>
                        <li><img src="images/arynbook3.jpg" alt="Vicious" title="Vicious"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Musics</th>
                <td class="music"><embed src="https://open.spotify.com/embed/playlist/4sKj5aRNpBklYqUSkwFagn?utm_source=generator&theme=0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"/></td>
            </tr>
            <tr>
                <th>Movies/Dramas</th>
                <td>
                    <ul>
                        <li><img src="images/arynmovie1.jpg" alt="A Silent Voice" title="A Silent Voice"/></li>
                        <li><img src="images/arynmovie2.jpg" alt="Ride Your Wave" title="Ride Your Wave"/></li>
                        <li><img src="images/arynmovie3.jpg" alt="Shameless" title="Shameless"/></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Games</th>
                <td>
                    <ul>
                        <li><img src="images/aryngame1.jpg" alt="Stardew Valley" title="Stardew Valley"/></li>
                        <li><img src="images/aryngame2.jpg" alt="Genshin Impact" title="Genshin Impact"/></li>
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
                                <img src="images/judebellingham.jpg" alt="Jude Bellingham"/>
                                <figcaption>Jude Bellingham</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/callumturner.jpg" alt="Callum Turner"/>
                                <figcaption>Callum Turner</figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="images/arata.jpg" alt="Mackenyu Arata"/>
                                <figcaption>Mackenyu Arata</figcaption>
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
        <table class="pf_table_aryn">
            <tr>
                <th class="round_tlborder round_blborder">Achievements</th>
                <td>
                    <ul>
                        <li>Read 20 young adult books in 2024</li>
                        <li>Got my driving licence</li>
                        <li>Went to my dream country Japan</li>
                        <li>UPSR 7A</li>
                        <li>Foundation studies CGPA 4.0</li>
                        <li>Made new friends</li>
                        <li>Worked 3 different part-time jobs</li>
                    </ul>
                </td>
            </tr>
        </table>               
    </div>

    <div class="pf_email">
        <a href="mailto:102789770@students.swinburne.edu.my"><i class="fa-solid fa-envelope"></i> EMAIL ME</a>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>