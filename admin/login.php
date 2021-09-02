<?php
require "../includes/config.php";
require "../includes/user_class.php";
session_start();
$error='';
if(isset($_SESSION['user_data']))
{

   ?>
    <script type="text/javascript">
        window.location.href= 'index.php';
    </script>
<?php
}
if (isset($_POST['username']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user=new user();

    if($user->login($username,$password))
    {
        $data=$user->get_login_user_data();
        if(!empty($data)){$_SESSION['user_data']=$data;}

        ?>
        <script type="text/javascript">
            window.location.href= 'index.php';
        </script>
        <?php
    }
    else
        {
            $error= "Invalid username or Password";
        }

}
include "../templates/admin/login.html";




