<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 11.05.17
 * Time: 9:20
 */
chdir($_SERVER['DOCUMENT_ROOT']);
require_once("session.php");
require_once("class.user.php");
require_once ("class.inventory.php");
require_once ("class.catigories.php");
require_once ("class.router.php");
$result = $categories->selectCategories();
$router = new Router();

if (count($result) > 0) {
    foreach ($result as $myrow){
        printf("<a href='" . $router->getUrl('all_inventory.php') . "?cat_id=%s'>%s</a><br>",$myrow["id"],$myrow["title"]);
    }

}
else {
    echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
    exit();
}
?>
<form name="search" method="post" action="../all_inventory.php">
    <input type="text" name="search" placeholder="Search" width="10px"><br>
    <button type="submit">Найти</button>
</form>

