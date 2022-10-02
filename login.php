<?php
include_once('header.php');
?>
<form class = "box" action="../login/add/login.add.php" method="post">
    <h1>Login</h1>
    <input type="text" name="uid"  placeholder="username">
    <input type="password" name="pwd"  placeholder="password">
    <button type="submit" name="log">Log in</button>
</form>

<?php
if(isset($_GET["error"])){
if ($_GET['error'] == "nonesss"){
    echo "Bine ati venit";
}
else if ($_GET['error'] == "logeroare"){
    echo "Username or password incorect";
}
else if ($_GET['error'] == "emptylogin"){
    echo "Please fill all the boxes";
}
}
?>








<?php
include_once('footer.php');
?>