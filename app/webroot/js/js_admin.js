$(function(){
    $('.cloneindex').click(function(e){
        if(confirm("Bạn có chắc chắn?")){
        var id = $(this).attr("idx");
        var cla = "#clone"+id;
         var url         = "/articles/clonechap";
        $.post(url,{'id':id}, function(re){
            data = jQuery.parseJSON(re);
            if(data=="T"){
                alert("OK");
            }else{
                alert("No OK");
            }
        });
   }
    });
});