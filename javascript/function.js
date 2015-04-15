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