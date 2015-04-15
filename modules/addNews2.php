<?php
//include '../connect/connect.php';
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
    if(empty($title)) {
        $errorTitle = 'Hãy điền tiêu đề vào';
        $ok = 0;
    }
    if(empty($username)) {
        $errorName = 'Hãy điền họ tên vào';
        $ok = 0;
    }
    if(empty($phone)) {
        $errorPhone = 'Hãy điền số điện thoại vào';
        $ok = 0;
    }
    if(empty($email)) {
        $errorEmail = 'Hãy điền Email vào';
        $ok = 0;
    }
    if(empty($subAddress)) {
        $errorSub = 'Hãy điền số nhà và tên đường vào';
        $ok = 0;
    }
    if(empty($price)) {
        $errorPrice = 'Hãy điền giá phòng vào';
        $ok = 0;
    }
    if(empty($area)) {
        $errorArea = 'Hãy điền diện tích vào';
        $ok = 0;
    }
    if(empty($content)) {
        $errorContent = 'Hãy điền nội dung vào';
        $ok = 0;
    }
    if(empty($uploadFile['name'][0])) {
        $errorImg = 'Hãy tải hình lên';
        $ok = 0;
    }
    if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
        unset($_SESSION['security_code']); 
    } else {
        $errorCaptcha = 'Mã không đúng';
        $ok = 0;
    }
    
    if ($ok) {
        $imgID = uniqid();
        $sql = "INSERT INTO `news` VALUES(NULL,'$title','$username','$phone','$email','$district','$ward','$subAddress','$category','$price','$area','$content','$imgID')";
        $result = mysqli_query($link, $sql);
        if($result) {
            header("Location: ?");
        }
    }
}
?>
