<?php
    echo $this->Html->css(array('jquery.countdown.css'));
    echo $this->Html->script(array('jquery.countdown'));
?>
<script type="text/javascript" language="javascript">
    $(function(){
        //Tìm kiếm
        $('#linkUpdate').click(function(){
            document.forms['appForm'].submit();               
        });
        $(".del").click(function(){
           if(confirm("Bạn có chắc chắn muốn xóa user này?")){
                $('.ajax-loader').show();
                var id = $(this).attr("idx");
                var cla = "#xoa"+id;
                 var url         = <?php echo "'".Router::url('/users/delete')."'"; ?>;
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
        <h1 class="page-header"><?=$title_for_layout?>
            <button onclick="window.location.href='/admin/users/register'" style="float: right;" type="button" class="btn btn-primary">Đăng ký user</button>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                        Tìm kiếm
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <?php echo $this->Form->create('User',array('type'=>'file','id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false))); ?>
                        <div class="form-group">
                            <label>Tên học viên hoặc tên đăng nhập</label>
                            <?php 
                                echo $this->Form->input('name', array('class'=>'form-control','id'=>'pname','maxlength'=>'100'));
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <?php 
                                echo $this->Form->input('email', array('class'=>'form-control','id'=>'','maxlength'=>'100'));
                            ?>
                        </div>
                        <div class="form-group">
                            <label>VIP hay ko</label>
                           <?php
                            $a = array(''=>'Chọn', '0'=>'Không VIP', '1'=>'VIP');
                            echo $this->Form->select('vip',$a, array(
                                'class'=>'form-control',
                                'style'=>'width:150px'
                            ));
                            ?>  
                        </div>
                        <button id="linkUpdate" type="button" class="btn btn-info">Search</button>                    
                    <?php echo $this->Form->end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
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
                                <th>Username</th>                                
                                <!--<th>Email</th>-->
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày kích hoạt</th>
                                <th>Ngày hết hạn</th>
                                <th>Ngày còn hiệu lực</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($user as $key => $value) {
                            ?>
                                    <tr class="gradeC">
                                        <td><?php echo $value['User']['username']; if($value['User']['vip']==1) echo "<span style='color:red;'>VIP</span>";?></td>                                        
                                        <!--<td><?=$value['User']['email']?></td>-->
                                        <td><?=$value['User']['name']?></td>
                                        <td>
                                            <?php
                                                $array = array('0'=>'Không kích hoạt', '1'=>'Kích hoạt');
                                                echo $this->Form->input('active', array(
                                                    'options' => $array,
                                                    'class'=>'form-control activeuser',
                                                    'default' =>$value['User']['active'],
                                                    'id' => $value['User']['user_id'],
                                                    'style' =>'width:120px;',
                                                    'label'=>false
                                                ));
                                            ?>
                                        </td>
                                        <td>
                                            <?php if($value['User']['vip']==1){
                                                echo "<span style='color:blue;'>{$value['Card']['date_updated']}</span>";
                                            }?>
                                            
                                        </td>
                                        <td><?php if($value['User']['vip']==1){
                                            echo "<span style='color:blue;'>{$value['Card']['date_end']}</span>";
                                        }?></td>
                                        <td>
                                            <?php if(!empty($value['User']['vip'])){
                                                if($value['Card']['date_end']< date("Y-m-d H:i:s"))
                                                {
                                                    echo "Hết hạn";
                                                }else{?>                        
                                                    <script type="text/javascript">
                                                     	 jQuery(document).ready(function($){
                                                               var enddate = new Date('<?php echo date("D M d Y H:i:s", strtotime($value['Card']['date_end'])); ?>')
                                                                $('#delashometimes<?php echo $value['User']['user_id']?>').countdown({compact: true, until: enddate, serverSync: function() { return new Date('<?php echo date("D M d Y H:i:s"); ?>'); } });
                                                            });
                                                    </script>
                                                    <div style="color: red;" id='delashometimes<?php echo $value['User']['user_id']?>'></div>
                                            <?php }}?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link('Cập nhật', array('controller'=>'users', 'action'=>'editprofile', $value['User']['user_id']),array('class'=>'btn btn-primary')); ?>
                                            <?php echo $this->Html->link('Xóa',"javascript:void(0)",array('class'=>'btn btn-danger del', 'id'=>"xoa".$value['User']['user_id'],'idx'=>$value['User']['user_id'])); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
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

</div>
    <!-- /#wrapper -->