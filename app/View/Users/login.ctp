<!-- CONTENT -->
		<div id="content_area" class="sitewidth centerme">
		<div class="guide-cod">
            <a class="box-guide" style="text-align: left; padding-left: 20px;">
              -  Nếu bạn đã đăng ký lần đầu bằng Facebook, vui lòng click vào đăng nhập vào facebook bên phải.<br />
              -  Nếu bạn không có đăng ký bằng Facebook vui lòng đăng nhập bằng tên đăng nhập và mật khẩu bên trái. 
            </a>
        </div>
        <div id="user-login">
    <div id="ucan-login">
        <div id="ucan-login-box">
            <h2>Đăng nhập vào AnhNguSinhDong.Com</h2>
            <p>Nhập thông tin về tên đăng nhập và mật khẩu của bạn.</p>
            <?php echo $this->Form->create('User',array('action' => 'login','inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
            <dl class="front-end-form">
                <div class="login-form-element">
                    <span id="email-label"><label class="login-form-element-label required">Tên đăng nhập</label></span>
                    <?php //echo $this->Form->input('email', array('id'=>'email')); ?>
                    <?php echo $this->Form->input('username'); ?>
                </div>
                <div class="login-form-element">
                    <span id="password-label"><label class="login-form-element-label required">Password</label></span>
                    <?php
                        echo $this->Form->input('password',array('id'=>'txtpass', 'class'=>'', 'type'=>'password'));
                    ?>
                </div>
                
                <input type="submit" name="reg_btn" id="reg_btn" value="Đăng nhập" class="frontend-button">
            </dl>
<?php
    echo $this->Form->end();
?>
<a id="forgot-password" href="/quen-mat-khau">Bấm vào đây nếu bạn quên mật khẩu?</a>
        </div>
    </div>
    <div id="social-login">
        <div id="social-login-box" style="min-height: 275px;">
            <h2>Đăng nhập ngay bằng mạng xã hội</h2>
            <p id="social-login-box-message">Đăng nhập bằng tài khoản mạng xã hội</p>
            <!--            <div id="social-login-methods">-->
            <a class="facebook_button submit_button" href="#" id="facebook-login-button">Đăng nhập với Facebook</a>
            <!--            </div>-->
        </div>
    </div>
</div>           
		</div>
		<div class="clearboth"> </div>
<!-- END CONTENT -->