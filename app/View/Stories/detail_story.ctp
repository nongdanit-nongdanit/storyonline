<section>
		<div class="container">
            <div class="breadcrumbs">
				<ol class="breadcrumb">	
                    <li><a href="<?php echo Router::url('/');?>" >Trang chủ</a></li>			             <li class="active"><?php echo $DataComponent->showNameArticles($data['dataArticle']['Article']['name'])?></li>           
				</ol>
			</div>
			<div class="row">
			<?php 
                echo $this->element('truyentranh/menuleft');
            ?> 
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                            <?php 
                                $type = $data['dataArticle']['Article']['type'];
                                $dir = "story_text";
                                if($type == 1){
                                    $dir = "story_text";
                                }elseif($type == 2){
                                    $dir = "story";
                                }
                            ?>
                                <?php $name_img =  $DataComponent->get_image_story($data['dataArticle']['Article']['id'].'.jpg',$dir);?>
										<?php 
                                            echo $this->Html->image($dir.'/'.$name_img, array('alt'=>$data['dataArticle']['Article']['name']));
                                            ?>
                                            <div class="tray-item-description">
                                                <h3 class="tray-item-title">
                                                    <?php echo $data['dataArticle']['Article']['numview']?> lượt xem
                                                </h3>
                                                
                                            </div>
                            
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
                                <?php 
                                            echo $this->Html->image('new.jpg', array('class'=>'newarrival','alt'=>'new'));
                                            ?>
								<h2><?php echo $DataComponent->showNameArticles($data['dataArticle']['Article']['name'])?></h2>
								<p><?php  echo ($data['dataArticle']['Article']['type']==1) ? "Truyện chữ" : "Truyện tranh"?></p>
                                <?php 
                                            //echo $this->Html->image('rating.png', array('class'=>'','alt'=>'rating'));
                                            ?>
                                    <?php $link =  Router::url(
                                        array(
                                            'controller' => 'stories',
                                            'action'=> 'detail_story',
                                            'slug'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['dataArticle']['Article']['name']))) ,
                                            'id'     => $data['dataArticle']['Article']['id'],  
                                        ),true); ?>
                                <div class="fb-like" data-href="<?php echo $link;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                <p>
                                    <span>
									<!--<span>s</span><input type="text" value="3" />-->
									<label>Mới nhất: <?php echo $data['dataArticle']['Article']['text_chap_end']?></label>
									
                                    <?php 
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_chap',
                                                'slug1'=> ($data['dataArticle']['Article']['type']==1) ? strtolower(Inflector::slug("Truyện chữ")) : strtolower(Inflector::slug("Truyện tranh")),
                                                'slug2' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['dataArticle']['Article']['name']))),
                                                'slug3'=> ($data['dataArticle']['Article']['type']==1) ? strtolower(Inflector::slug($data['dataListArticle'][0]['Story']['name'])) : strtolower(Inflector::slug($data['dataListArticle'][0]['Articleurl']['name'])),
                                                'id' => ($data['dataArticle']['Article']['type']==1) ? $data['dataListArticle'][0]['Story']['id'] : $data['dataListArticle'][0]['Articleurl']['id'],    
                                                ),array('class'=>'btn btn-default cart','escape'              => false ));
                                    ?>
								</span>
                                </p>
								
                                <?php echo (!empty($data['dataArticle']['Author']['name'])) ? "<p><b>Tác giả:</b> ".$data['dataArticle']['Author']['name']."</p>" : "";?>
                                <?php echo (!empty($data['dataArticle']['Category']['name'])) ? "<p><b>Thể loại:</b> ".$data['dataArticle']['Category']['name']."</p>" : "";?>
								<p><b>Tình trạng:</b> <?php echo ($data['dataArticle']['Article']['iscomplete']==1)? "Hoàn thành" : "Chưa hoàn thành"?></p>
								<a href="">
                                <?php 
                                            //echo $this->Html->image('share.png', array('class'=>'share img-responsive','alt'=>'share'));
                                            ?>
                                </a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                    <?php if(!empty($data['dataArticle']['Article']['iswarning'])):?>
					<div id="warning">
                        <div class="col-sm-12">
                            <p class="alert alert-warning"><span style="font-weight: bold; font-size: 14px;">Chú ý:</span> Truyện <span style="color: red;"><?php echo $DataComponent->showNameArticles($data['dataArticle']['Article']['name'])?></span> có thể có nội dung và hình ảnh nhạy cảm, không phù hợp với lứa tuổi của bạn. Nếu bạn dưới 15 tuổi, vui lòng chọn một truyện khác để giải trí. Chúng tôi sẽ không chịu trách nhiệm liên quan nếu bạn bỏ qua cảnh báo này này.</p>
                        </div>
                    </div>
                    <?php endif;?>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Nội dung</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Danh sách truyện</a></li>
								<!--<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>-->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" style="padding-left: 25px; padding-right: 25px;" >
                                <div class="col-sm-12">
    								<p>
                                        <?php echo (!empty($data['dataArticle']['Article']['description'])) ? $data['dataArticle']['Article']['description'] : "Chưa cập nhật";?>
                                    </p>
                                </div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
                                <div class="content_chap">
                                <?php if($data['dataArticle']['Article']['type']==1):?>                                
                                <?php $i=0; foreach($data['dataListArticle'] as $row):?>
                                <?php $style = ($i==0) ? "border-color: red" : "";?>
                                    <div style="<?php echo $style?>" class="col-sm-12 infolinechap">
                                        <div class="col-sm-9">
                                            <?php 
                                        echo $this->Html->link($row['Story']['name'], 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_chap',
                                                'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                                'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['dataArticle']['Article']['name']))),
                                                'slug3'  => strtolower(Inflector::slug($row['Story']['name'])),
                                                'id'     => $row['Story']['id'],    
                                                ),array('class'=>'','escape'=> false ));
                                    ?>
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <?php echo (!empty($row['Story']['created']))? $row['Story']['created']:""?>
                                        </div>                                
                                    </div>                                    
								<?php $i++; endforeach;elseif($data['dataArticle']['Article']['type']==2):?>
                                    <?php $i=0; foreach($data['dataListArticle'] as $row):?>
                                    <?php $style = ($i==0) ? "border-color: red" : "";?>
                                    <div style="<?php echo $style;?>" class="col-sm-12 infolinechap">
                                        <div class="col-sm-9">
                                            
                                            <?php 
                                        echo $this->Html->link($row['Articleurl']['name'], 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_chap',
                                                'slug1'=> strtolower(Inflector::slug("Truyện tranh")),
                                                'slug2' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['dataArticle']['Article']['name']))),
                                                'slug3' => strtolower(Inflector::slug($row['Articleurl']['name'])),
                                                'id'    => $row['Articleurl']['id'],    
                                                ),array('class'=>'','escape'=> false ));
                                    ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php echo (!empty($row['Articleurl']['created']))? $row['Articleurl']['created']:""?>
                                        </div>                                       
                                    </div> 
                                <?php $i++; endforeach;endif?>
                                </div>
							</div>
							<!--
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>-->
							
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
                                                        <?php 
                                        $a = "<h2 title='".$row1['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($row1['Article']['name']),23)."</h2>";
                                        echo $this->Html->link($a, 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row1['Article']['name']))),
                                                'id' => $row1['Article']['id'],    
                                                ),array('class'=>'','escape'              => false ));
                                    ?>
    													<!--<p><?php echo $row1['Article']['text_chap_end'];?></p>-->
                                                        <?php 
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row1['Article']['name']))),
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
													<?php 
                                        $a = "<h2 title='".$row2['Article']['name']."'>".$DataComponent->subString($DataComponent->showNameArticles($row2['Article']['name']),23)."</h2>";
                                        echo $this->Html->link($a, 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row2['Article']['name']))),
                                                'id' => $row2['Article']['id'],    
                                                ),array('class'=>'','escape'              => false ));
                                    ?>
													<!--<p><?php echo $row2['Article']['text_chap_end'];?></p>-->
                                                    <?php 
                                        echo $this->Html->link('<i class="fa fa fa-eye"></i>Đọc truyện', 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($row2['Article']['name']))),
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
                
                <div class="fb-comments" data-href="<?php echo $data['url']?>" data-numposts="10" data-width="100%"></div>
                
			</div>
            <div class="row">
                
            </div>
		</div>
	</section>