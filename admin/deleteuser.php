<?php
session_start();
require "../includes/config.php";
include "../includes/user_class.php";
include "../includes/products_class.php";
include "../includes/message_class.php";

$id=$_GET['id'];
$user=new user();

$user->delete_user($id);
?>

<script type="text/javascript">
    window.location.href = 'allUsers.php';
</script>
