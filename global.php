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
            $_COOKIE["Users"] = unserialize(file_get_contents("users.txt"));
            return unserialize(file_get_contents("users.txt"));
        }
        else{
            $file = fopen("users.txt", "a+");
            return array();
        }
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
    }
?>