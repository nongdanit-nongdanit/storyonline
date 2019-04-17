$(function(){
    $(".activeuser").change(function(){
        $('.ajax-loader').show();
        var val=$(this).val();
  		var id=$(this).attr("id");
        var url         = '/users/changeactiveuser';
        $.post(url,{'id':id, 'val':val}, function(re){
            data = jQuery.parseJSON(re);
            if(data=="T"){
                $('.ajax-loader').hide();
            }else{
                alert("Có lỗi xảy ra vui lòng thử lại");
                $('.ajax-loader').hide();
            }          
        });
    });
});
function checkKeypress(e){
    var keypressed = null;
    if (window.event)
    {
    keypressed = window.event.keyCode; //IE
    }
    else {
    keypressed = e.which; //NON-IE, Standard
    }
    if (keypressed < 48 || keypressed > 57)
    { 
        if (keypressed == 8 || keypressed == 127)
        {
            return;
        }
        return false;
    }
}
function checkKey(e){
    var keypressed = null;
    if (window.event)
    {
        keypressed = window.event.keyCode; //IE
    }
    else {
        keypressed = e.which; //NON-IE, Standard 
    }
    if (keypressed < 48 || keypressed > 57)
    { 
        if (keypressed == 118 || keypressed == 8 || keypressed == 127 || keypressed == 45 || keypressed == 37 || keypressed == 9)
        {
            return;
        }
        return false;
    }
}
function check(e) {
    var keypressed = null;
    if (window.event)
    {
    keypressed = window.event.keyCode; //IE
    }
    else {
    
    keypressed = e.which; //NON-IE, Standard
    }
    if (keypressed < 48 || keypressed > 57)
    { 
        if (keypressed == 8 || keypressed == 127 || keypressed == 46)
        {
            return;
        }
        return false;
    }
}