<?php require_once 'blocks/header.php';

$options = array();

if (isset($_POST['search'])) {
    $options['where'] = $_POST['search'];
}
if (isset($_GET['cat_id'])) {
    $options['cat_id'] = $_GET['cat_id'];
}

require_once 'class.paginator.php';
$paginate = new paginate($inventory,$options);

        $newquery = $paginate->paging();
        $arr = $paginate->dataview($newquery);




//$arr = $inventory->selectInventories($options);
?>
    <table>
        <td valign="top"><?php require_once 'blocks/left_sb.php'; ?></td>
        <td>
            <?php require_once 'view_inventory.php' ?>
    <table class="paginator-table" align="center" border="1" width="100%" height="100%" id="data">
        <?php
            $paginate->paginglink();
        ?>
    </td>
    </table>
    </table>
<?php
require_once 'blocks/footer.php'; ?>