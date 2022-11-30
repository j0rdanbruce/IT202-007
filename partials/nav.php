<?php
session_start();
//session_start(); must be the very first line after the <?php otherwise $_SESSION does not persist 
//Note: this is to resolve cookie issues with port numbers
//TODO 1
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = false; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "/Project",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}

//include functions here so we can have it on every page that uses the nav bar
//that way we don't need to include so many other files on each page
//nav will pull in functions and functions will pull in db

require(__DIR__ . "/../lib/functions.php");
?>

<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: teal;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    li a:hover {
        background-color: red;
    }
</style>

<nav>
    <ul>
        <?php        
            if (is_logged_in()) : 
        ?> 
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
        <?php 
                endif; 
        ?>
        <?php 
            if (!is_logged_in()) : 
        ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php 
            endif; 
        ?>
        <?php 
            if (is_logged_in()) : 
        ?>
            <li><a href="logout.php">Logout</a></li>
        <?php 
            endif; 
        ?>
    </ul> 
</nav>