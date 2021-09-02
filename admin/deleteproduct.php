<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

$id=$_GET['id'];
$product=new product();
$img_url=$product->get_product($id);

if($product->delete_product($id))
{
    unlink("../templates/front/images/".$img_url[0]['image']);
}
?>

<script type="text/javascript">
    window.location.href = 'allProducts.php';
</script>
