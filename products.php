<?php
session_start();
require "includes/config.php";
include "includes/user_class.php";
include "includes/products_class.php";
include "includes/message_class.php";

$allproducts=new product();
$products=$allproducts->get_all_products();


include "templates/products.html";