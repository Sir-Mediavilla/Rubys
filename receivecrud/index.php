<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.products.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
$product_id = (isset($_GET['product_id']) && $_GET['product_id'] != '') ? $_GET['product_id'] : '';

$user = new User();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>

<!DOCTYPE html>
<html>
<head>
<div id="padding">
    <div id="navbar">
        <a href="index.php">Home</a>
        <a href="index.php?page=usersproducts">Users and Products</a>
        <a href="index.php?page=receive">Orders</a>  
        <a href="index.php?page=release">Sales</a> 
        <a href="index.php?page=inventory">Products Inventory</a>
        <a href="index.php?page=orders">Orders</a> 
        <a href="index.php?page=ordersitems">Orders Items</a>
    </div>

    <title>Ruby's' Bread and Pastries House</title>
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

</head>
<body>

    <div id="wrap">
        <div id="logo2"></div>
        <div id="name">
            <p>Logged in as:</p>
            <?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>
        </div>

        <form action="logout.php">
            <div id="button-center">
            <input type="submit" value="Logout">
            </div>
        </form>
       
    </div>


    <div id="wrapper">
        <div id="content">
            <?php
            switch($page){
                
                        case 'usersproducts':
                            require_once 'users-products-module/index.php';
                        break; 
                        case 'products':
                            require_once 'products-module/index.php';
                        break; 
                        case 'inventory':
                            require_once 'inventory-module/index.php';
                        break;
                        case 'receive':
                            require_once 'receive-module/index.php';
                        break; 
                        case 'release':
                            require_once 'release-module/index.php';
                        break;
                        default:
                            require_once 'main.php';
                        break; 
                    }
            ?>
        </div>
    </div>
</div>
</body>
</html>