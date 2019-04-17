<?php $articlesHot = $this->requestAction('/articles/getArticle/1');
?>
<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="companyinfo">
							<h2><span>truyen</span>-web</h2>
							<p>Truyenweb.info đọc truyện tranh, truyện chữ online mới và hay nhất, cập nhật liên tục. Kho truyện trên truyenweb.info cực kỳ đa dạng với nhiều thể loại cho bạn thoải mái lựa chọn</p>
						</div>
					</div>
					<!--<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>-->
					<div class="col-sm-3">
						<div class="fb-page" data-href="https://www.facebook.com/readbookonline.info/" data-tabs="timeline" data-height="210" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/readbookonline.info/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/readbookonline.info/">Đọc truyện Online - Read Book</a></blockquote></div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Truyện hot</h2>
							<ul class="nav nav-pills nav-stacked">
                                <?php if(!empty($articlesHot)):?>
                                <?php foreach($articlesHot as $row):?>
								<li>
                                    <?php 
                                        echo $this->Html->link($DataComponent->subString($DataComponent->showNameArticles($row['Article'] ['name']),100), 
                                            array(
                                                'controller' => 'stories',
                                                'action' => 'detail_story',
                                                'slug' => strtolower(Inflector::slug($row['Article'] ['name'])),
                                                'id' => $row['Article'] ['id'],    
                                                ),array('class'=>'','escape'=> false ));
                                    ?>
                                </li>
                                <?php endforeach;?>
                                <?php endif;?>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Danh mục</h2>
							<ul class="nav nav-pills nav-stacked">
                                <li><a href="/danh-sach-truyen-chu.html">Truyện chữ</a></li>
                                <li><a href="/danh-sach-truyen-tranh.html">Truyện Tranh</a></li>
                                <li><a href="/danh-sach-truyen-hot.html">Truyện hot</a></li>
                                <li><a href="/danh-sach-truyen-moi.html">Truyện mới</a></li>
							</ul>
						</div>
					</div>
					<!--<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hướng dẫn sử dụng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Liên hệ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
							</ul>
						</div>
					</div>-->
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Đăng ký email</h2>
                            <?php 
                                $url = Router::url(array(
                                        'controller' => 'users',
                                        'action' => 'newsletter',
                                    ));
                            ?>
							<form class="searchform newsletter-form" action="<?php echo $url?>">
								<input name="email" id="email_newsletter" type="text" placeholder="Email của bạn" />
								<button type="submit" class="btn btn-default newsletter-submit"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Đăng ký email để nhận truyện mới nhất...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 TruyenWeb.info. All rights reserved. Phiên bản thử nghiệm.</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
<?php
		echo $this->Html->script(array(
				'../truyentranh/js/bootstrap.min',
				'../truyentranh/js/jquery.scrollUp.min',
				'../truyentranh/js/price-range',
				'../truyentranh/js/jquery.prettyPhoto',
				'../truyentranh/js/main',
			));
	?>