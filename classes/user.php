<?php
    class User{
        public $id;
        public $login;
        public $email;
        public $name;
        public $password;
        public $avatar;

        public function __construct($login, $email, $name, $password, $avatar=null,$id=null) {
            
            $this->login = $login;
            $this->email = $email;
            $this->name = $name;
            $this->password = $password;

            if ($id !== null) {
                $this->id = $id;
            }
        
            if ($avatar !== null) {
                $this->avatar = $avatar;
            }
        }
        
        
        
        
        
        public function setLogin($login) {
            $this->login = $login;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setAvatar($avatar) {
            $this->avatar = $avatar;
        }
}