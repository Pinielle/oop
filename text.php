her

<?php
    class SuperUser {
        protected $prava;
        protected $username;

        public function __construct($prava,$name){
            $this->prava = $prava;
            $this->username = $name;
        }

        public function getUser(){
            return $this->prava."\n".$this->username;

        }
    }

    class Admin extends SuperUser {

        public function __construct($prava, $name){
            parent::__construct($prava, $name, $go = 1);
        }

        public function getUser() {
            return parent::getUser();
        }
    }

    class Moderator extends SuperUser {
        public function __construct($prava, $name, $go = 0){
            parent::__construct($prava, $name);
        }

        public function getUser() {
           return parent::getUser();
        }
    }

    class User extends SuperUser {
        public function __construct($prava, $name, $go = 0){
            parent::__construct($prava, $name);
        }

        public function getUser() {
            return parent::getUser();
        }

    }

    $superUser = new SuperUser(10000,"SuperUsser");
    $admin = new Admin(5000,"Administrator");
    $moder = new Moderator(1000,"Moderator");
    $user = new User(100,"User");
    print $superUser->getUser();
    print "<br/>";
    print $admin->getUser();
    print "<br/>";
    print $moder->getUser();
    print "<br/>";
    print $user->getUser();
