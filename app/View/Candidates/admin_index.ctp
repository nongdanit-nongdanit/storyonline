<script type="text/javascript" language="javascript">
    $(function(){
        //Xóa
        $(".delete").click(function(){
           if(confirm("OK or Cancel?")){
                $('.ajax-loader').show();
                var id = $(this).attr("idx");
                var cla = "#xoa"+id;
                 var url         = <?php echo "'".Router::url('/candidates/delete')."'"; ?>;
                $.post(url,{'id':id}, function(re){
                    data = jQuery.parseJSON(re);
                    if(data=="T")
                    {
                        $('.ajax-loader').hide();
                        $(cla).parent().parent().remove();
                    }else
                    {
                        alert("Error");$('.ajax-loader').hide();
                    } 
                });
           } 
        });
        
    })
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout?><button onclick="window.location.href='/admin/candidates/add'" style="float: right;" type="button" class="btn btn-primary">Add candidates</button></h1>
            
        </div>        
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    List                 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($data as $row):
                                ?>
                               <tr class="gradeC">
                                    <td><?php echo $row['Candidate']['name'];?></td>
                                    <td><?php echo $row['Candidate']['company'];?></td>
                                    <td><?php echo $row['Candidate']['title']?></td>
                                    <td><?php echo $row['Candidate']['email']?></td>
                                    <td><?php echo $DataComponent->showPhone($row['Candidate']['phone']);?></td>
                                    <td><?php echo $this->Html->link('Del',"JavaScript:void(0);",array('class'=>'btn btn-danger delete', 'idx'=>$row['Candidate']['id'], 'id'=> "xoa".$row['Candidate']['id']))?>
                                    
                                    <?php echo $this->Html->link('Edit', array('controller'=>'candidates', 'action'=>'edit', $row['Candidate']['id']),array('class'=>'btn btn-primary')); ?>
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