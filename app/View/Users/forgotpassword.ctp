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
    <div id="user-login">
        <div id="ucan-login">
            <div id="ucan-login-box">
                <h2>Bạn quên mật khẩu đăng nhập?</h2>
                <p>Vui lòng nhập địa chỉ email mà bạn đã đăng ký tại anhngusinhdong.com</p>
                <?php echo $this->Form->create('User',array('action' => 'forgotpassword','inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                <dl class="front-end-form">
                    <div class="login-form-element">
                        <span id="email-label"><label class="login-form-element-label required">Email</label></span>
                        <?php echo $this->Form->input('email', array('id'=>'email')); ?>
                    </div>                    
                    <input type="submit" name="reg_btn" id="reg_btn" value="Lấy mật khẩu" class="frontend-button">
                </dl>
                <?php
                    echo $this->Form->end();
                ?>
            </div>
        </div>
        <div id="social-login">
            <div id="social-login-box" style="min-height: 182px;">
                <h2>Đăng nhập ngay bằng mạng xã hội</h2>
                <p id="social-login-box-message">Đăng nhập bằng tài khoản mạng xã hội</p>
                <a class="facebook_button submit_button" href="#" id="facebook-login-button">Đăng nhập với Facebook</a>
            </div>
        </div>
    </div>           
</div>
<div class="clearboth"> </div>
<!-- END CONTENT -->