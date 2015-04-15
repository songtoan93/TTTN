<?php
session_start();
include 'connect/connect.php';
include 'modules/addNews2.php';
$mod = isset($_GET['mod'])?$_GET['mod']:'';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hỗ Trợ Sinh viên tìm phòng trọ</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="javascript/function.js"></script>
    <script type="text/javascript" src="jquery/jquery-2.1.3.min.js"></script>
    <script>
        $(function() {
            var a = $("#district option:selected").val();
            showWard(a);
            reload();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
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
                <label for="tab1"><a href="index.php" <?php if(empty($mod)) echo 'class="active"';?> id="page1">Trang Chủ</a></label>
            </li>
            <li>
                <label for="tab2"><a href="index.php?mod=gii" <?php if($mod == 'gii') echo 'class="active"';?> id="page2">Cho Thuê Phòng</a></label>
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
    if(!empty($mod)) { 
        include 'view/form1.php';
    } else {
        include 'view/homeList.php';
    }
    ?>
    </div>

    <div class="right"></div>

</body>
</html>