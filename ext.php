<?php
    class ExtFiles extends Exception {
            private $errorName;
            public function __construct($error)
            {
                $this->errorName = $error;
            }
            function  result (){
                return "Error:\n".$this->errorName."\nLine:\n";
            }
        }

        class ExtDB extends Exception {
            private $errorName;

            function __construct($error)
            {
                $this->errorName = $error;
            }
            function result (){
                return "Error:\n".$this->errorName."\nLine:\n";
            }
    }

    class A {
        public function getConnect($file,$bd){
            try{
                if(!file_exists($file))
                    throw new ExtFiles("Not Found!");
                else
                    print file_get_contents($file);

                //Data base
                if(!mysql_connect('localhost','root','root'))
                    throw new ExtDB(('Connect Data Base ERROR'));

                elseif(!mysql_select_db($db))
                    throw new ExtDB('Data Base connect error!');
            }catch (ExtFiles $e){
                return $e->result().$e->getLine();
            }catch (ExtDB $e) {
                return $e->result().$e->getLine();
            }
        }
    }
    $a = new A();
    print $a->getConnect('test.txt','mybase');
