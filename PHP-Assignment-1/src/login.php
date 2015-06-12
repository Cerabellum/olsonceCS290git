<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
</head>
<body>

<?php
    
session_destroy(); // Logout each time the Login Page is loaded
    
session_start();
$_SESSION['login_user']= $username;
    
<h2>Login Form</h2>
    
    <form action="content1.php" method="post">

        <label>Username :</label>
        <input id="name" name="username" placeholder="username" type="text">

    <input name="submit" type="submit" value=" Login ">

?>
    </form>

</body>
</html>