<?php
require_once("class.user.php");
/*if (!isset($_SESSION['uname'])){
    require_once 'login.php';
}*/

$login = new USER();


$pas = 'login';


$file = str_replace('/', '', $pas . '.php');
if (!is_file($_SERVER['DOCUMENT_ROOT'] . $file)) {
    header("HTTP/1.0 404 Not Found");
}

require_once 'class.router.php';
$router = new Router();

?>

    <table>
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
