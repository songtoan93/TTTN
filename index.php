<?php
session_start();
include 'connect/connect.php';
include 'modules/addNews.php';
$mod = isset($_GET['mod'])?$_GET['mod']:'homelist';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hỗ Trợ Sinh viên tìm phòng trọ</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="javascript/function.js"></script>
    <script>
        $(function() {
            getWard();
            reload();
            loadImg();
        });

    </script>
</head>
<body>
    <header>
        <div class="size head">
                <a href="index.php"><img src="image/bachkhoa_logo.png" class="logo"></a>
                <h2></h2>
        </div>
    </header>
    
    <nav class="size menu">
        <ul>
            <li>
                <a href="index.php?mod=homeList"  <?php if($mod == 'homeList') echo 'class="active"';?> id="page1">Trang Chủ</a>
            </li>
            <li>
                <label for="tab2"><a href="index.php?mod=vieweach" <?php if($mod == 'vieweach') echo 'class="active"';?> id="page2">Cho Thuê Phòng</a></label>
            </li>
            <li>
                <label for="tab3"><a href="index.php?mod=gi" <?php if($mod == 'gi') echo 'class="active"';?> id="page3">Tìm người ở ghép</a></label>
            </li>
            <li>
                <label for="tab4"><a href="index.php?mod=form" <?php if($mod == 'form') echo 'class="active"';?> id="page4">Đăng Tin</a></label>
            </li>
        </ul>
    </nav>

    <div class="left">
        <div><img src="image/play.png">Quận/Huyện</div>
        <ul>
        <?php
        $sql = "SELECT `name`,`code` FROM `district` ORDER BY `name`";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <li><a href="index.php?mod=view1&code=<?php echo $row['code'];?>"><?php echo $row['name'];?></a></li>
            <?php
        }
        ?>
        </ul>
    </div>

    <div class="size greet">
    <?php
        include_once 'view/'.$mod.'.php';
//    if(!empty($mod)) {
//        include 'view/form.php';
//    } else {
//        include 'view/homeList.php';
//    }
//    ?>
    </div>

    <div class="right"></div>

</body>
</html>