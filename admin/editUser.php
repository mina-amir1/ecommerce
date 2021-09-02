<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

$error='';
$success='';

$id=$_GET['id'];
$user=new user();
$data=$user->get_user_data($id);

print_r($data);

if(isset($_POST['username']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];


    if($user->edit($id,$username,$password,$email))
    {
        $success=1;
    }
    elseif ($username==''||$password==''||$email==''){$error= "All Fields Are Required";}
    else{$error=$user->get_errors();}
}

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/update-user.html";
include "../templates/admin/footer.html";