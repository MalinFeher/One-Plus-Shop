<?php
include_once('../add/db.add.php');
include_once('../add/functions.add.php');

if(isset($_POST["submit"])){
    //grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $name = $_POST['name'];
    $email = $_POST['email'];
}

if (emptySignup($uid, $pwd, $name, $email) == false){
    header("location: ../signup.php?error=emptySignup");
    exit();
}

if (invaliduid($uid, $pwd) == false){
    header("location: ../signup.php?error=invaliduid");
     exit();
}


uidExists($conn, $uid);

if (uidExists($conn, $uid) == false) {
    createUser($conn, $uid, $pwd);
}



