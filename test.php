<?php
$file = str_replace('/', '', $_SERVER['PATH_INFO']) . '.php';
if (!is_file($_SERVER['DOCUMENT_ROOT'] . $file)) {
    header("HTTP/1.0 404 Not Found");
}
require_once 'class.router.php';
$router = new Router();
require_once 'blocks/header.php';
?>
    <table>
        <td valign="top"><?php require_once 'blocks/left_sb.php' ?></td>
        <td>
            <?php
            if (is_file($_SERVER['DOCUMENT_ROOT'] . $file)) {
                require_once $file;
            } else {
                echo '404';
            }
            ?>
        </td>
    </table>
<?php require_once 'blocks/footer.php';
