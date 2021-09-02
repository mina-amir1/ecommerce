<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

if(!isset($_SESSION['user_data'])){exit("NOT Logged in");}


include "../templates/admin/header.html";
include "../templates/admin/menu.html";
include "../templates/admin/index.html";

include "../templates/admin/footer.html";