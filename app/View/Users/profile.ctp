<div class="clearboth"> </div>
<div class="header__breadcrumb">
    <div class="header__breadcrumb__wrapper">
        <ul>                    
            <?php echo $this->element('breadcrumbs');?>     
        </ul>
    </div>
</div>
<div class="clearboth"> </div>
<!-- CONTENT -->
<div id="content_area" class="sitewidth centerme">
    <div class="wrapper-profile util-clearfix profile-user-account">
        <?php 
            echo $this->element('sohocba/sidebar');
        ?>
        <?php echo $this->Form->create('User',array('action' => 'profile','id'=>'imageform','inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
            <div class="right-profile">
                <div class="ttl-box-profile">Thông tin tài khoản</div>
                <div class="cont-user-account util-clearfix">
                    <div class="img-user">
                        <?php
                            echo $this->Html->css(array('uploadify.css','jquery.countdown.css'));
                            echo $this->Html->script(array('uploadify/jquery.uploadify','jquery.countdown'));
                        ?>
                        
                        <script type="text/javascript">
                            $(document).ready(function () {
                                var path = "<?php echo $this->Html->url("/app/webroot/js/uploadify/"); ?>";
                                $('#pimage').uploadify({
                                    auto                : true,
                                    queueSizeLimit      : 1,
                                    buttonText          : 'Upload hình',
                                    fileSizeLimit       : '30KB',
                            		swf                 : path + 'uploadify.swf',
                            		//ploader             : "<?php echo $this->Html->url('/users/uploadify/'); ?>",
                                    uploader            : "<?php echo $this->Html->url('/users/uploadify/'.session_id()); ?>",
                            		width               : 100,
                                    height              : 25,
                                    fileTypeDesc        : 'Image Files',
                                    fileTypeExts        : '*.gif; *.jpg; *.png',
                                    onUploadSuccess     : function(file, data, response) {
                                        $('#hdimage').val(data);             
                                        $("#imageform img").attr('src','/img/avatars/' + data);                                                                 
                                    }
                                });
                                
                                $("#city_id").change(function(){
                        			var th=$(this).val();
                                    if(th!=0){
                                        var url         = <?php echo "'".Router::url('/users/getchildcate')."'"; ?>;
                                        $.post(url,{'id':th}, function(data){
                            			     $("#distict").html(data);
                                        });	
                                    }                    
                                    		
                        		});
                                
                            });                        
                        </script>
                        <?php if(!empty($nguoidung['User']['image'])){?>
                        <?php echo $this->Html->image('avatars/'.$nguoidung['User']['image'],  array('class'=>'img-avatar'));?>
                        <?php }else{
                            if(!empty($nguoidung['User']['code'])){
                                echo '<img src="https://graph.facebook.com/'. $nguoidung['User']['code'] .'/picture" class="img-avatar"/>';
                            }else{
                                echo $this->Html->image('avatars/user-default.gif',  array('class'=>'img-avatar'));
                            }
                        }?>
                        <?php
                            echo $this->Form->file('image2', array('id'=>'pimage', 'style'=>'opacity:100'));
                            //echo $this->Form->hidden('image', array('id'=>'hdimage')); 
                        ?>
                        <!--<p><a href="javascript:$('#pimage').uploadify('upload')">Upload Files</a></p>-->        
    	            </div>
                    <div class="user-inf">
                        <div class="row-inf">
    	                	<label>Họ và tên:</label>
                            <?php echo $this->Form->input('name', array('class'=>'firstname', 'id'=>'firstname','disabled'=>'disabled')); ?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Email:</label>
                            <?php echo $this->Form->input('email', array('class'=>'','disabled'=>'disabled')); ?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Địa chỉ:</label>
                            <?php echo $this->Form->input('address', array('class'=>'')); ?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Tỉnh/thành phố:</label>
                            <?php //echo $this->Form->select('city_id',$arrCity, array('class'=>'sub-option-inf')); ?>
                            
                            <select name="data[User][city_id]" id="city_id" class="sub-option-inf">
                                <option value="0">Tùy chọn</option>
                                <?php foreach($arrCity as $da):?>
                                <option <?php if($nguoidung['User'] ['city_id']== $da['City']['city_id']) echo "selected";?> value="<?php echo $da['City'] ['city_id']?>"><?php echo $da['City'] ['name'];?></option>
                                <?php endforeach;?>
                            </select>
                            
    	                </div>
                        <div class="row-inf">
    	                	<label>Quận/huyện:</label>                            
                            <select name="data[User][distict]" id="distict" class="sub-option-inf" style="width: 200px;">
                                    <option value="0">Tùy chọn</option>
                                    <?php foreach($arrDistict as $da):?>
                                    <option <?php if($nguoidung['User'] ['distict']== $da['City']['city_id']) echo "selected";?> value="<?php echo $da['City'] ['city_id']?>"><?php echo $da['City'] ['name'];?></option>
                                    <?php endforeach;?>
                            </select>                            
    	                </div>                                
                        <div class="row-inf">
    	                	<label>Số điện thoại:</label>
                             <?php echo $this->Form->input('phone', array('class'=>'firstname','id'=>'phone','maxlength'=>11)); ?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Ngày tháng năm sinh:</label>
                             <?php echo $this->Form->input('birthday', array(
                                'dateFormat' => 'DMY',
                                'minYear' => date('Y') - 70,
                                'maxYear' => date('Y') + 1,
                                'separator' => ' ',
                                'class'=>'sub-option-inf',
                            ));?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Giới tính</label>
                            <?php
                                $options = array('0' => 'Nam', '1' => 'Nữ');
                                echo $this->Form->select('sex', $options, array('id'=>'sex','class'=>'sub-option-inf','empty'=>false));
                            ?>
    	                </div>
                        <div class="row-inf">
    	                	<label>Nghề nghiệp:</label>
                            <select name="data[User][business]" class="sub-option-inf" id="business" style="width: 200px;">
                                <option <?php if($nguoidung["User"] ['business']==0) echo 'selected';?> value="0">Vui lòng chọn</option>
                                <option <?php if($nguoidung["User"] ['business']==1) echo 'selected';?> value="1">Học sinh tiểu học</option>
                                <option <?php if($nguoidung["User"] ['business']==2) echo 'selected';?> value="2">Học sinh THCS</option>
                                <option <?php if($nguoidung["User"] ['business']==3) echo 'selected';?> value="3">Học sinh THPT</option>
                                <option <?php if($nguoidung["User"] ['business']==4) echo 'selected';?> value="4">Sinh viên</option>
                                <option <?php if($nguoidung["User"] ['business']==5) echo 'selected';?> value="5">Giáo viên</option>
                                <option <?php if($nguoidung["User"] ['business']==6) echo 'selected';?> value="6">Nhân viên văn phòng</option>
                                <option <?php if($nguoidung["User"] ['business']==7) echo 'selected';?> value="7">Quản lý</option>
                                <option <?php if($nguoidung["User"] ['business']==8) echo 'selected';?> value="8">Khác</option>
                            </select>
    	                </div>
                        
                        <?php if($nguoidung["User"] ['vip']==1){?>
                        <div class="row-inf">
    	                	<label>Ngày kích hoạt: </label>
                            <span><?php echo $nguoidung['Card'] ['date_updated'];?></span>
    	                </div>
                        <div class="row-inf">
    	                	<label>Ngày hết hạn: </label>
                            <span><?php echo $nguoidung['Card'] ['date_end'];?></span>
    	                </div>
                        <div class="row-inf">
    	                	<label>Số ngày còn hiệu lực: </label>
                            <span style="color: red;" id="delashometimes"></span>
                            <script type="text/javascript">
                         	 jQuery(document).ready(function($){
                                   var enddate = new Date('<?php echo date("D M d Y H:i:s", strtotime($nguoidung['Card']['date_end'])); ?>')
                                    $('#delashometimes').countdown({compact: true, until: enddate, serverSync: function() { return new Date('<?php echo date("D M d Y H:i:s"); ?>'); } });
                                });
                        </script>
    	                </div>
                        <?php }?>
                        <div class="row-inf">
    	                	<label>&nbsp;</label>
    	                    <button class="bt-save">Lưu thông tin</button>
    	                </div>
                        
                    </div>
                    
                </div>
            </div>
        <?php echo $this->Form->end();?>
    </div>
</div>
<div class="clearboth"> </div>
<!-- END CONTENT -->