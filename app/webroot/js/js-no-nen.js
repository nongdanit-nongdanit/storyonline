$(function(){
    $('#facebook-login-button').click(function(e){
        $.oauthpopup({
            path: '/facebook_cps/login',
			width:600,
			height:300,
            callback: function(){
                window.location.reload();
            }
        });
		e.preventDefault();
    });
    $(".replaysubien").click(function(){
        var id = $(this).attr('id');
        $('.replaysubien'+id).toggle();  
    });
    $(".likect").click(function(){
        var id = $(this).attr('id');
        var subien = $(this).attr('subien');
        if(subien==1){
            var url         = '/hoidaps/likect';
        }else{
            var url         = '/hoidaps/likect2';
        }
        
        $.post(url,{'id':id}, function(re){
            data = jQuery.parseJSON(re);
            if(data=="F"){
                alert("Có lỗi xảy ra vui lòng thử lại");
                return false;                             
            }else if(data=="R"){
                alert("Bạn đã sử dụng chức năng này rồi!!");
                return false;
            }else{
                $('.likect'+id+subien).html("<span class='ilike icon'></span>"+data);
            } 
		});
    });
    $(".violatect").click(function(){
        var id = $(this).attr('id');
        var subien = $(this).attr('subien');
        if(subien==1){
            var url         = '/hoidaps/violatect';
        }else{
            var url         = '/hoidaps/violatect2';
        }        
        $.post(url,{'id':id}, function(re){
            data = jQuery.parseJSON(re);
            if(data=="F"){
                alert("Có lỗi xảy ra vui lòng thử lại");
                return false;                             
            }else{
                alert("Cảm ơn bạn đã báo vi phạm, Quản trị sẽ xem xét báo cáo của bạn!!!");
                $('.violatect'+id+subien).removeClass('violatect');
                $('.violatect'+id+subien).html("<span class='ireport icon'></span> <span style='color:#F1DEDE;'>Vi phạm</span>");
            } 
		});
    });
    //Truyện
    $("#search").keyup(function(){
		load_searchdropbox();
	});
    $("#search-content").hover(function(){
		
	},function(){
		$("#search-content").hide();
	});
    $(".newsletter-form").submit(function(){
		var th=$(this);
		$.ajax({
			type:"POST",
			url:$(th).attr("action"),	
			data:$(th).serialize(),
			success:function(data){
				alert(data);
                $("#email_newsletter").val("");
				//$('.ajax-loader').hide();
			},
			error:function(){
				//$('.ajax-loader').hide();
			}
		});
		return false;
	});
});
$(document).on('change', ".changechapter", function() {
	window.location.href = $(this).val();
});
load_searchdropbox=function(){
	//$('.ajax-loader').show();
	var th=$("#search");
    var key = $(th).val();
    $.post('/stories/searchdropbox',{'key':key}, function(re){        
        $("#search-content").html(re);
	   //$('.ajax-loader').hide();
	    $("#search-content").show();
        
    });
}
function displayMess(){
    $("#myModal, .modal-backdrop").hide();    
}