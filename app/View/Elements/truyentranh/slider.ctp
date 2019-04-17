<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<!--<li data-target="#slider-carousel" data-slide-to="2"></li>-->
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								
								<div class="col-sm-12">
                                    <a href="http://truyenweb.info/one-piece-158.html">
                                        <h1 class="slider-text">One pice</h1>
                                    </a>
                                    <?php 
                                        $img = $this->Html->image('../truyentranh/images/home/1.jpg', array('title'=>'One pice','class'=>'girl img-responsive','alt'=>'One pice'));
                                        echo $this->Html->link($img, 'http://truyenweb.info/one-piece-158.html' ,array('title'=>'One pice','escape'=>false));
                                    ?>
									
								</div>
							</div>
							<div class="item">
								
								<div class="col-sm-12">
                                <a href="http://truyenweb.info/conan-1221.html">
                                        <h1 class="slider-text">Thám tử lừng danh Conan</h1>
                                    </a>
									<?php 
                                        $img = $this->Html->image('../truyentranh/images/home/conan.jpg', array('title'=>'Thám tử lừng danh Conan','class'=>'girl img-responsive','alt'=>'Thám tử lừng danh Conan'));
                                        echo $this->Html->link($img, 'http://truyenweb.info/conan-1221.html' ,array('title'=>'Thám tử lừng danh Conan','escape'=>false));
                                    ?>
								</div>
							</div>

							<!--<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-12">
                                    <a href="http://nongdanit.info">
                                        <h1 class="slider-text">One pice</h1>
                                    </a>
									<img src="../app/webroot/truyentranh/images/home/1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>-->

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
    
			</div>
		</div>
	</section><!--/slider-->