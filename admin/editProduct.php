<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";
include "../includes/upload_file_class.php";
$error='';
$success=0;

$id=$_GET['id'];

$product=new product();
$pro_data=$product->get_product($id);

if(count($_POST))
{
    $userid=$_SESSION['user_data']['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $available=$_POST['available'];
    $img_url=$pro_data[0]['image'];


    if (isset($_FILES['new_image']['name']))
    {
        $img = new file_upload('new_image');
        // no errors -> move img to images folder else leave it null
        if (empty($img->get_errors())) {
            $img_url = $img->file_move("../templates/front/images/");
        }
    }
    if ($product->update_product($id,$title,$description,$img_url,$price,$available,$userid))
    {
        if (!$_FILES['new_image']['name']=='')
        {
            unlink("../templates/front/images/" . $pro_data[0]['image']);
        }
        ?>
        <script type = "text/javascript">
        window . location . href = 'allProducts.php'
        </script >
<?php
    }
    else{$error=$product->get_error();}


}

include "../templates/admin/header.html";
include "../templates/admin/menu.html";

include "../templates/admin/edit-product.html";
include "../templates/admin/footer.html";