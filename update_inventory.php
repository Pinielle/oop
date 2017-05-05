<?php

require_once("session.php");

require_once("class.user.php");
require_once ("class.inventory.php");
require_once ("class.catigories.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$inventory = new Inventory();
$categories = new Categories();

$valueinventory = $inventory->selectInventory($_REQUEST['id']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="style.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css"  />
    <title>BabenkoCommerce</title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="clearfix"></div>


<div class="container-fluid" style="margin-top:80px;">

    <div class="container">
        <h1>
            <a href="home.php"><span class="glyphicon"></span> Home</a> &nbsp;
            <a href="add_inventory.php"><span class="glyphicon"></span>Add Inventory</a>
            <a href="all_inventory.php"><span class="glyphicon"></span>All Inventory</a>

        </h1>
        <hr />

        <p class="h4">
        <table class="home_border">
            <form action="edit_inventory.php" method="post">
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" size="0">
                            <?php

                            $result = $categories->getAllCategories();


                            if (count($result) > 0) {
                                foreach ($result as $myrow){
                                    printf("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
                                }

                            }
                            else {
                                echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
                                exit();
                            }

                            ?>

                        </select></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input name="model" id="model" type="text" value="<?= $valueinventory['model']?>"/></td>
                </tr>
                <tr>
                    <td>Article</td>
                    <td><input name="article" id="article" type="text" value="<?= $valueinventory['article']?>"/></td>
                </tr>
                <tr>
                    <td>Serial<br>number</td>
                    <td><input name="s_number" id="s_number" type="text" value="<?= $valueinventory['s_number']?>"/></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input name="price" id="price" type="text" value="<?= $valueinventory['price']?>"/></td>
                </tr>
                <tr>
                    <td>Owner</td>
                    <td><input name="owner" id="owner" type="text" value="<?= $valueinventory['owner']?>"/></td>
                </tr>
                <tr>
                    <td>Condition</td>
                    <td><input name="condition" id="condition" type="text"
                               value="<?= $valueinventory['condition']?>"/></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input name="date" id="date" type="date"
                               value="<?= date('Y-m-d', strtotime($valueinventory['date']))?>"/></td>
                </tr>
                <tr>
                    <td>Warranty<br>Period</td>
                    <td><input name="w_period" id="w_period" type="date"
                               value="<?= date('Y-m-d', strtotime($valueinventory['w_period']))?>"/></td>
                </tr>
                <tr>
                    <td>Warranty<br>end</td>
                    <td><input name="w_end" id="w_end" type="date"
                               value="<?= date('Y-m-d', strtotime($valueinventory['w_end']))?>"/></td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td><input name="comments" id="comments" type="text" value="<?= $valueinventory['comments']?>"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="submit" type="submit" value="Update">
                    </td>
                    <input name="id" type="hidden" value="<?= $valueinventory['id'] ?>">
                </tr>
            </form>
        </table>

        </p>

        <p class="blockquote-reverse" style="margin-top:200px;">
            <a href="https://babenkocommerce.com/">BabenkoCommerce</a>
        </p>

    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>