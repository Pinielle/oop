<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 10.05.17
 * Time: 8:55
 */
    require_once 'class.catigories.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($id)){

        $delete = new Categories();
        $delete->deleteCategory($id);
        header( 'Location: /all_category.php', true, 303 );
    }