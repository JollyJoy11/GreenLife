<?php
    ini_set('session.cookie_lifetime', 0); //Logout when the browser is closed
    ini_set('session.gc_maxlifetime', 3600); //Logout when the user is inactive for an hour

    session_start();
?>