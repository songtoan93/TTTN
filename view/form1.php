<form action="" method="post" enctype="multipart/form-data" id="postNews">
            
    <?php
    if(isset($errorTitle)) echo '<span class="error" style="position: absolute;left: 360px;top: 200px;">'.$errorTitle.'</span>';
    ?>
            
    <div class="ai_row">
        <label for="title" class="ai_label">Tiêu đề<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <input id="title" name="title" class="input_short" maxlength="100" type="text" style="width: 420px;">
            
             <?php
            if(isset($errorTitle)) echo '<span class="error"></span>';
            ?>
            
            <div id="name_tooltip" class="tooltip" style="left: 430px">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 160px">
                    <span id="tooltip_content">Ví dụ: <span style="color: red">Cho thuê nhà trọ ở quận 12</span> hoặc <span style="color: red">Tìm Nam /Nữ ở ghép 500k/người, Q.Tân Phú</span></span>
                </div>
                <div class="clear"></div>
            </div>

            <div id="name_warntip" class="warntip" style="display: none;">
                <div id="name_warntip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="warntip_content">
                    <span id="warntip_content">Thiếu tên</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <label for="userName"class="ai_label">Tên<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <input id="userName" name="username" class="input_short" maxlength="50" type="text">
            <?php
            if(isset($errorName)) echo '<span class="error">'.$errorName.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 150px">
                    <span id="tooltip_content">Điền đầy đủ họ và tên.</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
                        
    <div class="ai_row">
        <label for="phone" class="ai_label">Số Điện Thoại<span style="color: red">*</span>:</label>
       
        <div class="ai_element">
            <input id="phone" name="phone" class="input_short" maxlength="20" type="text">
             <?php
            if(isset($errorPhone)) echo '<span class="error">'.$errorPhone.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 210px">
                    <span id="tooltip_content">Điền đầy đủ mã vũng nếu là số điện thoại cố định.</span>
                </div>
                <div class="clear"></div>
            </div>

        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <label for="email" class="ai_label">Email<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <input id="email" name="email" class="input_short" maxlength="30" type="text" placeholder="example@abc.com">
            <?php
            if(isset($errorEmail)) echo '<span class="error">'.$errorEmail.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="display: none">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 210px">
                    <span id="tooltip_content">Ví dụ: <span style="color: red">example@abc.com</span></span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <div class="ai_label">Địa Chỉ<span style="color: red">*</span>:</div>
        
        <div class="ai_element">
            <span>Quận</span>
            <select id="district" name="district" onchange="showWard(this.value)">
                <?php
                    $sql = "SELECT `name`,`code` FROM `district`";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['code'];?>"><?php echo $row['name'];?></option>
                        <?php
                    }
                ?>                                    
            </select>
            
            <span>Phường</span>
            <select id="ward" name="ward"></select>
        </div>
        
        <div class="clear"></div>
    </div>
            <?php
            if(isset($errorSub)) echo '<span class="error" style="position: absolute;left: 515px;top: 465px">'.$errorSub.'</span>';
            ?>
    <div class="ai_row" style="margin-top: 23px">
        <div class="ai_label"></div>
            
        <div class="ai_element">
            <label for="subAddress" style="margin-left: 16px">Số nhà và tên đường<span style="color: red">*</span>: </label>
            <input id="subAddress" name="subAddress" class="input_short" maxlength="40" value="" type="text" style="width: 255px">
            <?php
            if(isset($errorSub)) echo '<span></span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="left: 433px;">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 185px">
                    <span id="tooltip_content">Ví dụ <span style="color: red">232/3 Lý Thường Kiệt</span></span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <div class="ai_label">Chuyên Mục</div>
        
        <div class="ai_element">
            <select name="category">
                <?php
                $sql = "SELECT `id`,`name` FROM `chuyenmuc`";
                $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                ?>
            </select>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <label for="price"class="ai_label">Giá Phòng<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <input id="price" name="price" class="input_short" maxlength="50" placeholder="" type="text" pattern="[0-9]{1,}" style="width: 100px">
            <?php
            if(isset($errorPrice)) echo '<span class="error">'.$errorPrice.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="left: 122px">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 150px">
                    <span id="tooltip_content">Ví dụ: <span style="color: red">25000000</span>VNĐ</span>
                </div>
                <div class="clear"></div>
            </div>
            
            <span style="display: none">VNĐ</span>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <label for="area" class="ai_label">Diện Tích<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <input id="area" name="area" class="input_short" maxlength="2" type="text" style="width: 50px">
            <?php
            if(isset($errorArea)) echo '<span class="error">'.$errorArea.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="left: 70px">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 100px">
                    <span id="tooltip_content">Ví dụ: <span style="color: red">10.5</span>m<sup>2</sup></span>
                </div>
                <div class="clear"></div>
            </div>
            
            <span style="display: none">m<sup>2</sup></span>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <label for="content" class="ai_label" style="position: relative;top: -135px;">Nội Dung<span style="color: red">*</span>:</label>
        
        <div class="ai_element">
            <?php
            if(isset($errorContent)) echo '<span class="error">'.$errorContent.'</span>';
            ?>
            <textarea id="content" name="content" minlength="30" maxlength="3000" cols="65" rows="10" placeholder="Điền nội dung thông tin chi tiết về nhà trọ bạn muốn/cho thuê. Tối thiểu 30 kí tự, tối đa 3000 kí tự."></textarea>
            <?php
            if(isset($errorContent)) echo '<span></span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="left: 450px;">
                <div id="name_tooltip_triangle" class="triangle" style="">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 145px;border: none;text-align: justify;background: #E6DFB2;color: rgb(20, 19, 19);text-align: justify">
                    <span id="tooltip_content">Ví dụ: Nhà có vị trí thuận lợi, gần công viên, gần trường học, diện tích 15m<sup>2</sup>, ở riêng với chủ nhà, có chỗ để xe, an ninh...</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <div class="ai_label">Hình ảnh<span style="color: red">*</span>:</div>
        
        <div class="ai_element">
            <label for="uploadFile" class="uploadFile"><img src="image/upload-512.png">Tải hình lên</label>
            <input type="file" id="uploadFile" name="uploadFile[]">
            <?php
            if(isset($errorImg)) echo '<span class="error">'.$errorImg.'</span>';
            ?>
            <div id="name_tooltip" class="tooltip" style="left: 486px;">
                <div id="name_tooltip_triangle" class="triangle">&nbsp;</div>
                <span></span>
                <div class="tooltip_content" style="width: 145px;border: none;text-align: justify;background: #E6DFB2;color: rgb(20, 19, 19);text-align: justify">
                    <span id="tooltip_content">Chỉ được chọn tối đa 5 hình</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="ai_row">
        <div style="display: inline-block;top: -13px;position: relative">
            <label for="content" class="ai_label" style="">Nhập mã an toàn<span style="color: red">*</span>:</label>
        </div>
        
        <div class="ai_element">
            <img src="modules/CaptchaSecurityImages.php" id="captcha">
            <a href="#" id="reload" title="reload"><img src="image/reload.png" style="width: 35px"></a>
            <input class="input_short" id="security_code" name="security_code" type="text" style="position: absolute;top: 8px;width: 90px;font-size: 20px;">
            <?php
            if(isset($errorCaptcha)) echo '<span class="error" style="position: absolute;top: 3px;left: 270px">'.$errorCaptcha.'</span>';
            ?>
        </div>
        
        <div class="clear"></div>
    </div>
    <div class="ai_row">
        <div class="click">
            <input type="submit" value="Đăng thông tin" name="submit" id="submit">
        </div>
    </div>  
</form>