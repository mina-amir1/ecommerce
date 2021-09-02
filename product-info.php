<?php
session_start();
require "includes/config.php";
include "includes/user_class.php";
include "includes/products_class.php";
include "includes/message_class.php";

$id=$_GET['id'];

$product_c=new product();
$product=$product_c->get_product($id);


include "templates/product-info.html";
