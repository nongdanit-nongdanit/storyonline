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
                    Cập nhật danh sách chương truyện
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
                                    <label>ID truyen</label>
                                    <?php 
                                        echo $this->Form->input('id_chap', array('class'=>'form-control','id'=>'id_chap'));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Url truyện</label>
                                    <?php 
                                        echo $this->Form->input('url_link', array('class'=>'form-control','id'=>'url_link'));
                                    ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Alt image</label>
                                    <?php 
                                        echo $this->Form->input('alt', array('class'=>'form-control','id'=>'alt', 'maxlength'=>'100'));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Xử lý</label>
                                    <?php                 
                                    $array = array('1'=> 'Add', '2'=> 'Update');                       
                                        echo $this->Form->input('action', array(
                                            'options' =>  $array,
                                            'class'=>'form-control'
                                        ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>ID Articles URL</label>
                                    <?php 
                                        echo $this->Form->input('idURL', array('class'=>'form-control'));
                                    ?>
                                </div>
                                <button id="linkUpdate" type="button" class="btn btn-success">Save</button>
                                
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