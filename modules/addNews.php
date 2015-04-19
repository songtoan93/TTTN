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
    if(empty($_FILES['uploadFile']['name'][0])) {
        $errorImg = 1;
        $ok = 0;
    } else {
        $n = count($_FILES['uploadFile']['name']);
        $n = $n > 8 ? 8:$n;
        $validextensions = array("jpeg", "jpg", "png", "gif");
        $validExt = true;
        for ($i = 0; $i < $n; $i++) {
            $target_file = basename($_FILES["uploadFile"]["name"][$i]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (!in_array($imageFileType, $validextensions) && $_FILES["file"]["size"][$i] > 1000000) {
                $validExt = false;
                break;
            }
        }
        if (!$validExt) {
            $errorImg = 1;
            $ok = 0;
        }
    }
    if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
        unset($_SESSION['security_code']); 
    } else {
        $errorCaptcha = 'Mã không đúng';
        $ok = 0;
    }

    if ($ok) {
        $n = count($_FILES['uploadFile']['name']);
        $n = $n > 8 ? 8:$n;
        $imgID = uniqid();
        $target_path = "uploads/";

        for ($i = 0; $i < $n; $i++) {
            $target_file = basename($_FILES["uploadFile"]["name"][$i]);
            $ext = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_name = $imgID . "_" . $i . "." . $ext;
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['uploadFile']['tmp_name'][$i], $target_path);
            $sql = "INSERT INTO `hinh` VALUES (NULL ,'$imgID', '$file_name')";
            mysqli_query($link, $sql);
        }

        $sql = "INSERT INTO `news` VALUES(NULL,'$title','$username','$phone','$email','$district','$ward','$subAddress','$category','$price','$area','$content','$imgID')";
        $result = mysqli_query($link, $sql);
        if($result) {
            $lastId = mysqli_insert_id($link);
            header("Location: index.php?mod=vieweach?id=".$lastId);
        }
    }
}
?>
