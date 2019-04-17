<script type="text/javascript" language="javascript">
    $(function(){
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
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th>Quyền</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($user as $key => $value) {
                                            if($value['User']['active']==1){
                                                $status="Kích hoạt";
                                            }else{
                                                $status="Không kích hoạt";
                                            }
                                        ?>
                                                <tr class="gradeC">
                                                    <td><?=$value['User']['username']?></td>
                                                    <td><?=$value['User']['name']?></td>
                                                    <td><?=$value['User']['email']?></td>
                                                    <td><?=$status?></td>
                                                    <td><?=$value['Role']['name']?></td>
                                                    <th>
                                                        <?php echo $this->Html->link('Cập nhật', array('controller'=>'users', 'action'=>'editprofile', $value['User']['user_id']),array('class'=>'btn btn-primary')); ?>
                                                        <?php echo $this->Html->link('Xóa',"javascript:void(0)",array('class'=>'btn btn-danger del', 'id'=>"xoa".$value['User']['user_id'],'idx'=>$value['User']['user_id'])); ?>
                                                    </th>
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
<!--
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="400" height="150" id="recorder" align="middle">
	<param name="movie" value="http://www.tienganh123.com/includes/v1/recorder.swf">
	<param name="quality" value="high">
	<param name="bgcolor" value="#ffffff"> 
	<param name="play" value="true">
	<param name="loop" value="true">
	<param name="wmode" value="window">
	<param name="scale" value="showall">
	<param name="menu" value="true">
	<param name="devicefont" value="false">
	<param name="salign" value="">
	<param name="allowScriptAccess" value="sameDomain">
	<param name="flashvars" value="max_time=600&amp;filename=0_1648917_13036&amp;rtmp_server=rtmp://audio.tienganh123.com:1935/tienganh123&amp;save_path=http://cakeflybook/0_1648917_13036/rr">
	
	<embed type="application/x-shockwave-flash" src="http://www.tienganh123.com/includes/v1/recorder.swf" width="400" height="150" quality="high" bgcolor="#ffffff" play="true" loop="true" wmode="window" scale="showall" menu="true" devicefont="false" salign="" allowscriptaccess="sameDomain" flashvars="max_time=600&amp;filename=0_1648917_13036&amp;rtmp_server=rtmp://audio.tienganh123.com:1935/tienganh123&amp;save_path=http://cakeflybook/0_1648917_13036/rr">
    
</object>-->