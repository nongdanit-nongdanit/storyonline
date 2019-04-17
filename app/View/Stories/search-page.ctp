<section>
		<div class="container">
			<div class="row">
				<?php 
                    //echo $this->element('truyentranh/menuleft');
                ?>				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Kết quả từ khóa: <samp style="color: rgb(66, 139, 202);"><?php echo $data['dataSearch']['search']?></samp></h2>
                        <?php 
                            $dataAc = $data['story'];
                            if(!empty($dataAc)):
                        ?>
                        <?php
                            // Paginator options
                            $this->paginator->options(array(
                                'url'=> array(
                                'controller' => 'stories', 
                                'action' => 'search', 
                                '?' => 'search='.$data['dataSearch']['search']
                             ),
                                "update" => "#resultsDiv",
                                "before" => $this->Js->get("#spinner")->effect("fadeIn", array("buffer" => false)),
                                "complete" => '$("html, body").animate({scrollTop: 0}, "slow");',
                                'evalScripts' => true, 
                                ));
                            ?>
                        <div class="col-sm-12 pagination">
                            <?php if($this->paginator->param('count') > 10):?>                            
                             <?php echo $this->paginator->prev("Prev"); ?>
                             <?php echo $this->paginator->numbers(array("separator"=>" ")); ?>
                             <?php echo $this->paginator->next("Next"); ?>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-12">
                            <?php foreach($dataAc as $row){
                                $type = $row['Article']['type'];
                                if($type == 1){
                                    $dir = "story_text";
                                }elseif($type == 2){
                                    $dir = "story";
                                }
                                ?>
                            <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 col-lg-4 icon-search-story ">
                                <div class="bottom-img">
                                    <?php $name_img =  $DataComponent->get_image_story($row['Article']['id'].'.jpg',$dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$row['Article']['name'],'class'=> ''));
                                            ?>
                                    <p class="name_story first ">
                                    <?php
                                            echo $this->Html->link($DataComponent->subString($DataComponent->showNameArticles($row['Article']['name']),40), 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => 'detail_story',
                                                    'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row['Article']['name']))),
                                                    'id' => $row['Article']['id'],    
                                                    ),array('class'=>'','escape'              => true ));
                                        ?>
                                    </p>
                                    
                                </div>
                               
                                <p><?php 
                                                echo $this->Html->image($dir.'.png', array('class'=>'','alt'=>'new'));
                                            ?></p>
                            </div>
                        <?php }?>
                        </div>
                        <div class="col-sm-12 pagination">
                            <div id="spinner" style="display: none;">
                                <?php echo $this->Html->image("loading.gif", array("id" => "busy-indicator")); ?>
                            </div>
                            <?php if($this->paginator->param('count') > 10):?>
                            <?php echo $this->paginator->prev("Prev"); ?>
                            <?php echo $this->paginator->numbers(array("separator"=>" ")); ?>
                            <?php echo $this->paginator->next("Next"); ?>
                            <?php endif;?>
                            <?php echo $this->Js->writeBuffer();?>
                        </div>
                        <?php endif;?>
					</div>                  
                    
				</div>
			</div>
		</div>
	</section>