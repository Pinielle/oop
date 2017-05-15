<?php require_once 'blocks/header.php';

$options = array();
if (isset($_POST['search'])) {
    $options['where'] = $_POST['search'];
}
if (isset($_GET['cat_id'])) {
    $options['cat_id'] = $_GET['cat_id'];
}
$arr = $inventory->selectInventories($options);

?>
    <table>
        <td valign="top"><?php require_once 'blocks/left_sb.php' ?></td>
        <td>
            <?php require_once 'view_inventory.php'?>
        </td>
    </table>
    </p>

<?php
require_once 'paginator.php';
require_once 'blocks/footer.php'; ?>