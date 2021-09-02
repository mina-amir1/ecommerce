<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

$id=$_GET['id'];
$msg=new message();
$_SESSION['del_success']=$msg->delete_messg($id);
$_SESSION['del_error']=$msg->get_errors();

?>
<script type="text/javascript">
    window.location.href= 'allMesggs.php';
</script>
