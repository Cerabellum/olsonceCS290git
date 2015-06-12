<!DOCTYPE html>
<html>

<body>
<?php
    session_start();
    
    if (empty($_SESSION)) {
        die;
    }
    
    elseif(empty($_POST['username'])) {
        echo "A username must be entered. Click below to return to the login screen.";
        <a href="login.php">Login</a>
    }
    else {
        echo "This is the first page of content";
        <a href="content2.php">Content 2</a>
    }

?>

</body>
</html>