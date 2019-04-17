
<div class="container">
        <div class="row">
            <h1 style="text-align: center; color: red;">Website đang bảo trì, vui lòng quay lại sau ^-^</h1>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?=$this->Session->flash();?>
                        <?=$this->Form->create();?>
                            <fieldset>
                                <div class="form-group">
                                    <?=$this->Form->input('username',array('class'=>"form-control", "placeholder"=>"Username", "autofocus",'style'=>"width:100%;"));?>
                                </div>
                                <div class="form-group">
                                    <?=$this->Form->input('password', array('type'=>'password',"class"=>"form-control", "placeholder"=>"Password",'style'=>"width:100%;"));?>
                                </div>
                                <!--
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        <?=$this->Form->end('Login',array('class'=>'btn btn-lg btn-success btn-block'))?>
                    </div>
                </div>
            </div>
        </div>
    </div>