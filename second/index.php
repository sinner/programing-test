<?php

require_once 'Entities/User.php';

use Entities\User;

$myUser = new User(1, '123456789A', 'José Gabriel', 'González');

$objectCountFirst = count((array)$myUser);
$objectCountSecond = count(get_object_vars($myUser));

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="public/css/app-style.css">
        <title>Second Test</title>
    </head>
    <body>
        <div>
            <h3>Javascript</h3>
        </div>
        <div id="first"></div>
        <div id="second"></div>
        <div>
            <h3>PHP</h3>
        </div>
        <div id="third"><?php echo $objectCountFirst; ?></div>
        <div id="fourth"><?php echo $objectCountSecond; ?></div>

        <script src="public/javascript/app.js"></script>
    </body>
</html>