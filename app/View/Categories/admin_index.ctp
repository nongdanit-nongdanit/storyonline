
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="">
                            <thead>
                                <tr>
                                    <th>Tên danh mục</th>
                                    
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cat as $key => $val){
                                    ?>
                                        <tr class="gradeC">
                                            <td><?php echo $val;?></td>
                                            
                                            <td>
                                                <?php echo $this->Html->link('Cập nhật',array('controller'=>'categories','action'=>'edit',$key))?> | <?php echo $this->Html->link('Xóa',"#",array('class'=>'delete', 'idx'=>$key, 'id'=> "xoa".$key))?>
                                            </td>                                                    
                                            
                                        </tr>
                                  <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    
    
    <!-- /.row -->
    
</div>
        <!-- /#page-wrapper -->

<script>
$(function(){
    $(".delete").click(function(){
        if(confirm("Bạn có chắc chắn xóa?")){
            var idx = $(this).attr("idx");
            var t = "#xoa"+idx;
            var url         = <?php echo "'".Router::url('/categories/del')."'"; ?>;
            $.post(url,{'id':idx}, function(re){
                data = jQuery.parseJSON(re);
                if(data=="T")
                {
                    $(t).parent().parent().remove();
                    
                }else
                {
                    alert("Có lỗi xảy ra vui lòng thử lại");
                }          
            });
        }else return false;
    });
});
    
</script>

</div>
    <!-- /#wrapper -->

