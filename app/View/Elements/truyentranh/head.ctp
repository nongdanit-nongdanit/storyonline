<head>
    <title>Đọc truyện<?= ' - '.$data['title_for_layout']; ?></title>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $data['description']; ?>">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="<?= $data['keywords']; ?>">
    <link rel="canonical" href="<?php echo $data['url']?>"/>
    <link rel="publisher" href="https://plus.google.com/111225401971956378704">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Đọc truyện<?= ' - '.$data['title_for_layout']; ?>">
    <meta property="og:description" content="<?= $data['description']; ?>">
    <meta property="og:url" content="<?php echo $data['url']?>">
    <meta property="og:site_name" content="<?php echo $data['site_name']?>">
    <meta property="fb:app_id" content="1667964226782386">
    <meta property="og:image" content="<?php echo $data['url_image']?>">
    <meta property="og:image:width" content="960">
    <meta property="og:image:height" content="720">
    <meta name="author" content="nongdanit">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?= $data['description']; ?>">
    <meta name="twitter:title" content="Đọc truyện<?= ' - '.$data['title_for_layout']; ?>">
    <meta name="twitter:site" content="@nongdanit_">
    <meta name="twitter:image" content="<?php echo $data['url_image']?>">
    <!--<meta name="twitter:creator" content="@nongdanit_">-->
    <meta name="google-site-verification" content="iTq5XhHNeBx4CY2nNTug4N4S4ejZpQi37rJGYjRzmBQ" />
    <meta http-equiv="content-language" content="vi" />
    
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo Router::url('/', true); ?>img/book.png" type="image/x-icon">
    <?php
    	echo $this->Html->css(array(
					'../truyentranh/css/bootstrap.min',
					'../truyentranh/css/font-awesome.min',
					'../truyentranh/css/prettyPhoto',
					'../truyentranh/css/price-range',
					'../truyentranh/css/animate',
					'../truyentranh/css/main',
					'../truyentranh/css/responsive',
				),array('rel'=>"stylesheet"));
    ?>
            <?php echo $this->Html->script(array(
				    '../truyentranh/js/jquery',
                    'js',
                ));
            ?>
            <?php if(!empty($current_user)):
                echo $this->Html->script(array(
                    'js_admin',
                ));
            endif?>
            <?php if($this->params['controller'] =='homes' && $this->action =='index'):?>
            <script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"WebSite","@id":"#website","url":"http:\/\/truyenweb.info\/","name":"TruyenWeb","potentialAction":{"@type":"SearchAction","target":"http:\/\/truyenweb.info\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>

<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"Person","url":"http:\/\/truyenweb.info\/","sameAs":["https:\/\/www.facebook.com\/readbookonline.info","https:\/\/plus.google.com\/111225401971956378704","https:\/\/www.youtube.com\/user\/nqsu381","https:\/\/twitter.com\/nongdanit_"],"@id":"#person","name":"Su Nguyen","homeLocation":"Vietnam"}</script>
            <?php endif;?>

    <!--[if lt IE 9]>
    <?php
		echo $this->Html->script(array(
				'../truyentranh/js/html5shiv',
				'../truyentranh/js/respond.min',
			));
	?>
    <![endif]-->
</head><!--/head-->