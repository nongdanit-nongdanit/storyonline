<script type="text/javascript">
$(document).ready(function (){   
    $('#linkUpdate').click(function(){
        document.forms['appForm'].submit(); 
    });    
    var giatri = $("#role_id").val();
    if(giatri==2){
        $("#chuongtrinh-form").show();
    }else{ $("#chuongtrinh-form").hide();}
    $("#role_id").change(function(){
       var value = $(this).val();
       if(value==2){
            $("#chuongtrinh-form").show();
       }else{
            $("#chuongtrinh-form").hide();
       }
    });
});
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout; ?>
                <button onclick="window.location.href='/admin/users/index'" style="float: right;" type="button" class="btn btn-primary">Danh sách</button>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Thêm user quản lý
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <?php echo $this->Form->input('username', array('class'=>'form-control')); ?> 
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <?php echo $this->Form->input('password', array('class'=>'form-control')); ?>
                                </div>                                
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'class'=>'form-control')); ?>
                                    <span id="err_confirm_password" class="error"></span>
                                    <?php if(!empty($error['confirm_password'])):?>
                                    <span class="error_su"><?php echo $error['confirm_password'];?></span>
                                    <?php endif;?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                   <?php echo $this->Form->input('name', array('class'=>'form-control', )); ?>
                                    <span id="err_name" class="error"></span>       
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>Email:</label><br />
                                    <?php echo $this->Form->input('email', array('class'=>'form-control')); ?>
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Quyền:</label><br />
                                    <?php
                                        echo $this->Form->input('role_id',array(
                                            'options' => $arrRole,
                                            'class'=>'form-control',
                                            'id'=>'role_id'                                         
                                        ));
                                    ?>
                                </div>
                                <div class="form-group" id="chuongtrinh-form" style="display: none;">
                                    <label>Quản lý chương trình:</label><br />
                                    <?php
                                        echo $this->Form->input('category_id',array(
                                            'options' => $arrCategories,
                                            'class'=>'form-control',
                                            'id'=>'category_id'                                        
                                        ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <?php
                                        $options = array('1' => 'Kích hoạt', '0' => 'Không kích hoạt');
                                        echo $this->Form->select('active', $options, array('class'=>'form-control','empty'=>false));
                                    ?>
                                </div>
                                <button id="linkUpdate" type="button" class="btn btn-success">Save</button>
                                <button type="button" onclick="window.location.href='/admin/tests/index'" class="btn btn-info">Danh sách</button>
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