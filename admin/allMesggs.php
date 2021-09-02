<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";



$msgs=new message();
$allmsgs= $msgs->get_all_messgs();

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/all-messages.html";
include "../templates/admin/footer.html";