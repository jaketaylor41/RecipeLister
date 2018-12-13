<?php
// This module should logout the user.  Unset any $_SESSION variables, destroy the session.


session_start();

$_SESSION = array();


session_destroy();

echo "You have been logged out <br>";
echo "<a href=\"login.html\">Login</a>";





?>