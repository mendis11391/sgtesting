<?php include 'config.php';

session_start();
$conn = $mysqli;

$email = strip_tags($_SESSION["email"]);
$currentPassword = md5(strip_tags($_POST['currentPassword']));
$newPassword = md5(strip_tags($_POST['newPassword']));

$result = mysqli_query($conn,"SELECT password FROM `users` WHERE email='$email'");
$result=mysqli_fetch_array($result);

if($currentPassword == $result["password"]) {
    mysqli_query($conn,"UPDATE users set password='$newPassword' WHERE email='$email'");
    echo "Password Changed.";
    echo " Please login again with new password.";

} else {
    echo "Current Password is not correct";
}


?>