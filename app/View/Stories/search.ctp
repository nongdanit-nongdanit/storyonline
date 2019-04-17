<?php if(!empty($data)):?>
<ul class="search-dropdown-list">
    <?php foreach($data as $row):?>
        <li class="cart-product-item clearfix">
            <?php 
                if($row['Article']['type'] == 1){
                    $text = "Truyện chữ";
                }else $text = "Truyện tranh";
                $name = $DataComponent->showNameArticles($row['Article']['name']);
                echo $this->Html->link($name, 
                            array(
                                'controller' => 'stories',
                                'action' => 'detail_story',
                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row['Article']['name']))),
                                'id' => $row['Article']['id'],    
                                ),array('class'=>'','escape'              => false ));
            ?>
            
        </li>
    <?php endforeach;?>
</ul>
<?php endif;?>