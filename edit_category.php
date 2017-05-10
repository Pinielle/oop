<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 10.05.17
 * Time: 8:55
 */
    require_once 'class.catigories.php';
    var_dump($_POST);
    if (isset($_POST['title']))       {$data['title'] = $_POST['title'];
    if ($data['title'] == '') {unset($data['title']);}}
    if (isset($_POST['id']))             {$data['id'] = $_POST['id'];}

    if (isset($data['title'])){
        $update = new Categories();
        $update->updateCategory($data);
        header( 'Location: /all_category.php', true, 303 );
    }