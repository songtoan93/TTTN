function getWard() {
    var a = $("#district option:selected").val();
    showWard(a);
}

function showWard(code) {
    $.ajax({
       type: 'GET',
       url: 'modules/getWard.php',
       data: 'q='+code
    }).done(function(data){
        $("#ward").empty();
        var foo = $.parseJSON(data);
        $.each(foo, function(key, value){
            $('<option>').val(key).text(value).appendTo('#ward');
        });
    });
}

function reload() {
    $('#reload').click(function(e){
        $('#captcha').attr('src','modules/CaptchaSecurityImages.php');
        e.preventDefault();
    });
}

function loadImg() {
    $("#uploadFile").change(function(){
        $('#preview').empty();
        readURL(this);
    });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var n = input.files.length;
        n = n > 8 ? 8:n;
        var error = false;
        for(i = 0; i < n; i++) {
            var ext = input.files[i].name.split('.').pop();//console.log(ext);
            if(ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg") {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').append('<img src="' + e.target.result + '">');                }

                reader.readAsDataURL(input.files[i]);
            } else {
                error = true;
                break;
            }
        }
        if(error) alert('Hãy chọn ảnh có định dạng jpg, jpeg, gif, png');
    }
}

function bigView(a) {
    //var src = img.attr('src');
    //$('#viewBig').attr('src',src);
    var kid = a.find('img');console.log(kid.attr('src'));
    $('#smallGallery').click(function(event){
        //var kid = $( this ).find('a img');console.log(kid.attr('src'));
        event.preventDefault();
    });
}

function checkForm() {
    $('#postNews').submit(function(e){
        e.preventDefault(); 
        var form = $(this);
        var url = form.attr('action');
        var posting = $.post(url, form.serialize(),"json").done( function(data){
            console.log(data);console.log("ok3");
        });
  /*      posting.done(function(data){
            
            var a = $.parseJSON(data);console.log(a);
            var error = $('.error');
            console.log(error.length);
            console.log(Object.keys(a).length);
        });*/
    });
}