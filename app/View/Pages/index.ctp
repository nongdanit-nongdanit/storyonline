<section>
		<div class="container">
			<div class="row">
            <?php 
                echo $this->element('truyentranh/menuleft');
            ?> 
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Mới cập nhật</h2>
                        <?php
                            foreach($data['dataStoryNewUpdate'] as $row):
                            $type = $row['Article']['type'];
                            if($type == 1){
                                $dir = "story_text";
                            }elseif($type == 2){
                                $dir = "story";
                            }
                        ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                            <?php $name_img =  $DataComponent->get_image_story($row['Article']['id'].'.jpg', $dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$row['Article']['name']));
                                            ?>
											<h2><?php echo $DataComponent->subString($DataComponent->showNameArticles($row['Article']['name']),25);?></h2>
											
                                            <?php 

                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($row['Article']['name'])),
                                                'id' => $row['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
										</div>
										<div class="product-overlay">
                                            <div style="top: 0;padding: 5px;" class="overlay-content"><p><?php echo $DataComponent->subString($row['Article']['description'],250);?></p></div>
											<div class="overlay-content">
                                            <?php 
                                                $a = "<h2 title='".$row['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($row['Article']['name']),25)."</h2>";
                                                echo $this->Html->link($a, 
                                                    array(
                                                        'controller' => 'stories',
                                                        'action' => 'detail_story',
                                                        'slug' => strtolower(Inflector::slug($row['Article']['name'])),
                                                        'id' => $row['Article']['id'],    
                                                        ),array('class'=>'','escape'              => false ));
                                            ?>
												
                                                <?php 
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($row['Article']['name'])),
                                                'id' => $row['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
											</div>
										</div>
								</div>
								<!--<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>
                        <?php endforeach;?>

					</div><!--features_items-->
                    <div class="category-tab"><!--category-tab TRUYỆN CHỮ-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                            <?php $dataMenuTheLoai = $this->requestAction('/categories/menutheloai/7/2');?>
                            <?php $i=1; foreach($dataMenuTheLoai as $row): $href = "xyzt".$i;?>
								<li class="<?php echo ($i==1) ? "active" : "";?>"><a href="#<?php echo $href;?>" data-toggle="tab"><?php echo $row['name_cate'];?></a></li>
                            <?php $i++; endforeach;?>
							</ul>
						</div>
						<div class="tab-content">
                            <?php $i=1; foreach($dataMenuTheLoai as $row): $href = "xyzt".$i;?>
							<div class="tab-pane fade <?php echo ($i==1) ? "active in" : "";?> " id="<?php echo $href;?>" >
                                <?php $dataArticle = $row['data'];?>
                                <?php foreach($dataArticle as $rowArticle):
                                    $dir = "story_text";                                
                                ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
                                            <?php $name_img =  $DataComponent->get_image_story($rowArticle['Article']['id'].'.jpg', $dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$rowArticle['Article']['name']));
                                            ?>
                                                <?php 
                                                $a = "<h2 title='".$rowArticle['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($rowArticle['Article']['name']),17)."</h2>";
                                                echo $this->Html->link($a, 
                                                    array(
                                                        'controller' => 'stories',
                                                        'action' => 'detail_story',
                                                        'slug' => strtolower(Inflector::slug($rowArticle['Article']['name'])),
                                                        'id' => $rowArticle['Article']['id'],    
                                                        ),array('style'=>'text-transform: capitalize;','escape'              => false ));
                                            ?>
												
										<?php
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($rowArticle['Article']['name'])),
                                                'id' => $rowArticle['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
											</div>

										</div>
									</div>
								</div>
                                <?php endforeach;?>
							</div>
                            <?php $i++; endforeach;?>

							
						</div>
					</div><!--/category-tab-->
					<div class="category-tab"><!--category-tab Truyen tranh-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                            <?php $dataMenuTheLoai = $this->requestAction('/categories/menutheloai/7/1');?>
                            <?php $i=1; foreach($dataMenuTheLoai as $row): $href = "xyz".$i;?>
								<li class="<?php echo ($i==1) ? "active" : "";?>"><a href="#<?php echo $href;?>" data-toggle="tab"><?php echo $row['name_cate'];?></a></li>
                            <?php $i++; endforeach;?>
							</ul>
						</div>
						<div class="tab-content">
                            <?php $i=1; foreach($dataMenuTheLoai as $row): $href = "xyz".$i;?>
							<div class="tab-pane fade <?php echo ($i==1) ? "active in" : "";?> " id="<?php echo $href;?>" >
                                <?php $dataArticle = $row['data'];?>
                                <?php foreach($dataArticle as $rowArticle): 
                                        $dir = "story";
                                ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
                                            <?php $name_img =  $DataComponent->get_image_story($rowArticle['Article']['id'].'.jpg',$dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$rowArticle['Article']['name']));
                                            ?>
                                            <?php 
                                                $a = "<h2 title='".$rowArticle['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($rowArticle['Article']['name']),17)."</h2>";
                                                echo $this->Html->link($a, 
                                                    array(
                                                        'controller' => 'stories',
                                                        'action' => 'detail_story',
                                                        'slug' => strtolower(Inflector::slug($rowArticle['Article']['name'])),
                                                        'id' => $rowArticle['Article']['id'],    
                                                        ),array('style'=>'text-transform: capitalize;','escape'              => false ));
                                            ?>
												
												<?php 
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($rowArticle['Article']['name'])),
                                                'id' => $rowArticle['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
											</div>

										</div>
									</div>
								</div>
                                <?php endforeach;?>
							</div>
                            <?php $i++; endforeach;?>

							
						</div>
					</div><!--/category-tab-->

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">truyện hot</h2>
                        
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
                                <?php if(!empty($data['dataStoryNew'])):?>
                                <?php if(!empty($data['dataStoryNew']['data1'])):?>
    								<div class="item active">
                                        <?php foreach($data['dataStoryNew']['data1'] as $row1):
                                            $type = $row1['Article']['type'];
                                            if($type == 1){
                                                $dir = "story_text";
                                            }elseif($type == 2){
                                                $dir = "story";
                                            }
                                        ?>
    									<div class="col-sm-4">
    										<div class="product-image-wrapper">
    											<div class="single-products">
    												<div class="productinfo text-center">
                                                    <?php $name_img =  $DataComponent->get_image_story($row1['Article']['id'].'.jpg',$dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$row1['Article']['name']));
                                            ?>
    													<h2><?php echo $DataComponent->subString($DataComponent->showNameArticles($row1['Article']['name']),25);?></h2>
    													
    													<?php 

                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($row1['Article']['name'])),
                                                'id' => $row1['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
    												</div>
    
    											</div>
    										</div>
    									</div>
                                        <?php endforeach;?>
    								</div>
                                <?php endif;?>
                                
                                <?php if(!empty($data['dataStoryNew']['data2'])):?>
                                <div class="item">
                                 <?php foreach($data['dataStoryNew']['data2'] as $row2):
                                    $type = $row2['Article']['type'];
                                    if($type == 1){
                                        $dir = "story_text";
                                    }elseif($type == 2){
                                        $dir = "story";
                                    }
                                 ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <?php $name_img =  $DataComponent->get_image_story($row2['Article']['id'].'.jpg',$dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$row2['Article']['name']));
                                            ?>
													<h2><?php echo $DataComponent->subString($DataComponent->showNameArticles($row2['Article']['name']),25);?></h2>
													
													<?php 

                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($row2['Article']['name'])),
                                                'id' => $row2['Article']['id'],    
                                                ),array('class'=>'btn btn-default add-to-cart','escape'              => false ));
                                    ?>
												</div>

											</div>
										</div>
									</div>
                                    <?php endforeach;?>    									
 								</div>
                                <?php endif;?>
                                
                                <?php endif;?>								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>