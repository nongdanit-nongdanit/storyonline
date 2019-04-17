            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$title_for_layout; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->Form->create('Category',array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
                                            <?php 
                                                echo $this->Form->input('name', array('class'=>'form-control','id'=>'inputName', 'maxlength'=>'100'));
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Vị trí</label>
                                            <?php 
                                            echo $this->Form->input('ordering', array('onkeypress'=>'return check(event);','class'=>'form-control width200','id'=>'ordering','maxlength'=>'20'));
                                            ?>
                                            <?php if(!empty($error['ordering'])):?>
                                            <span class="error_su"><?php echo $error['ordering'];?></span>
                                            <?php endif;?>
                                        </div>

                                        <div class="form-group">
                                            <label>Chọn chương trình</label>
                                            <?php echo $this->Form->select('parent_id',$result,array('class'=>'form-control','empty'=>array('0'=>"")));?>  
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <?php 
                                            echo $this->Form->textarea('description', array('class'=>'form-control ckeditor','id'=>'description'));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <?php
                                                $options = array('1' => 'Kích hoạt', '0' => 'Không kích hoạt');
                                                echo $this->Form->select('active', $options, array('class'=>'form-control','empty'=>false));
                                            ?>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" onclick="window.location.href='/admin/categories/index'" class="btn btn-info">Danh sách</button>
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