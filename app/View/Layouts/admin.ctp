<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?=$this->element('admin/head')?>

<body>
	<?php if($logged_in): ?>
    <div id="wrapper">
        <?=$this->element('admin/navigate')?>
    <div id="page-wrapper">
        <?php echo $this->Session->flash(); ?>

		<?=$this->fetch('content')?>
        <!-- /#page-wrapper -->

    </div>
    <?php

    	else:

    		echo $this->fetch('content');

    	endif;
    ?>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?=$this->element('admin/foot')?>
    <?php //echo $this->element('sql_dump'); ?>
</body>

</html>
