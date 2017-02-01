<?php
     class Info {
         private $message;

         public function message ($message){
             $this->message = $message;
             $record = preg_match("/[hello world]/",$this->message);
             try {
                 if (!$record)
                     throw new Exception("Your text have not line\nhello world\n!!!");
                 else
                     return "Your put \nhello world\n";
             } catch (Exception $e) {
                 return $e->getMessage();
             }
         }
     }
     $info = new Info();
     $imessage = $_GET['message']?$_GET['message']:false;
     print $info->message($imessage);