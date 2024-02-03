<?php
session_start();
require_once("global.php");
if(isset($_SESSION["User"])){
    $current_user = unserialize($_SESSION["User"]);
}
else{
    $_SESSION["Error"] = "User is undefined";
    $_SESSION["ErrorDescryption"] = "User is undefined. Some problem with session occured. Try to log in again.";
    header("Location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo $current_user->username; ?></title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php echo $current_user->GetBlock(); ?>
        <button id="btn_change_desc" class="btn btn-primary">Change description</button>
        <div id="block_change_descr"></div>
    </div>
    <!-- JS -->
    <script src="profile_script.js" type="text/javascript"></script>
</body>
</html>