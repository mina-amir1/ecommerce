<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/upload_file_class.php";
$error='';
$success=0;
if(!isset($_SESSION['user_data'])){exit("NOT Logged in");}
if(isset($_POST['title']))
{
    $userid=$_SESSION['user_data']['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $available=$_POST['available'];
    $img_url='';
    if (isset($_FILES['image']['name']))
    {
        $img= new file_upload('image');
        // no errors -> move img to images folder else leave it null
        if (empty($img->get_errors()))
        {
            $img_url= $img->file_move("../templates/front/images/");
        }
    }
    $product= new product();
    if( ! $product->add_product($title,$description,$img_url,$price,$available,(int)$userid))
    {
        $error=$product->get_error();
        unlink("../templates/front/images/".$img_url);
    }
    else{$success=1;}



}

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/add-product.html";
include "../templates/admin/footer.html";