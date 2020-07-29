<?php 
session_start();
if (isset($_SESSION['id'])) {
    header("location: index.php");
} 
$con=mysqli_connect("localhost","root","","ecommerce") or die(mysqli_error($con));
if (isset($con,$_POST['email'])){
$user_login = mysqli_escape_string($con,$_POST['email']);
$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");	
$password_login = mysqli_escape_string($con,$_POST['pass']);
$password_login_md5 = md5($password_login);
$login_query = "SELECT userID,userEmail FROM user WHERE userEmail='$user_login' AND userPassword='$password_login_md5'";
$login_submit = mysqli_query($con, $login_query) or die(mysqli_error($con));
$fetched = mysqli_fetch_array($login_submit);
if($fetched ==1){  
} else{
    $_SESSION['id']=$fetched['userID'];
    $_SESSION['email']=$fetched['userEmail'];
    header("location: index.php");
}
}
?>