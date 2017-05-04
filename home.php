<?php

	require_once("session.php");
	
	require_once("class.user.php");
	require_once ("class.inventory.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

	$inventory = new Inventory();



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
        <a href="add_inventory.php"><span class="glyphicon"></span>Add Inventory</a></h1>
       	<hr />
        
        <p class="h4">
        <table class="home_border">
            <tr>
                <td>id</td>
                <td>Category</td>
                <td>Model</td>
                <td>Article</td>
                <td>Serial<br>number</td>
                <td>Price</td>
                <td>Owner</td>
                <td>Condition</td>
                <td>Date</td>
                <td>Warranty<br>Period</td>
                <td>Warranty<br>end</td>
                <td>Comment</td>
            </tr>
            <?php
            $arr = $inventory->selectInventories(array('limit'=>'5'));
            foreach ($arr as $value) {
            echo "
            <tr>
                <td>" . $value['id'] . "</td>
                <td>" . $value['category'] . "</td>
                <td>" . $value['model'] . "</td>
                <td>" . $value['article'] . "</td>
                <td>" . $value['s_number'] . "</td>
                <td>" . $value['price'] . "</td>
                <td>" . $value['owner'] . "</td>
                <td>" . $value['condition'] . "</td>
                <td>" . $value['date'] . "</td>
                <td>" . $value['w_period'] . "</td>
                <td>" . $value['w_end'] . "</td>
                <td>" . $value['comments'] . "</td>
            </tr>
        ";
                }
            ?>
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