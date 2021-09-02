<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

if(!isset($_SESSION['user_data'])){exit("NOT Logged in");}

$products= new product();
$allProducts=$products->get_all_products();

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/all-products.html";
include "../templates/admin/footer.html";