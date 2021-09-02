<?php
session_start();
require "includes/config.php";
include "includes/user_class.php";
include "includes/products_class.php";
include "includes/message_class.php";
$msg_success=0;
$msg_error='';
$all_msgs=new message();


if(!empty($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($title == '' || $content == '' || $name == '' || $email == '') {
        $msg_error = "All Fields are required";
    } else {
        if ($all_msgs->add_messg($title, $content, $name, $email)) {
            $msg_success = 1;
        }
        else{$msg_error= $all_msgs->get_errors();}
    }
}
$msgs=$all_msgs->get_all_messgs();
include "templates/guestbook.html";