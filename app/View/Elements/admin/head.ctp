<head>
    <?=$this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
            <?php echo $title_for_layout; ?>
    </title>

    <!-- Core CSS - Include with every page -->
    <?php
        echo $this->Html->css(array(
                '../admin/css/bootstrap.min',
                '../admin/css/style',
                '../admin/font-awesome/css/font-awesome',
                '../admin/css/plugins/morris/morris-0.4.3.min',
                '../admin/css/plugins/timeline/timeline',
                '../admin/css/sb-admin',
                '../js/videojs/video-js'
            ));
        echo $this->Html->script(array(
		//<!-- Core Scripts - Include with every page -->
			'../admin/js/jquery-1.10.2',
			'../admin/js/bootstrap.min',
			'../admin/js/plugins/metisMenu/jquery.metisMenu',

		//<!-- Page-Level Plugin Scripts - Dasboard -->
		//	'../admin/js/plugins/morris/raphael-2.1.0.min',
		//	'../admin/js/plugins/morris/morris',
		//	'../admin/js/demo/dashboard-demo',

		//<!-- Page-Level Plugin Scripts - Tables -->
			'../admin/js/plugins/dataTables/jquery.dataTables',
			'../admin/js/plugins/dataTables/dataTables.bootstrap',
			
		//<!-- SB Admin Scripts - Include with every page -->
			'../admin/js/sb-admin',
            '../admin/js/js',
            'ckeditor/ckeditor',
            'videojs/video.js'
		));
    ?>
    
</head>