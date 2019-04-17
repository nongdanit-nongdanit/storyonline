<?php 
    echo $this->Html->script(array('../admin/js/plugins/morris/raphael-2.1.0.min','../admin/js/plugins/morris/morris'));
?>
<script>
    $(function(){
        Morris.Line({
          element: 'morris-area-chart',
          data: [
            <?php foreach($dataarray as $k=>$data):?>
                <?php if($k<=9):?>
                { y: '2015-0<?php echo $k;?>', a: <?php echo $data['tong'];?>, },
                <?php else:?>
                { y: '2015-<?php echo $k;?>', a: <?php echo $data['tong'];?>, },
                <?php endif;?>            
            <?php endforeach;?>
          ],
          xkey: 'y',
          ykeys: ['a'],
          labels: ['Số lượng']
        });        
    });
</script>
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
                <i class="fa fa-bar-chart-o fa-fw"></i> Số lượng thành viên đăng ký trong tháng
                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>