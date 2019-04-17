<?php $data2 = $this->requestAction('/categories/submenu/'.$id); //print_r($data);?>
<?php if(count($data2)>0):?>
    <ul role="menu" class="sub-menu">
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
<?php endif;?>