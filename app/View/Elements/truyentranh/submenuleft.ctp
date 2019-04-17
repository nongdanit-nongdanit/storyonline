<?php
if(!empty($data['slug'])){
    $slugName = strtolower(Inflector::slug($data['slug']));
}else{
    $slugName = 'truyen-chu';
}
$data2 = $this->requestAction('/categories/submenuleft/'.$abc.'/'.$id);?>
<?php if(count($data2)>0):?>
    <div id="<?php echo $abc?>" class="panel-collapse <?php echo ($abc == $slugName) ? "in" : "collapse";?>">
        <div class="panel-body">
            <ul>
             <?php foreach($data2 as $row):?>
             <?php if(!empty($data['category_id']) && $row['Category']['id'] == $data['category_id']){
                $class = 'visited';
             }else{ $class = '';}?>
                <li>
                    <?php
                    echo $this->Html->link($row['Category']['name'], 
                        array(  
                            'controller' => 'stories',
                            'action' => 'view_genre',    
                            'id' => $row['Category']['id'],    
                            'slug' => strtolower(Inflector::slug($row['Category']['name']))),
                            array('class'=> $class)
                            ); 
    ?>
                </li>
             <?php endforeach;?>
            </ul>
        </div>
    </div>
<?php endif;?>