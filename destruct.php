<?php
    class Avto {
        private $name;
        private $id;
        function __construct($name){
            $this->name = $name;
        }

        function getId($id){
            $this->id = $id;
        }

        function __destruct(){

                print "Destructor is working";
            
        }
    }
    $avto = new Avto("Name");
    print $avto->getId(4);
    unset($avto);
