<?php
session_start();
require "includes/config.php";
include "includes/user_class.php";
include "includes/products_class.php";
include "includes/message_class.php";

$home_products=new product();
$latest_products=$home_products->get_all_products("ORDER BY `id` DESC LIMIT 3");


include "templates/index.html";