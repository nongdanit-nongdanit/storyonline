<?php $data = $this->requestAction('/hoidaps/traloicommentadmin/'.$hoidaps_id);
if(count($data)>0){
?>
<table class="table table-striped table-bordered table-hover">
    <th>STT</th>
    <th>Tên học viên</th>
    <th>Nội dung trả lời</th>
    <th>Ngày comment</th>
    <th>Số lượng like</th>
    <th>Vi phạm</th>
    <th>Trạng thái</th>
    <th>Tác vụ</th>
    <?php $i=1; foreach($data as $v){?>
    <tr>
        <td><?php echo $i;?></td>
        <td >
            <?php echo $v['User'] ['name'];?>
        </td>
        <td >
            <?php echo $v['Hoidapcomment'] ['comment'];?>
        </td>
        <td colspan="">
            <?php echo $v['Hoidapcomment'] ['created'];?>
        </td>
        <td colspan="">
            <?php echo $v['Hoidapcomment'] ['liked'];?>
        </td>
        <td>
            <?php if($v['Hoidapcomment']['violate']==1){$s = "background:#F1DEDE;";}else{ $s = "";}
                $array = array('0'=>'Không vi phạm', '1'=>'Vi phạm');
                echo $this->Form->input('violate', array(
                    'options' => $array,
                    'class'=>'form-control violate',
                    'default' =>$v['Hoidapcomment']['violate'],
                    'idx' => $v['Hoidapcomment']['hoidapcomments_id'],
                    'subien' =>2,
                    'style' =>'width:145px;'.$s.'',
                ));
            ?>
        </td>
        <td>
            <?php
                $array = array('0'=>'Không kích hoạt', '1'=>'Kích hoạt');
                echo $this->Form->input('active', array(
                    'options' => $array,
                    'class'=>'form-control active',
                    'default' =>$v['Hoidapcomment']['active'],
                    'idx' => $v['Hoidapcomment']['hoidapcomments_id'],
                    'subien' =>2,
                    'style'=>'width:165px;'
                ));
            ?>
        </td>
        <td>
            <?php echo $this->Html->link('Xóa',"javascript:void(0)",array('class'=>'btn btn-danger del2 xoa2'.$v['Hoidapcomment']['hoidapcomments_id'], 'id'=> $v['Hoidapcomment']['hoidapcomments_id'])); ?>
        </td>
    </tr>
    <?php $i++; }?>
</table>
<?php }?>
