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
                        $_SESSION["User"] = serialize($user);
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
            throw new Exception("Error with getting data");
        }
    }
?>