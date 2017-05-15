<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.05.17
 * Time: 15:32
 */
class Router
{
     public function getUrl($filename)
     {
        $tmp = explode('.', $filename);
        return $tmp['0'];
     }
}