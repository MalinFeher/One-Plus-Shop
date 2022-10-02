<?php

function emptySignup($uid, $pwd, $name, $email){
    $result="";
    if(empty($uid) || empty($pwd) || empty($name) || empty($email)){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
    }
    
    function invaliduid($uid){
    $result = "";
    
    if (!preg_match("/^[a-zA-Z0-9]{3,15}$/", $uid)){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
    
    }


    function emptylogin($uid, $pwd){
        $result="";
        if(empty($uid) || empty($pwd)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
        }



function uidExists($conn, $uid){
    $sql = "SELECT * FROM usersi where (usersiUID) = (?);";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql));
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($rezultatul = mysqli_fetch_assoc($resultData)){
        header("location: ../signup.php?error=uidexist");
        return $rezultatul; 
          
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $uid, $pwd){
    $sql = "INSERT INTO usersi(usersiUID, usersiPWD) VALUES (?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
    mysqli_stmt_bind_param($stmt, "ss", $uid, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
    }
    
}

function login($conn, $uid, $pwd){

    $uidexist = uidExists($conn, $uid, $pwd);
    $pwdh = $uidexist["usersiPWD"]; var_dump($pwdh);
    $uidh = $uidexist["usersiUID"]; var_dump($uidh);
    
    if (( $uid == $uidh) && ($pwd == $pwdh)){
        session_start();
        $_SESSION["usersid"] = $uidh; 
        header("location: ../index.php?error=logeroare");
        exit();
    } 

    else {
        header("location: ../login.php?error=logeroare");
        $result = false;
        return $result;
    }
}



