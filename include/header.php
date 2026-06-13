<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Logout
    if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        $_SESSION = array();
        session_destroy();
        header('location: index.php'); 
        exit();
    }
    echo
"<header>
    <nav>
        <div class='menu'>
            <a href='index.php'><img class='logo' src='images/logo.png' alt='Green Life'/></a>
            <ul class='menuleft'>
                <li class='menubar home'><a href='index.php'><i class='fa-solid fa-house'></i></a></li>
                <li class='menubar'><a href='classify.php'>Classification</a></li>
                <li class='menubar'>
                    <span class='dropdown-btn'>Herbarium <i class='fa-solid fa-plus'></i></span>
                    <ul class='dropdown-content'>
                        <li><a href='tutorial.php'>Tutorial</a></li>
                        <li><a href='tools.php'>Tools</a></li>
                        <li><a href='care.php'>Care</a></li>
                    </ul>
                </li>
                <li class='menubar'><a href='identify.php'>Identify</a></li>
                <li class='menubar'><a href='contribute.php'>Contribute</a></li>
            </ul>
            <ul class='menuright'>
                <li class='search-container'>
                    <form name='Searchbar' method='get' action='search.php'>
                        <input type='search' placeholder='Search' name='search'/>
                        <button type='submit'><i class='fa fa-search'></i></button>
                    </form>
                </li>";
        // change display after login
        if (!isset($_SESSION['success'])){
            echo "<li><a href='registration.php' class='register'>Register</a></li>";
        } else {
            echo "<li id='username_display'>{$_SESSION['username']}</li>";
        }
    echo        "<li>
                    <input type='checkbox' id='login_btn'/>
                    <label for='login_btn'><i class='fa-regular fa-user'></i></label>
                    <ul>";
        if (!isset($_SESSION['success'])){
            echo "      <li>Hi, Guest!</li>
                        <li><a href='login.php'><i class='fa-solid fa-arrow-right-to-bracket'></i>&emsp;Log in</a></li>";
        } else {
            echo "      <li>Hi, {$_SESSION['username']}!</li>
                        <li><a href='?action=logout'><i class='fa-solid fa-arrow-right-from-bracket'></i>&emsp;Log out</a></li>
                    ";
        }
    echo "          </ul>
                </li>
            </ul>
        </div>
    </nav>
    <nav class='hamburger-menu'>
        <input type='checkbox' id='open-check'/>
        <label for='open-check' class='hamburger-icons'>
			<i class='fa fa-bars'></i>
			<i class='fa-solid fa-xmark'></i>
		</label>
        <ul class='hamburger'>
            <li><a href='index.php'>Home</a></li>
            <li><a href='classify.php'>Classification</a></li>
            <li>
				<input type='checkbox' id='open-dropdown'/>
                <label for='open-dropdown'>Herbarium <i class='fa-solid fa-plus'></i></label>
                <ul class='dropdown-burger'>
                    <li><a href='tutorial.php'>Tutorial</a></li>
                    <li><a href='tools.php'>Tools</a></li>
                    <li><a href='care.php'>Care</a></li>
                </ul>
            </li>
            <li><a href='identify.php'>Identify</a></li>
            <li><a href='contribute.php'>Contribute</a></li>
        </ul>
    </nav>
</header>";
?>