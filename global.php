<?php
    function SaveUsers($users_list){
        $file = fopen("users.txt", "a+");
        file_put_contents("users.txt", serialize($users_list));
    }
    function UsersList(){
        if(file_exists("users.txt")){
            if(filesize("users.txt") === 0 || !is_array(unserialize(file_get_contents("users.txt")))){
                return array();
            }
            //$_COOKIE["Users"] = unserialize(file_get_contents("users.txt"));
            return unserialize(file_get_contents("users.txt"));
        }
        else{
            $file = fopen("users.txt", "c+");
            return array();
        }
    }
    function ThrowError(string $error, string $error_descryption){
        $_SESSION["Error"] = $error;
        $_SESSION["ErrorDescryption"] = $error_descryption;
        header("Location: error.php");
        exit();
    }
    function SetCurrentUser(User $user){
        if(isset($user)){
            $_SESSION["User"] = serialize($user);
        }
        else{
            throw new Exception("User is undefined!");
        }
    }
    function GetCurrentUser() : User{
        if(isset($_SESSION["User"])){
            return unserialize($_SESSION["User"]);
        }
        else{
            throw new Exception("Current user is not set!");
        }
    }
    function UserByName(string $username) : User{
        $users = UsersList();
        foreach($users as $user){
            if($user->username == $username) return $user;
        }
        throw new Exception("User with username $username was not found");
    }
    function UserByNameFromList(string $username, $users_list) : User{
        if(!is_array($users_list)){
            throw new Exception("Variable $" . "users_list was not a list. $users_list.");
        }
        foreach($users_list as $user){
            if($user->username == $username) return $user;
        }
        throw new Exception("User with username $username was not found");
    }
    class User{
        public string $username;
        public $encrypted_password;
        public DateTime $birthday;
        public string $bio;

        public function __construct(string $username, string $encrypted_password, DateTime $birthday, string $bio="Recently registrated user") {
            $this->username = $username;
            $this->encrypted_password = $encrypted_password;
            $this->birthday = $birthday;
            $this->bio = $bio;
        }

        public function GetBlock() : string{
            if($this->birthday instanceof DateTime && is_string($this->username) && is_string($this->bio)){
                return <<< LABEL
                <h1>$this->username</h1>
                <h2>{$this->birthday->diff(new DateTime())->format("%Y years old")}</h2>
                <h3>Bio:</h3><br>
                <p>$this->bio</p>
                LABEL;
            }
            else{
                throw new Exception("In class user are invalid data");
            }
        }
        public function ChangeBIO(string $new_bio) {
            $this->bio = $new_bio;
        }
    }
    class Message{
        public string $text;
        public string $username;
        public DateTime $send_time;
        public function __construct(string $text, string $username, DateTime $time) {
            $this->text = $text;
            $this->username = $username;
            $this->send_time = $time;
        }
    }
?>