<?php
session_start();
require_once("class.user.php");
$login = new USER();
$userRow = array();
if (isset($_POST['btn-login'])){

    $uname = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];
    $login->doLogin($uname,$uname,$upass);

}

if(isset($_GET['logout']) && $_GET['logout']=="true"){
    $login->doLogout();
    $login->redirect('home');
}
if (!isset($_SESSION['user_session'])){
    require_once 'login.php';die;
}else{
    $user_id = $_SESSION['user_session'];

    $stmt = $login->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));

    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}

$pas = 'home';

if (isset($_SERVER['REDIRECT_URL'])){
    $pas=str_replace('/', '' ,$_SERVER['REDIRECT_URL']);
}
$file = str_replace('/', '', $pas . '.php');
if (!is_file($_SERVER['DOCUMENT_ROOT'] . $file)) {
    header("HTTP/1.0 404 Not Found");
}


require_once 'class.router.php';
$router = new Router();
require_once 'blocks/header.php';
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
