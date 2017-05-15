<?php
    require_once 'blocks/header.php';
    $arr = $inventory->selectInventories(array('limit'=>'5'));
?>
<table>
    <td valign="top">
        <?php require_once 'blocks/left_sb.php'?>
    </td>
    <td>
        <?php require_once 'view_inventory.php'?>
    </td>
</table>
<?php require_once 'blocks/footer.php';?>