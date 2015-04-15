<?php
    include '../connect/connect.php';
    $a = intval($_GET['q']);
    
    $sql = "SELECT `code`,`name` FROM `ward` WHERE `Dcode`=$a ORDER BY `code`";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $b[$row['code']] = $row['name'];
    }
    echo json_encode($b);
?>
