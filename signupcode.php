<?php 
session_start();
if (isset($_SESSION['id'])) {
    header("location: index.php");
}
$con=mysqli_connect("localhost","root","","ecommerce") or die(mysqli_error($con));
$userEmail =mysqli_escape_string($con,$_POST['userEmail']);
$userEmail = mb_convert_case($userEmail, MB_CASE_LOWER, "UTF-8");	
$userFirstName = mysqli_escape_string($con,$_POST['userFirstName']);
$userLastName = mysqli_escape_string($con,$_POST['userLastName']);
$userMobile= mysqli_escape_string($con,$_POST['userMobile']);
$userAddress= mysqli_escape_string($con,$_POST['userAddress']);
$userCity= mysqli_escape_string($con,$_POST['userCity']);
$userState= mysqli_escape_string($con,$_POST['userState']);
$userCountry= mysqli_escape_string($con,$_POST['userCountry']);
$userZip= mysqli_escape_string($con,$_POST['userZip']);
$userPassword	= md5(mysqli_escape_string($con,$_POST['userPassword']));
$user_registration_query = "insert into user(userEmail, userFirstName, userLastName, userMobile,userAddress,userCity,userState,userCountry,userZip,userPassword) values ('$userEmail', '$userFirstName', '$userLastName', '$userMobile','$userAddress','$userCity','$userState','$userCountry','$userZip','$userPassword')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
$_SESSION['email'] = $userEmail;
$_SESSION['id'] = mysqli_insert_id($con);
header("location: index.php");
?>
