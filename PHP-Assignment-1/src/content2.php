<!DOCTYPE html>
<html>

<body>
<?php
    session_start();

    if (empty($_SESSION)) {
        die;
    }
    else {
        echo "This is a second page of content";
        <a href="content1.php">Content 1</a>
    }
?>

</body>
</html>