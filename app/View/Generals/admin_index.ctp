<style>
    input.form-control, select.form-control{
        width: 100%;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$title_for_layout; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php echo $this->Form->create('General',array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin chung website
            </div>
            <div class="panel-body">
                <!--<div class="row">
                    <div class="col-lg-12">
                        
                            <div class="form-group">
                                <label>Tên website</label>
                                <?php 
                                    echo $this->Form->input('name', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['name']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Tên công ty</label>
                                <?php 
                                    echo $this->Form->input('site_name', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['site_name']));
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <?php 
                                echo $this->Form->textarea('description', array('class'=>'form-control ckeditor','value'=>$data['General'] ['description']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Hotline</label>
                                <?php 
                                    echo $this->Form->input('hotline', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['hotline']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <?php 
                                    echo $this->Form->input('keywords', array('class'=>'form-control','id'=>'inputName','value'=>$data['General'] ['keywords']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <?php 
                                    echo $this->Form->input('email', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['email']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <?php 
                                    echo $this->Form->input('phone', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['phone']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <?php 
                                    echo $this->Form->input('fax', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['fax']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <?php 
                                    echo $this->Form->input('address', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['address']));
                                ?>
                            </div>                            
                    </div>
                    
                    
                </div>    -->          
                
                <!--<div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin smtp
                                
                            </div>
                            
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <?php 
                                        echo $this->Form->input('smtp_username', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['smtp_username']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <?php 
                                        echo $this->Form->input('smtp_password', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['smtp_password']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Host</label>
                                    <?php 
                                        echo $this->Form->input('smtp_host', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['smtp_host']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Port</label>
                                    <?php 
                                        echo $this->Form->input('smtp_port', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['smtp_port']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Giao thức kết nối</label>
                                    <?php 
                                        echo $this->Form->input('smtp_ssl', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['smtp_ssl']));
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Mạng xã hội
                            </div>
                            
                            <div class="panel-body">
                            
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <?php 
                                        echo $this->Form->input('facebook', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['facebook']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Google</label>
                                    <?php 
                                        echo $this->Form->input('googleplus', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['googleplus']));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Google analytic</label>
                                    <?php 
                                        echo $this->Form->input('google_analytic', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100','value'=>$data['General'] ['google_analytic']));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>-->
                
                <div class="row">                
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Bên lấy
                                
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Tên truyện cho</label>
                                    <select class="form-control" name="data[Udv_category][catId]">
                                        <?php if(!empty($dataUdv_category)):?>
                                        <?php foreach($dataUdv_category as $row):?>
                                            <option value="<?php echo $row['Udv_category']['catId']?>"><?php echo $row['Udv_category']['catName']?></option>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    
                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Bên nhận
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                            
                                <div class="form-group">
                                    <label>Danh mục nhận</label>
                                    <select class="form-control" name="data[Udv_category][category_id]">
                                        <?php if(!empty($dataCategory)):?>
                                        <?php foreach($dataCategory as $row):?>
                                            <option value="<?php echo $row['Category']['category_id']?>"><?php echo $row['Category']['name']?></option>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    
                                    
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        
                    </div>
                    <!-- /.col-lg-4 -->
                
                
                
                
                </div>
                
                
                <button type="submit" class="btn btn-success">Save</button>
                        
                
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
    <!-- /.row -->
<?php echo $this->Form->end();?>
</div>