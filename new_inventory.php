<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 05.05.17
 * Time: 10:13
 */

    require_once 'class.inventory.php';
    if (isset($_POST['category']))       {$category = $_POST['category'];   if ($category == '') {unset($category);}}
    if (isset($_POST['model']))          {$model = $_POST['model'];         if ($model == '') {unset($model);}}
    if (isset($_POST['article']))        {$article = $_POST['article'];     if ($article == '') {unset($article);}}
    if (isset($_POST['s_number']))       {$s_number = $_POST['s_number'];   if ($s_number == '') {unset($s_number);}}
    if (isset($_POST['price']))          {$price = $_POST['price'];         if ($price == '') {unset($price);}}
    if (isset($_POST['owner']))          {$owner = $_POST['owner'];         if ($owner == '') {unset($owner);}}
    if (isset($_POST['condition']))      {$condition = $_POST['condition']; if ($condition == '') {unset($condition);}}
    if (isset($_POST['date']))           {$date = $_POST['date'];           if ($date == '') {unset($date);}}
    if (isset($_POST['w_period']))       {$w_period = $_POST['w_period'];   if ($w_period == '') {unset($w_period);}}
    if (isset($_POST['w_end']))          {$w_end = $_POST['w_end'];         if ($w_end == '') {unset($w_end);}}
    if (isset($_POST['comments']))       {$comments = $_POST['comments'];   if ($comments == '') {unset($comments);}}


    if (isset($category) && isset($model) && isset($article) && isset($s_number) && isset($price) && isset($owner)
        && isset($condition) && isset($date) && isset($comments))
    {

        $inventory = new Inventory();
        $data = array(
            'category' => $category,
            'model' => $model,
            'article' => $article,
            's_number' => $s_number,
            'price' => $price,
            'owner' => $owner,
            'condition' => $condition,
            'date' => $date,
            'comments' => $comments
        );
        if (isset($w_end)){
            $data['w_end'] = $w_end;
        }
        if (isset($w_period)){
            $data['w_period'] = $w_period;
        }

        $result = $inventory->addInventory($data);


        if ($result->rowCount()>0) {echo "<p>Inventory added</p>";}
        else {echo "<p>Inventory didn't add!</p>";}


    }
    else

    {
        echo "<p>Федя дичь</p>";
    }
    header( 'Location: /all_inventory.php', true, 303 );