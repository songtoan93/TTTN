<?php
session_start();
include '../connect/connect.php';
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $district = intval($_POST['district']);
    $ward = intval($_POST['ward']);
    $subAddress = $_POST['subAddress'];
    $category = intval($_POST['category']);
    $price = floatval($_POST['price']);
    $area = floatval($_POST['area']);
    $content = $_POST['content'];
    $uploadFile = $_FILES['uploadFile'];
    $ok = 1;
    $errorTitle = false;
    $errorName = false;
    $errorPhone = false;
    $errorEmail = false;
    $errorSub = false;
    $errorPrice = false;
    $errorArea = false;
    $errorContent = false;
    $errorImg = false;
    $errorCaptcha = false;
    if(empty($title)) {
        $errorTitle = true;
        $ok = 0;
    }
    if(empty($username)) {
        $errorName = true;
        $ok = 0;
    }
    if(empty($phone)) {
        $errorPhone = true;
        $ok = 0;
    }
    if(empty($email)) {
        $errorEmail = true;
        $ok = 0;
    }
    if(empty($subAddress)) {
        $errorSub = true;
        $ok = 0;
    }
    if(empty($price)) {
        $errorPrice = true;
        $ok = 0;
    }
    if(empty($area)) {
        $errorArea = true;
        $ok = 0;
    }
    if(empty($content)) {
        $errorContent = true;
        $ok = 0;
    }
    if(empty($uploadFile['name'][0])) {
        $errorImg = true;
        $ok = 0;
    }
    if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
        unset($_SESSION['security_code']); 
    } else {
        $errorCaptcha = true;
        $ok = 0;
    }
    $error = array($errorTitle, $errorName, $errorPhone, $errorEmail, $errorSub, $errorPrice, $errorArea, $errorContent, $errorImg, $errorCaptcha);
    if ($ok) {
        $imgID = uniqid();
        $sql = "INSERT INTO `news` VALUES(NULL,'$title','$username','$phone','$email','$district','$ward','$subAddress','$category','$price','$area','$content','$imgID')";
        $result = mysqli_query($link, $sql);
        if($result) {
            header("Location: ?");
        }
    }
    //var_dump($error);
    echo json_encode($error);
}
?>
