<?php $categoryMenu = $this->requestAction('/categories/menu/');?>
<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                            <a href="/"><h3 style="font-family: cursive;font-size: 30px;">Truyenweb.info</h3></a>							
                            <?php 
                                $img = $this->Html->image('../truyentranh/images/home/logo.png', array('title'=>'Logo', 'alt'=>'Logo'));
            //echo $this->Html->link($img, '/' ,array('title'=>'Return To Home','escape'=>false));
        ?>
						</div>

					</div>					
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo Router::url('/')?>" class="active">Trang chủ</a></li>								
								<?php foreach($categoryMenu as $key => $category):?>
									<li class="dropdown">
                                    <?php if($category['Category']['id'] == 1){
                                        $action = 'view_no_text';
                                    }elseif($category['Category']['id'] == 2){
                                        $action = 'view_text';
                                    }elseif($category['Category']['id'] == 3){
                                        $action = 'view_hot';
                                    }elseif($category['Category']['id'] == 4){
                                        $action = 'view_new';
                                    }
                                    ?>
                                    
                                    <?php 
                                            echo $this->Html->link($category['Category']['name'].'<i class="fa fa-angle-down"></i>', 
                                                array(
                                                    'controller' => 'stories',
                                                    'action' => $action,
                                                    ),array('class'=>'','escape'=> false ));
                                        ?>
                                    
                                    <?php if($category['Category']['id'] == 1 || $category['Category']['id'] ==2 ){
				    echo $this->element('truyentranh/submenu',array('id'=>$category['Category']['id']));   
				}?>
									</li>
								<?php endforeach;?>

							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="search_box pull-right">
                            <?php $link =  Router::url(
                                        array(
                                            'controller' => 'stories',
                                            'action'=> 'search',
                                        ),true); ?>
                            <form action="<?php echo $link;?>" id="search-block-form">
                                <input type="text" name="search" id="search" value="" class="search-text" autocomplete="off" placeholder="Search"/>
                            </form>
						</div>
                        
                        <div class="align-right" id="search-content">
                            
                        </div>
					</div>
				</div>
                
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->