

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$title_for_layout; ?>
                    <?php if($current_user['role_id']==1){?>
                    <button onclick="window.location.href='/admin/users/index'" style="float: right;" type="button" class="btn btn-primary">Danh sách</button>
                    <?php }?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thay đổi mật khẩu
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <?php echo $this->Form->input('currentpassword', array('type'=>'password', 'class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>New Password</label>
                                            <?php echo $this->Form->input('password', array('type'=>'password', 'class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'class'=>'form-control')); ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Save</button>
                                    <?php echo $this->Form->end();?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>