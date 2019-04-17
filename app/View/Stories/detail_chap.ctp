<section>
		<div class="container">
            <div class="breadcrumbs">
				<ol class="breadcrumb">
                    <li><a href="<?php echo Router::url('/');?>" >Trang chủ</a></li>
                    <li>
                        <?php
                                        echo $this->Html->link($DataComponent->showNameArticles($data['nameArticle']), 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                                'id' => $data['article_id'],    
                                                ),array('class'=>'','escape'              => false ));
                                    ?>
                    </li>
                    <li class="active"><?php echo $data['nameChap']?></li>                 
				</ol>
			</div>
			<div class="row">  
                <?php if(!empty($data['dataArticleurl'])):?>
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-right">
                        <?php 
                        $dataArticleurlPrev = $data['neighbors']['prev'];
                        if(!empty($dataArticleurlPrev)){
                            echo $this->Html->link("Chương trước", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataArticleurlPrev['Articleurl']['name'])),
                                    'id'     => $dataArticleurlPrev['Articleurl']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control changechapter">
                                <?php if(!empty($data['dataListArticle'])):?>
                                <?php foreach($data['dataListArticle'] as $row):?>
                                <?php $link =  Router::url(
                                    array(
                                        'controller' => 'stories',
                                        'action'=> 'detail_chap',
                                        'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                        'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                        'slug3'  => strtolower(Inflector::slug($row['Articleurl']['name'])),
                                        'id'     => $row['Articleurl']['id'],  
                                    )); ?>
                                    <option <?php echo ($this->request->params['id'] == $row['Articleurl']['id']) ? "selected" : ""?> value="<?php echo $link;?>"><?php echo $row['Articleurl']['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <?php 
                        $dataArticleurlNext = $data['neighbors']['next'];
                        if(!empty($dataArticleurlNext)){
                            echo $this->Html->link("Chương sau", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataArticleurlNext['Articleurl']['name'])),
                                    'id'     => $dataArticleurlNext['Articleurl']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                            </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2><?php echo $data['nameChap']?></h2>                        
                        <?php $link =  Router::url(
                                        array(
                                            'controller' => 'stories',
                                            'action'=> 'detail_chap',
                                            'slug1'=> strtolower(Inflector::slug("Truyện tranh")),
                                            'slug2' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                            'slug3' => strtolower(Inflector::slug($data['nameChap'])),
                                            'id'    => $this->request->params['id'],    
                                                ),array('class'=>'','escape'              => false ),true);?>
                        <div class="fb-like" data-href="<?php echo $link;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        
                    </div>
                    <div style="margin-top: 10px;" class="col-sm-12 story-content">
                        <?php $url =  $data['dataArticleurl']['Articleurl']['link_img'];
                            $url = ltrim($url, "#");
            				$url = rtrim($url, "#");
            				$url_arr = explode("#", $url);
                            if(!empty($url_arr)){
                                foreach($url_arr as $row){
                                    ?>
                                    <img src="<?php echo $row?>" alt="" style="max-width: 100%;"/><br />
                                <?php }
                            }
                        ?>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-right">
                        <?php 
                        $dataArticleurlPrev = $data['neighbors']['prev'];
                        if(!empty($dataArticleurlPrev)){
                            echo $this->Html->link("Chương trước", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataArticleurlPrev['Articleurl']['name'])),
                                    'id'     => $dataArticleurlPrev['Articleurl']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control changechapter">
                                <?php if(!empty($data['dataListArticle'])):?>
                                <?php foreach($data['dataListArticle'] as $row):?>
                                <?php $link =  Router::url(
                                    array(
                                        'controller' => 'stories',
                                        'action'=> 'detail_chap',
                                        'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                        'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                        'slug3'  => strtolower(Inflector::slug($row['Articleurl']['name'])),
                                        'id'     => $row['Articleurl']['id'],  
                                    )); ?>
                                    <option <?php echo ($this->request->params['id'] == $row['Articleurl']['id']) ? "selected" : ""?> value="<?php echo $link;?>"><?php echo $row['Articleurl']['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <?php 
                        $dataArticleurlNext = $data['neighbors']['next'];
                        if(!empty($dataArticleurlNext)){
                            echo $this->Html->link("Chương sau", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện tranh")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataArticleurlNext['Articleurl']['name'])),
                                    'id'     => $dataArticleurlNext['Articleurl']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                            </div>
                    </div>
                <?php endif;?>
                <?php if(!empty($data['dataStory'])):?>
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-right">
                        <?php 
                        $dataStoryPrev = $data['neighbors']['prev'];
                        if(!empty($dataStoryPrev)){
                            echo $this->Html->link("Chương trước", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataStoryPrev['Story']['name'])),
                                    'id'     => $dataStoryPrev['Story']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control changechapter">
                                <?php if(!empty($data['dataListArticle'])):?>
                                <?php foreach($data['dataListArticle'] as $row):?>
                                <?php $link =  Router::url(
                                    array(
                                        'controller' => 'stories',
                                        'action'=> 'detail_chap',
                                        'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                        'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                        'slug3'  => strtolower(Inflector::slug($row['Story']['name'])),
                                        'id'     => $row['Story']['id'],  
                                    )); ?>
                                    <option <?php echo ($this->request->params['id'] == $row['Story']['id']) ? "selected" : ""?> value="<?php echo $link?>"><?php echo $row['Story']['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <?php 
                        $dataStoryNext = $data['neighbors']['next'];
                        if(!empty($dataStoryNext)){
                            echo $this->Html->link("Chương sau", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataStoryNext['Story']['name'])),
                                    'id'     => $dataStoryNext['Story']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                            </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2><?php echo $data['nameChap']?></h2>
                        <?php $link =  Router::url(
                                        array(
                                            'controller' => 'stories',
                                            'action'=> 'detail_chap',
                                            'slug1'=> strtolower(Inflector::slug("Truyện chữ")),
                                            'slug2' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                            'slug3' => strtolower(Inflector::slug($data['nameChap'])),
                                            'id'    => $this->request->params['id'],    
                                                ),array('class'=>'','escape'              => false ));?>
                        <div class="fb-like" data-href="<?php echo $link;?>" data-layout="button_count" data-action="recommend" data-size="large" data-show-faces="false" data-share="true"></div>
                    </div>
                    <div class="col-sm-12 story-text-content">
                        <?php echo $data['dataStory']['Story']['detail']?>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-right">
                        <?php 
                        $dataStoryPrev = $data['neighbors']['prev'];
                        if(!empty($dataStoryPrev)){
                            echo $this->Html->link("Chương trước", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataStoryPrev['Story']['name'])),
                                    'id'     => $dataStoryPrev['Story']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control changechapter">
                                <?php if(!empty($data['dataListArticle'])):?>
                                <?php foreach($data['dataListArticle'] as $row):?>
                                <?php $link =  Router::url(
                                    array(
                                        'controller' => 'stories',
                                        'action'=> 'detail_chap',
                                        'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                        'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                        'slug3'  => strtolower(Inflector::slug($row['Story']['name'])),
                                        'id'     => $row['Story']['id'],  
                                    )); ?>
                                    <option <?php echo ($this->request->params['id'] == $row['Story']['id']) ? "selected" : ""?> value="<?php echo $link?>"><?php echo $row['Story']['name']?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <?php 
                        $dataStoryNext = $data['neighbors']['next'];
                        if(!empty($dataStoryNext)){
                            echo $this->Html->link("Chương sau", 
                                array(
                                    'controller' => 'stories',
                                    'action' => 'detail_chap',
                                    'slug1'  => strtolower(Inflector::slug("Truyện chữ")) ,
                                    'slug2'  => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                    'slug3'  => strtolower(Inflector::slug($dataStoryNext['Story']['name'])),
                                    'id'     => $dataStoryNext['Story']['id'],    
                                    ),array('class'=>'btn btn-success','role'=>'button','escape'=> false ));   
                        }
                        ?>
                            </div>
                    </div>
                <?php endif;?>
                <?php 
                    $url = Router::url(array(
                                'controller' => 'stories',
                                'action' => 'detail_story',
                                'slug' => strtolower(Inflector::slug($DataComponent->showNameArticles($data['nameArticle']))),
                                'id' => $data['article_id'], 
                            ), true);
                            //echo $url;
                ?>
				<div class="fb-comments" data-href="<?php echo $url?>" data-numposts="10" data-width="100%"></div>
			</div>
            <div class="row">
                
            </div>
		</div>
	</section>