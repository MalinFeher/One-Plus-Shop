<?php
include_once('header.php');
?>

<form class="box" action="../login/add/signup.add.php" method="post">
    <h1>Sign up</h1>
    <input type="text" name="name"  placeholder="name">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="uid"  placeholder="username">
    <input type="password" name="pwd"  placeholder="password">
    <button type="submit" name="submit">Sign up</button>
</form>
<?php
if(isset($_GET["error"])){
    if ($_GET['error'] == "uidexist"){
    echo "Usename taken";
}
    else if ($_GET['error'] == "none"){
    echo "Usename inregistrat cu succes";
}
else if ($_GET['error'] == "emptySignup"){
    echo "Please fill all the boxes";
}
else if($_GET['error'] == "invaliduid"){
    echo "Username format is wrong";
}
}
?>
<?php
include_once('footer.php');
?>