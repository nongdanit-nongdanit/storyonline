var msg_non_vip_thpt='';
var msg_non_vip_sb='';
var show_yes=1;
var time = $(".thpt_start_bt").attr("id");
var userid = $("#userid").attr("value");
var tongcauhoiradio = $("#tongcauhoiradio").attr("value");

function toPos(ElementTo){
    var postCm = $(ElementTo).offset();
    $('body,html').animate({scrollTop:postCm.top},300);
}
function delSpace(str){	
	str=str.toLowerCase();	
	if(str.indexOf(".")>=0){
		str=str.replace(/\./g," ");
	}		
	if(str.indexOf(",")>=0){
		str=str.replace(/,/g," ");
	}
	if(str.indexOf("-")>=0){
		str=str.replace(/-/g," ");
	}
	if(str.indexOf(" /")>=0){
		str=str.replace(" /","/");
	}
	str=$.trim(str);
	var i=0;
	var n=str.length;
	while(i<n){
		if(str[i]==' '&& str[i+1]==' ')
			str=str.replace("  "," ");
		else
			i++;
		
	}	
	return str;
}
function thpt_start(cmd){
	$(cmd).hide();
    $('.test_content').show();
	$('.thpt_cmd').show();
    if(time!=0)
    {
        $('#settime').show();
        $(".time_tracnghiem").hide();
        timer.init(0,0,'settime');
    }
}
var timer ={
	minutes :0,
	seconds : 0,
	elm :null,//id
	samay : null,
	sep : ':',
	init : function(m,s,elm){
		//m = parseInt(m,10);
		//s = parseInt(s,10);
		if(m<0 || s<0 || isNaN(m) || isNaN(s)) 
		{ alert('Invalid Values'); return; }
		this.minutes = m;
		this.seconds = s;
		this.elm = document.getElementById(elm);
		timer.start();},
	start : function(){
		this.samay = setInterval((this.doCountDown),1000);
	},
	doCountDown : function(){		
			if(timer.minutes == time){
				clearInterval(timer.samay);
				timerComplete();
				return;
			}		
		timer.seconds++;
		timer.updateTimer(timer.minutes,timer.seconds);
		
	},
	updateTimer :  function(min,secs){
			min = (min < 10 ? '0'+min : min);
			secs = (secs < 10 ? '0'+secs : secs);
			(this.elm).innerHTML = min+(this.sep)+secs;
			if(timer.seconds==60){
				timer.seconds=0;
				timer.minutes++;
			}
		}
	}
function timerComplete(){
	alert("Đã hết "+time+" phút làm bài! Bạn hãy click vào nút \"HOÀN TẤT\" để biết kết quả của mình!");
    toPos('.tracnghiem');
	$('.test_content').hide();
    $(".thpt_alert_sb").hide();
    $(".thpt_control_sb").hide();
    $('#settime').hide();
	show_yes=0;
}
function stoptime_thpt(){
	clearInterval(timer.samay);
}

var s=0;
var total=0;
var current_time=0;
function testBlank(arr){	
	s=0;
	var okk=0;		
	$('.thpt_blank').each(function(i){			
		okk=0;													
		val=$(this).val();	
		if(val!=''){			
			val=delSpace(val);			
			
			val=$.trim(val);
			str=delSpace(arr[i]);			
			str=$.trim(str);
			if(str.indexOf('|')>0){
				var arr_st=str.split('|');									
				for(var t=0;t < arr_st.length;t++){
					arr_st[t]=$.trim(arr_st[t]);
					if(val==arr_st[t]){						
						okk=1;						
						break;
					}					
				}				
			}else{
				if(val==str){
					okk=1;
				}
			}
			if(okk==1){			
				$(this).css('color','#0062C4');
				diem=parseInt($(this).attr("d"));	
				s += parseInt($(this).attr("d"));
				$(this).next().attr('stt_blank','correct').addClass('thpt_true');									
					
			}else{
				$(this).css('color','red');	
				$(this).next().attr('stt_blank','incorrect').addClass('thpt_false');
			}
		}else{
			$(this).next().attr('stt_blank','incorrect').addClass('thpt_false');
		}
		});		
		return s;	
	}	
function showBlank(result){
	$('.thpt_blank').each(function(i){
		if($(this).hasClass('thpt_blank_part')){
			$(this).next('.thpt_false').after('&nbsp;&nbsp;&nbsp;<span class="stt_text">'+result[i]+'</span>');
		}else{
			$(this).next('.thpt_false').parent().after('<div class="thpt_box_blank stt_text_r">'+result[i]+'</div>');
		}
	});	
		
}	

// Multiple choice
function testRadio(arr){
	s=0;	
	$('.thpt_multiple input:radio:checked').each(function(){
		inx=parseInt($(this).attr('inx'));		
		if($(this).val()==arr[inx]){
			s += parseInt($(this).attr("d"));					
			$(this).parent().prev().addClass('thpt_true');			
		}else{			
			$(this).parent().prev().addClass('thpt_false');
		}	
	});	
	return s;
}
function showRadio(result){		
	for(i=0;i<result.length;i++){			
		$(".thpt_multiple input:radio[inx="+i+"][value="+result[i]+"]").parent().prev().addClass('thpt_true');						
	}	
}

function thpt_action(cmd){
	if(show_yes==1){
	   if(time==0)
       {
            if(userid =='' || userid==0)
            {
                $(".modal-backdrop").show();
                $("#info-box").show();
                
            }else
            {
                thpt_yes('.thpt_yes');
            }            
       }else
       {
        /*
        var radios = document.getElementsByTagName('input');
        var value;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].type === 'radio' && radios[i].checked) {
                // get value, set checked flag or do whatever you need to
                value = radios[i].value;
            }
        }
        
        if($('input:radio:checked').length < tongcauhoiradio){
            alert("Vui lòng trả lời hết các câu hỏi");
            toPos('#cauhoi1');
        }else
        {*/
            var time_curr=$('#settime').text();
			var index=time_curr.indexOf(":"); 
			var so_p_curr=parseInt(time_curr.substring(0,index));
			var so_s_curr=parseInt(time_curr.substr((index+1),2));
            var so_p=time-so_p_curr;
			var so_s=60-so_s_curr;
			if(so_s==60){				
				so_s = 0;
			}else{
				so_p =so_p - 1;
			}
			current_time=so_p_curr * 60 + so_s_curr;
			$(".thpt_control_sb").show();
			$('.thpt_alert_sb').show().html('Bạn còn <strong style="color:#df3400">'+so_p+' </strong> phút <strong style="color:#df3400">'+so_s+'</strong> giây để làm bài! Bạn có chắc chắn muốn nộp bài ?<br/>');
       //}           
       }
	}else{
		thpt_yes('.thpt_yes');
	}
		//$('.thpt_t').text(time_curr);
}
function thpt_yes(cmd){
	// stop time
	
    if(userid =='' || userid==0)
    {
        $(".modal-backdrop").show();
        $("#info-box").show();
        
    }else
    {
        stoptime_thpt();
        document.forms['appForm'].submit();
    }
	/**
 * total=0;
 * 	if($('.thpt_multiple').length>0){		
 * 		total += testRadio(arr_rad);
 * 	}
 * 	
 * 	if($('.thpt_blank').length>0){		
 * 		total += testBlank(arr_bl);
 * 	}
 * 	total = total/1000;
 * 	$('.thpt_dl').text(total);	
 * 	$('.thpt_alert').show();
 * 	$(".thpt_control_sb").hide();
 * 	$('.thpt_alert_sb').hide();
 * 	$('.test_content').hide();
 * 	$('.thpt_cmd').hide();
 * 	toPos('.thpt_start');
 * 	console.log(total);
 */
}
function thpt_no(cmd){
	toPos('.test_content');
	$(".thpt_control_sb").hide();
	$('.thpt_alert_sb').hide();
}
function showAnswer(cmd){
	if(vip_thpt==1){	
	if($('.thpt_blank').length>0){
		showBlank(arr_bl);	
	}	
	if($('.thpt_multiple').length>0){
		showRadio(arr_rad);
	}
	$('.test_content').show();
	$('.thpt_explain').show();
	$(cmd).attr("showed",1);
	$(cmd).removeAttr('onclick').addClass('thpt_showed');
	
	}else{
		$('.tanc_save_er').show().html(msg_non_vip_sb).fadeOut(2000);
	}	
	
}
//******************************************Phan bài kiểm tra trong chi tiết bài học
//Kiêm tra  question
function checkAnswers(){
    $("input:radio").each(function () {
        var $this = $(this);var id = $this.attr('id');var kq = $(".kq"+id).val();            
        if (this.checked==true) {
            var value = $this.val();
            
            if(value==kq){
                $this.parent().parent().parent().addClass('right-q');
                $(".add"+id).append("<p><b class='correct'>CORRECT:</b> <span class='qWord lang-en'>" + kq + "</span></p>");
            }else{
                $this.parent().parent().parent().addClass('wrong-q');
                $(".add"+id).append("<p><b class='incorrect'>INCORRECT:</b> You said <span class='incorrect'>" + value +"</span></p><p><b class='correct'>ANSWER:</b> <span class='qWord lang-en'>" + kq +"</span></p>");
            }
        }else if(this.checked==false){
            $(".add"+id).addClass('wrong-q');
            //$(".add"+id).append("<p><b class='incorrect'>INCORRECT:</b> You gave <span class='incorrect'>no answer</span></p><p><b class='correct'>ANSWER:</b> <span class='qWord lang-en'>" + kq +"</span></p>");
        }
    });
    
    var okk=0;
    $(".textinput").each( function(){
        okk=0;	
        var $this = $(this);
         var val = $this.val();
         var id = $this.attr('id');
         
         var chuoibandau = $(".chuoibandau"+id).val();
         if(chuoibandau.indexOf('#')>0){
             var ss = chuoibandau.split("#");
             for (var i in ss) {
                if(val==ss[i]){
                    okk=1;						
    				break;
                }
            }
         }else{
			if(val==chuoibandau){
				okk=1;
			}
		 }
         if(okk==1){
            $(".add"+id).addClass('right-q');
            $(".dapan"+id).show();
            $(".add"+id).append("<p><b class='correct'>CORRECT:</b> <span class='qWord lang-en'>" + val + "</span></p>");
         }else{
            $(".add"+id).addClass('wrong-q');
            //$(".dapan"+id).show();
            //$(".addy"+id).append("<p><b class='correct'>ANSWER:</b></p>");
         }
    });
    
    $(".submit-button").removeClass("submit-button");
}
//Show box cau hỏi
$('.content').find('.modal-backdrop').live('click',function(){ 
    $(this).hide();
    $(".formshowtestdetail").hide();
});
$('#showquestion').find('.close').live('click',function(){ 
    $('.modal-backdrop').hide();
    $(".formshowtestdetail").hide();        
});