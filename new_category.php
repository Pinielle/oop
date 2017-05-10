<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 10.05.17
 * Time: 9:13
 */
    require_once 'class.catigories.php';
    if (isset($_POST['title']))       {$title = $_POST['title'];   if ($title == '') {unset($title);}}
    if (isset($title)){

        $category = new Categories();
        $data = array('title'=>$title);

        $result = $category->addCategory($data);
        header( 'Location: /all_category.php', true, 303 );
    }