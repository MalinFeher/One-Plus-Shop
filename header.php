<?php
session_start();
?>
<!DOCTYPE html> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <meta charset="utf-8">
    <title>Next step</title>
</head>
<body>
<nav>
    <label class="logo">
        One Plus
    </label>
    <ul>
        <li><a href="index.php"> Homepage</a></li>
    <?php
        if(isset($_SESSION["usersid"])){
            echo "<li><a href='cart.php'>Cos</a></li>";
            echo "<li><a href='/login/logout.php'>Logout</a></li>";
        }
        else {
            echo "<li><a href='login.php'>Log in</a></li>";
            echo "<li><a href='signup.php'>Sign up</a></li>";
    }
    ?>
</nav>

