<?php 

$current_page = basename($_SERVER['PHP_SELF']);

if (isset($_GET['action']) && $_GET['action'] == 'logout'){ //logout
    $_SESSION = array();
    session_destroy();
    header('location: index.php'); 
    exit();
}

echo
"<header class='admin_header'>
    <p><img src='images/logo.png' alt='Green Life'/>&emsp;&emsp;Hello, Admin</p>
    <nav>
        <ul>
            <li class='" . ($current_page == 'view_user.php' ? 'active_nav' : '') . "'><a href='view_user.php'><i class='fa-solid fa-users'></i>&emsp;Users</a></li>
            <li class='" . ($current_page == 'view_enquiry.php' ? 'active_nav' : '') . "'><a href='view_enquiry.php'><i class='fa-regular fa-circle-question'></i>&emsp;Enquiries</a></li>
            <li class='" . ($current_page == 'view_contribute.php' ? 'active_nav' : '') . "'><a href='view_contribute.php'><i class='fa-brands fa-pagelines'></i>&emsp;Contributions</a></li>
            <li class='" . ($current_page == 'view_feedback.php' ? 'active_nav' : '') . "'><a href='view_feedback.php'><i class='fa-regular fa-comment-dots'></i>&emsp;Feedbacks</a></li>
            <li class='" . ($current_page == 'recyclebin.php' ? 'active_nav' : '') . "'><a href='recyclebin.php'><i class='fa-regular fa-trash-can'></i>&emsp;Recycle Bin</a></li>
            <li><a href='?action=logout'><i class='fa-solid fa-arrow-right-from-bracket'></i>&emsp;Log Out</a></li>
        </ul>
    </nav>
</header>";
?>