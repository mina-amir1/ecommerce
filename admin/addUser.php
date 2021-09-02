<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

$error='';
$success='';

if(!isset($_SESSION['user_data'])){exit("NOT Logged in");}

if(isset($_POST['username']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $user=new user();
    if($user->register($username,$password,$email))
    {
        $success=1;
    }
    elseif ($username==''||$password==''||$email==''){$error= "All Fields Are Required";}
    else{$error=$user->get_errors();}
}

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/add-user.html";
include "../templates/admin/footer.html";