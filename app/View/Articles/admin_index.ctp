<script type="text/javascript" language="javascript">
    $(function(){
        //Thay doi so thu tự
        $('.ishome').change(function(){
            $('.ajax-loader').show();
            var value  = $(this).val();
            var id = $(this).attr("idx");
            var url         = <?php echo "'".Router::url('/articles/ishome')."'"; ?>;
            $.post(url,{'id':id,'val':value}, function(re){
                data = jQuery.parseJSON(re);
                if(data=="T")
                {
                    $('.ajax-loader').hide();
                }else
                {
                    alert("Có lỗi xảy ra vui lòng thử lại");$('.ajax-loader').hide();
                }
            });
        });
        $('.ishot').change(function(){
            $('.ajax-loader').show();
            var value  = $(this).val();
            var id = $(this).attr("idx");
            var url         = <?php echo "'".Router::url('/articles/ishot')."'"; ?>;
            $.post(url,{'id':id,'val':value}, function(re){
                data = jQuery.parseJSON(re);
                if(data=="T")
                {
                    $('.ajax-loader').hide();
                }else
                {
                    alert("Có lỗi xảy ra vui lòng thử lại");$('.ajax-loader').hide();
                }
            });
        });
        $('.no_clone').change(function(){
            $('.ajax-loader').show();
            var value  = $(this).val();
            var id = $(this).attr("idx");
            var url         = <?php echo "'".Router::url('/articles/noclone')."'"; ?>;
            $.post(url,{'id':id,'val':value}, function(re){
                data = jQuery.parseJSON(re);
                if(data=="T")
                {
                    $('.ajax-loader').hide();
                }else
                {
                    alert("Có lỗi xảy ra vui lòng thử lại");$('.ajax-loader').hide();
                }
            });
        });
        //Clone dữ liệu
        $(".clone").click(function(){
           if(confirm("Bạn có chắc chắn?")){
                $('.ajax-loader').show();
                var id = $(this).attr("idx");
                var cla = "#clone"+id;
                 var url         = <?php echo "'".Router::url('/articles/clonechap')."'"; ?>;
                $.post(url,{'id':id}, function(re){
                    data = jQuery.parseJSON(re);
                    if(data=="T")
                    {
                        $('.ajax-loader').hide();
                        
                    }else
                    {
                        alert("Có lỗi xảy ra vui lòng thử lại");$('.ajax-loader').hide();
                    } 
                });
           } 
        });
        //Xóa
        $(".delete").click(function(){
           if(confirm("Bạn có chắc chắn muốn xóa?")){
                $('.ajax-loader').show();
                var id = $(this).attr("idx");
                var cla = "#xoa"+id;
                 var url         = <?php echo "'".Router::url('/articles/delete')."'"; ?>;
                $.post(url,{'id':id}, function(re){
                    data = jQuery.parseJSON(re);
                    if(data=="T")
                    {
                        $('.ajax-loader').hide();
                        $(cla).parent().parent().remove();
                    }else
                    {
                        alert("Có lỗi xảy ra vui lòng thử lại");$('.ajax-loader').hide();
                    } 
                });
           } 
        });
    })
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout?><button onclick="window.location.href='/admin/articles/add'" style="float: right;" type="button" class="btn btn-primary">Thêm trang con</button></h1>
            
        </div>        
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách                   
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>End chap</th>
                                    
                                    <th>Home</th>
                                    <th>Hot</th>
                                    <th>No clone</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($data as $row):
                                $type = $row['Article']['type'];
                                if($type == 1){
                                    $dir = "story_text";
                                }elseif($type == 2){
                                    $dir = "story";
                                }
                                ?>
                                <tr class="gradeC">
                                    <td>
                                    <?php $name_img =  $DataComponent->get_image_story($row['Article']['id'].'.jpg', $dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$row['Article']['name'],'style'=>"width:100px;height:100px;"));
                                            ?>
                                    </td>
                                    <td><?php echo $DataComponent->subString($DataComponent->showNameArticles($row['Article']['name']),20);?></td>
                                    <td><?php echo $row['Article']['text_chap_end']?></td>
                                    
                                    <td>
                                        <?php 
                                            echo $this->Form->input('ishome', array(
                                            'class'=>'form-control ishome',
                                            'id'=>'ishome',
                                            'value'=>$row['Article']['ishome'],
                                            'idx'=>$row['Article'] ['id'],
                                            'label'=>false,
                                            'style'=>"width:80px;",
                                            'onkeypress'=>'return check(event);',
                                            )
                                        );
                                            ?>
                                    </td> 
                                    <td>
                                        <?php 
                                            echo $this->Form->input('ishot', array(
                                            'class'=>'form-control ishot',
                                            'id'=>'ishot',
                                            'value'=>$row['Article']['ishot'],
                                            'idx'=>$row['Article'] ['id'],
                                            'label'=>false,
                                            'style'=>"width:80px;",
                                            'onkeypress'=>'return check(event);',
                                            )
                                        );
                                            ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo $this->Form->input('no_clone', array(
                                            'class'=>'form-control no_clone',
                                            'id'=>'no_clone',
                                            'value'=>$row['Article']['no_clone'],
                                            'idx'=>$row['Article'] ['id'],
                                            'label'=>false,
                                            'style'=>"width:80px;",
                                            'onkeypress'=>'return check(event);',
                                            )
                                        );
                                            ?>
                                    </td>
                                    <td><?php echo $this->Html->link('Xóa',"JavaScript:void(0);",array('class'=>'btn btn-danger delete', 'idx'=>$row['Article']['id'], 'id'=> "xoa".$row['Article']['id']))?>
                                    <?php echo $this->Html->link('Clone',"JavaScript:void(0);",array('class'=>'btn btn-warning clone', 'idx'=>$row['Article']['id'], 'id'=> "clone".$row['Article']['id']))?>
                                    </td> 
                                </tr>
                                <?php endforeach;?>
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