<?php
    session_start();
    require_once("global.php");
    $users = array();
    if(isset($_POST["Login"])){
        if (isset($_POST["username"], $_POST["password"])) {
            $users = UsersList();
            foreach ($users as $user) {
                if($user->username == $_POST["username"]){
                    if(password_verify($_POST["password"], $user->encrypted_password)){
                        SetCurrentUser($user);
                        echo "<p>You logged in account " . $_POST["username"] . "</p>";
                        echo "<script>alert('You logged in account " . $_POST["username"] . "');</script>";
                        header("Location: profile.php");
                        exit();
                    }
                    else{
                        echo "<p>Password is incorrect!</p>";
                        exit();
                    }
                }
            }
            echo "<p>User " . $_POST["username"] . " does not exist</p>";
        }
        else{
            throw new Exception("Error with getting data");
        }
    }
    if(isset($_POST["Registration"])){
        if (isset($_POST["username"], $_POST["password1"], $_POST["password2"], $_POST["birthday"])) {
            $users = UsersList();
            foreach ($users as $user) {
                if($user->username == $_POST["username"]){
                    echo "<p>User with username " . $_POST["username"] . " already exists!</p>";
                    exit();
                }
            }
            if($_POST["password1"] != $_POST["password2"]){
                echo "<p>Passwords do not match!</p>";
                exit();
            }
            echo $_POST["birthday"];
            $new_user = new User($_POST["username"], password_hash($_POST["password1"], PASSWORD_BCRYPT), new DateTime($_POST["birthday"] . " 00:00:00"), $_POST["bio"]);
            array_push($users, $new_user);
            SaveUsers($users);
        }
        else{
            throw new Exception("Error while getting data occured");
        }
    }
    if(isset($_POST["ChangeBIO"])){
        if (isset($_POST["new_bio"], $_SESSION["User"])) {
            $users = UsersList();
            $username = unserialize($_SESSION["User"])->username;
            foreach($users as $user){
                if($user->username == $username){
                    $index = array_search($user, $users);
                    $user->bio = $_POST["new_bio"];
                    $users[$index] = $user;
                    SaveUsers($users);
                    header("Location: profile.php");
                    exit();
                }
            }
            ThrowError("User not found", "User, whose bio you want to update, wasn`t fount in our list. Username: " . $username);
        }
        else{
            throw new Exception("Error while getting data occured");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server page</title>
</head>
<body>
    <h1>Server page</h1>
    <p><b>This is server page. You have to be redirected from it in a couple of seconds. If you are still here after long time, it is supposed to me a mistake. Get to your <a href="profile.php">profile</a> or <a href="login.php">log into other account</a></b></p>
</body>
</html>