<?php

if (isset($_POST["log"])){

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
}

require_once('../add/db.add.php');
require_once('../add/functions.add.php');

if (emptylogin($uid, $pwd) == false){ 
    header("location: ../login.php?error=emptylogin");
    exit();
}

login($conn, $uid, $pwd);



