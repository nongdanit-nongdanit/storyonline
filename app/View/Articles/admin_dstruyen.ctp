<script type="text/javascript">
$(document).ready(function () {    
    $('#linkUpdate').click(function(){
        document.forms['appForm'].submit();  
    });   
});
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout; ?>
                <button onclick="window.location.href='/admin/articles/index'" style="float: right;" type="button" class="btn btn-primary">Danh sách</button>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cập nhật danh sách truyện
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                echo $this->Form->create('Article', array('type'=>'file', 'id'=>'appForm', 'name'=>'appForm', 'inputDefaults' => array(
                                    'label' => false,
                                    'div' => false
                                )));
                            ?>
                                <div class="form-group">
                                    <label>Url thể loại</label>
                                    <?php 
                                        echo $this->Form->input('url_link', array('class'=>'form-control','id'=>'pname', 'maxlength'=>'100'));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Danh sách thể loại</label>
                                    <?php                                        
                                        echo $this->Form->input('category_id', array(
                                            'options' =>  $dataTheLoai,
                                            'class'=>'form-control'
                                        ));
                                    ?>
                                </div>
                                <button id="linkUpdate" type="button" class="btn btn-success">Save</button>
                                <button type="button" onclick="window.location.href='/admin/articles/index'" class="btn btn-info">Danh sách</button>
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