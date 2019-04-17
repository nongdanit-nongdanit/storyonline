<section class="s">
		<div class="container">
			<div class="row">
				<?php 
                    //echo $this->element('truyentranh/menuleft');
                ?>				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $data['genre']['Category']['name']?></h2>
                        <?php 
                            $dataAc = $data['story'];
                            if(!empty($dataAc)):
                        ?>
                        <?php
                        // Paginator options
                        $this->paginator->options(array(
                            "update" => "#resultsDiv",
                            "before" => $this->Js->get("#spinner")->effect("fadeIn", array("buffer" => false)),
                            "complete" => '$("html, body").animate({scrollTop: 0}, "slow");', //$this->Js->get("#spinner")->effect("fadeOut", array("buffer" => false)),
                            'evalScripts' => true, 
                            ));
                        ?>
                        <div class="col-sm-12 pagination">
                            <?php if($this->paginator->param('count') > 72):?>
                            <?php
                             $this->paginator->options(array('url' => array('id'=>$data['category_id'],'slug' => strtolower(Inflector::slug($data['slug'])))));
                             ?>
                             <?php echo $this->paginator->prev("Prev"); ?>
                             <?php echo $this->paginator->numbers(array("separator"=>" ")); ?>
                             <?php echo $this->paginator->next("Next"); ?>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-12">
                        
    						<?php 
                                foreach($dataAc as $rowAc):
                                $type = $rowAc['Article']['type'];
                                if($type == 1){
                                    $dir = "story_text";
                                }elseif($type == 2){
                                    $dir = "story";
                                }
                            ?>
                            <div class="col-sm-3">
    							<div class="product-image-wrapper">
    								<div class="single-products">
    									<div class="productinfo text-center">
                                        <?php $name_img =  $DataComponent->get_image_story($rowAc['Article']['id'].'.jpg',$dir);?>
    										<?php 
                                                echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$rowAc['Article']['name']));
                                                ?>                                        
                                            <?php 
                                            $a = "<h2 title='".$rowAc['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($rowAc['Article']['name']),25)."</h2>";
                                            echo $this->Html->link($a, 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => 'detail_story',
                                                    'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($rowAc['Article']['name']))),
                                                    'id' => $rowAc['Article']['id'],    
                                                    ),array('class'=>'','escape'              => false ));
                                        ?>
    										<!--<p><?php echo $rowAc['Article']['text_chap_end'];?></p>-->
                                            <?php 
                                            echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => 'detail_story',
                                                    'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($rowAc['Article']['name']))),
                                                    'id' => $rowAc['Article']['id'],    
                                                    ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                        ?>
    									</div>
                                        
                                        <div class="product-overlay">
                                            <div style="top: 0;padding: 5px;" class="overlay-content"><p><?php echo $DataComponent->subString($rowAc['Article']['description'],250);?></p></div>
    										<div class="overlay-content">
    											
                                                <?php 
                                            $a = "<h2 title='".$rowAc['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($rowAc['Article']['name']),25)."</h2>";
                                            echo $this->Html->link($a, 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => 'detail_story',
                                                    'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($rowAc['Article']['name']))),
                                                    'id' => $rowAc['Article']['id'],    
                                                    ),array('class'=>'','escape'              => false ));
                                        ?>
    											<!--<p><?php echo $rowAc['Article']['text_chap_end'];?></p>-->
                                                <?php 
                                            echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => 'detail_story',
                                                    'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($rowAc['Article']['name']))),
                                                    'id' => $rowAc['Article']['id'],    
                                                    ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                        ?>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
                            <?php endforeach;?>
                        </div>
                        <div class="col-sm-12 pagination">
                            <div id="spinner" style="display: none;">
                                <?php echo $this->Html->image("loading.gif", array("id" => "busy-indicator")); ?>
                            </div>
                            <?php if($this->paginator->param('count') > 72):?>
                            <?php
                             $this->paginator->options(array('url' => array('id'=>$data['category_id'],'slug' => strtolower(Inflector::slug($data['slug'])))));
                             ?>
                             <?php echo $this->paginator->prev("Prev"); ?>
                             <?php echo $this->paginator->numbers(array("separator"=>" ")); ?>
                             <?php echo $this->paginator->next("Next"); ?>
                            <?php endif;
                            //debug($this->Paginator->params());
                            ?>
                            <?php echo $this->Js->writeBuffer();?>
                        </div>
                        <?php endif;?>
					</div><!--features_items-->
                    
				</div>
			</div>
		</div>
	</section>