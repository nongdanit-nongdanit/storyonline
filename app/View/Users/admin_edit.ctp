
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
                            Cập nhật thông tin cá nhân
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <?php echo $this->Form->input('username', array('class'=>'form-control', 'readonly' => true)); ?>   
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <?php echo $this->Form->input('email', array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Full name</label>
                                            <?php echo $this->Form->input('name', array('class'=>'form-control')); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Quyền</label>
                                            <?php
                                            //$op = array("1"=>"Admin", "2"=>"Giáo viên", "3"=>"Học viên");
                                            echo $this->Form->input('role_id', array('options'=> $arrRoles, 'class'=>'form-control','disabled'=>'disabled')); ?>
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