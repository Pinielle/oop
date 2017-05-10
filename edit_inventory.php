<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 05.05.17
 * Time: 16:41
 */
    require_once 'class.inventory.php';
    if (isset($_POST['category']))       {$data['category'] = $_POST['category'];
    if ($data['category'] == '') {unset($data['category']);}}
    if (isset($_POST['model']))          {$data['model'] = $_POST['model'];
    if ($data['model'] == '') {unset($data['model']);}}
    if (isset($_POST['article']))        {$data['article'] = $_POST['article'];
    if ($data['article'] == '') {unset($data['article']);}}
    if (isset($_POST['s_number']))       {$data['s_number'] = $_POST['s_number'];
    if ($data['s_number'] == '') {unset($data['s_number']);}}
    if (isset($_POST['price']))          {$data['price'] = $_POST['price'];
    if ($data['price'] == '') {unset($data['price']);}}
    if (isset($_POST['owner']))          {$data['owner'] = $_POST['owner'];
    if ($data['owner'] == '') {unset($data['owner']);}}
    if (isset($_POST['condition']))      {$data['condition'] = $_POST['condition'];
    if ($data['condition'] == '') {unset($data['condition']);}}
    if (isset($_POST['date']))           {$data['date'] = $_POST['date'];
    if ($data['date'] == '') {unset($data['date']);}}
    if (isset($_POST['w_period']))       {$data['w_period'] = $_POST['w_period'];
    if ($data['w_period'] == '') {unset($data['w_period']);}}
    if (isset($_POST['w_end']))          {$data['w_end'] = $_POST['w_end'];
    if ($data['w_end'] == '') {unset($data['w_end']);}}
    if (isset($_POST['comments']))       {$data['comments'] = $_POST['comments'];
    if ($data['comments'] == '') {unset($data['comments']);}}
    if (isset($_POST['id']))             {$data['id'] = $_POST['id'];}

    if (isset($data['category']) && isset($data['model']) && isset($data['article']) && isset($data['s_number'])
        && isset($data['price']) && isset($data['owner'])
        && isset($data['condition']) && isset($data['date']) && isset($data['w_period']) && isset($data['w_end'])
        && isset($data['comments'])){


        $update = new Inventory();
        $update->updateInventory($data);
        header( 'Location: /all_inventory.php', true, 303 );

    }