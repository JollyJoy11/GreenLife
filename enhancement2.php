<?php
    include "include/session.php";
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<!-- Description: Enhancement Page -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date: 18/11/2024 -->
<!-- Validated: OK -->

<head>
    <title>Enhancement 2 | Green Life</title>
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
    <h1>Enhancement 2</h1>
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>User Management Module</h2>
            <ol>
                <li>Allow admin to manage user accounts by create, view, edit and delete user accounts.</li>
                <li>Admin can sort user by ID, username, first name and date of registration.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="view_user.php">View User</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/NqP0-UkIQS4?si=sELh_5t1hblKtUfk" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen />
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Upload Module</h2>
            <ol>
                <li>Save uploaded images from users to the database.</li>
                <li>Return a confirmation page for users to view their uploaded contribution details.</li>
                <li>Admin can manage the uploaded photo.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="contribute.php">Contribute</a>
                <a href="view_contribute.php">View Contribute</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/onu3w8kqASU?si=N7MBby6JWLwngcoY" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Identify Module</h2>
            <ol>
                <li>To identify the plant photos uploaded by users.</li>
                <li>A function is created to train the model to detect image similarity percentage.</li>
                <li>Tensorflow is used.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="identify.php">Identify</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/ybh9p3QOYrs?si=NQrcS7ryh5pT-ftp" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
    
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Sitewide Search</h2>
            <ol>
                <li>Allow users to search for specific things by entering the keywords.</li>
                <li>Display fetched results in categories based on different webpages.</li>
                <li>Images related to the keywords can also be found.</li>
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
                <a href="login.php">Login</a>
                <a href="registration.php">Registration</a>
                <a href="acknowledgement.php">Acknowledgement</a>
                <a href="enhancement1.php">Enhancement 1</a>
                <a href="enhancement1.php">Enhancement 2</a>
                <a href="profile.php">Member</a>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/lwgG_uIJYQM?si=K2KGuMSGRbJmNsU7" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Database Search Feature</h2>
            <ol>
                <li>Allow admin to search for the data in database by entering keywords.</li>
                <li>Displays the results retrieved from the database based on the entered keywords.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="view_user.php">View User</a>
                <a href="view_enquiry.php">View Enquiry</a>
                <a href="view_contribute.php">View Contribution</a>
                <a href="recyclebin.php">Recycle Bin</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/yp5pYIg4WHc?si=qNzyi89dv3ZDxzIm" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Data Sort & Filter</h2>
            <ol>
                <li>Admin can filter or sort data based on own preference.</li>
                <li>When the table is filtered, it will display only the filtered data, which can then be sorted using the provided sorting function.</li>
            </ol>

            <p>Pages with the enhancement:</p>
            <div>
                <a href="view_enquiry.php">View Enquiry</a>
                <a href="view_contribute.php">View Contribute</a>
                <a href="view_feedback.php">View Feedback</a>
                <a href="view_user.php">View User</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/d3F5DlrpD28?si=aXbAf7iSJXh-JRlH" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Anti-Spam Feature</h2>
            <ol>
                <li>Prevent spam submissions by users.</li>
                <li>Enquiry form is disabled for 20 minutes after 3 submissions within 20 minutes by the same user of the same name.</li>
            </ol>

            <p>Pages with the enhancement:</p>
            <div>
                <a href="enquiry.php">Enquiry</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/rYBomZIzrS4?si=fdiGeeXtj_zDA118" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Feedback</h2>
            <ol>
                <li>Allow admin to view and delete feedbacks provided by users.</li>
                <li>Feedbacks can be sorted based on star ratings, goals and submission time.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="index.php#feedback-sect">Feedback</a>
                <a href="view_feedback.php">View Feedback</a>
            </div>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Input Pattern Validation</h2>
            <ol>
                <li>Validate the input inserted by users to prevent invalid input pattern.</li>
                <li>Error messages will be displayed when invalid data format is inserted.</li>
                <li>Used preg-match() function to validate the input pattern.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
                <a href="enquiry.php">Enquiry</a>
                <a href="contribute.php">Contribute</a>
                <a href="view_user.php">View User</a>
                <a href="view_contribute.php">View Contribute</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/HLx-zbl6siM?si=dY3ciAhYktVpZZNH" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Recycle Bin</h2>
            <ol>
                <li>After admin choose to delete data, the data will be moved to recycle bin, instead of being deleted permanently.</li>
                <li>Admin can restore the data from recycle bin or permanently delete the data.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="recyclebin.php">Recycle Bin</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/afxx8wx-5-k?si=qeZtLVwlrOFKVjtW" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
        
    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Forgot Password</h2>
            <ol>
                <li>Allow users to reset their password when forgotten.</li>
                <li>When user forgot their password, they can reset their password by entering the code sent to their email.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="login.php">Login</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/R9bfts9ZFjs?si=heSWE0PdBbYLs0bf" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Admin Enquiry Reply Email</h2>
            <ol>
                <li>Admin can view details of specific enquiry.</li>
                <li>Allow admin to reply to users' enquiries via email directly using PHPMailer.</li>
                <li>After enquiry is replied, the status will be updated as solved.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="view_enquiry">View Enquiry</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p>
            <embed src="https://www.youtube.com/embed/9tD8lA9foxw?si=toGfCqcmOOvA-Ca5" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Pre-filled Name and Email</h2>
            <ol>
                <li>When users wants to send enquiries, their name and email is fetched from the database and pre-filled into the enquiry form.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="enquiry.php">Enquiry</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/lwgG_uIJYQM?si=K2KGuMSGRbJmNsU7" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Redirect to Previous Page</h2>
            <ol>
                <li>Users are redirected to the previous page that they were visiting after signing in.</li>
            </ol>

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
                <a href="enhancement1.php">Enhancement 1</a>
                <a href="enhancement2.php">Enhancement 2</a>
                <a href="profile.php">Member</a>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/-YreryOuNlg?si=nx-ginm_sbtB5vuV" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Pop-up Alert Message</h2>
            <ol>
                <li>A pop up alert message will be displayed on the top of the screen after users login successfully.</li>
                <li>For admin, a pop up alert message will be displayed after replying to enquiries via email, restoring data from the recycle bin and successfully creating new user into database.</li>
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
                <a href="enhancement1.php">Enhancement 1</a>
                <a href="enhancement2.php">Enhancement 2</a>
                <a href="profile.php">Member</a>
                <a href="aboutme1.php">About Me 1</a>
                <a href="aboutme2.php">About Me 2</a>
                <a href="aboutme3.php">About Me 3</a>
                <a href="aboutme4.php">About Me 4</a>
                <a href="view_user.php">View User</a>
                <a href="view_contribute.php">View Contribute</a>
                <a href="view_enquiry.php">View Enquiry</a>
                <a href="view_feedback.php">View Feedback</a>
                <a href="recyclebin.php">Recycle Bin</a>
            </div>
        </div>
        
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/hm79I2JpwJw?si=4u3WFBo2hKW_3KtA" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>

    <div class="enhancement_container">
        <div class="left_enhancement">
            <h2>Message Box</h2>
            <ol>
                <li>A message box is displayed when the user navigate to the contribution page without signing in beforehand.</li>
                <li>Message box is also displayed to ask for confirmation from admin upon deleting records permanently.</li>
            </ol>

            <p>Page(s) with the enhancement:</p>
            <div>
                <a href="contribute.php">Contribution</a>
                <a href="recyclebin.php">Recycle Bin</a>
            </div>
        </div>
        <div class="reference">
            <p>Reference:</p> 
            <embed src="https://www.youtube.com/embed/XrvGam6tYug?si=Gk7fr6znIg9BtXx3" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen/>
        </div>
    </div>
    <br/>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>