<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 05.05.17
 * Time: 15:58
 */
    require_once 'class.inventory.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($id)){

        $delete = new Inventory();
        $delete->deleteInventory($id);
        header( 'Location: /all_inventory.php', true, 303 );
    }