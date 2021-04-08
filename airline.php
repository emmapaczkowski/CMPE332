<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>airline</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
    <h1>Welcome to my airline!</h1>
    <h3> All flights with scheduled arrival times that are the same as actual arrival time</h3>
    <?php
    include 'getflights.php';
    ?>
</body>
</html>