<!-- CONTENT -->
<div id="content_area" class="sitewidth centerme">     
     <div id="user-login">
        <div id="ucan-login">
            <div id="ucan-login-box">
                <h2>Đăng ký tài khoản mới</h2>
                <p>Hãy điền vào form dưới đây để đăng ký một tài khoản mới.</p>
                <?php echo $this->Form->create('User',array('action' => 'register','inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                <dl class="front-end-form">
                    <div class="login-form-element"><span id="username-label"><label class="login-form-element-label required">Tên đăng nhập *</label></span>
                        <?php echo $this->Form->input('username',array('style'=>'width:300px;')); ?>
                    </div>
                    <div class="login-form-element"><span id="password-label"><label class="login-form-element-label required">Mật khẩu mới *</label></span>
                        <?php echo $this->Form->input('password', array('id'=>'password','style'=>'width:300px;')); ?>
                    </div>
                    <div class="login-form-element"><span id="passwordVerify-label"><label class="login-form-element-label required">Nhập lại mật khẩu *</label></span>
                        <?php echo $this->Form->input('confirm_password', array('style'=>'width:300px;','type'=>'password', 'id'=>'passwordVerify')); ?>
                    </div>
                    <div class="login-form-element"><span id="fullname-label"><label class="login-form-element-label required">Họ và tên *</label></span>
                        <?php echo $this->Form->input('name', array('id'=>'full-name','style'=>'width:300px;')); ?>
                    </div> 
                    <div class="login-form-element"><span id="email-label"><label class="login-form-element-label required">Email *</label></span>
                        <?php echo $this->Form->input('email', array('id'=>'email','style'=>'width:300px;')); ?>
                    </div>
                    <div class="login-form-element">
                        <?php echo $this->Form->checkbox('note', array('id'=>'email')); ?><a>Đồng ý với quy định sử dụng của Anh Ngữ Sinh Động</a>
                        <?php if(!empty($note)){
                            echo "<div class=\"error-message\">{$note}</div>";
                        }?>
                    </div>
                    
                           
                        <?php echo $this->Form->submit('Đăng ký', array('type'=>'submit','class'=>'frontend-button register_button','id'=>'reg_btn'));?>
                </dl>
            <?php
                echo $this->Form->end();
            ?>
            </div>
        </div>
        <div id="social-login">
            <div id="social-login-box" style="min-height: 455px;">
                <h2>Đăng ký ngay bằng Facebook</h2>
                <p id="social-login-box-message" style="margin-bottom: 120px;">Đăng ký bằng tài khoản Facebook</p>
                <a class="facebook_button submit_button" href="#" id="facebook-login-button">Đăng ký nhanh bằng Facebook của bạn</a>
            </div>
        </div>
    </div> 
     
     
     
</div>
<div class="clearboth"> </div>
<script type="text/javascript" language="javascript">
    $(function(){
        //$(".error-message").hide(5000);
    })
</script>
<!-- END CONTENT -->