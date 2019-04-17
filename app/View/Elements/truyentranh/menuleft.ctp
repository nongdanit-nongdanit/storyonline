<div class="col-sm-3" id="menuhidereponsive">
	<div class="left-sidebar">
		<h2>Danh mục</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<?php $categoryMenu = $this->requestAction('/categories/menu/');?>
            <?php foreach($categoryMenu as $row): $slugName = strtolower(Inflector::slug($row['Category']['name'])); $ixyz = $slugName;?>
            <div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
                    <?php if($row['Category']['id'] == 1 || $row['Category']['id'] == 2){
                        $t = "#".$ixyz;
                        $tt = "data-toggle='collapse' data-parent='#accordian'";
                    }elseif($row['Category']['id'] == 3){
                        $t = "/danh-sach-truyen-hot.html";
                        $tt = "";
                    }elseif($row['Category']['id'] == 4){
                        $t = "/danh-sach-truyen-moi.html";
                        $tt = "";
                    }?>
						<a <?php echo $tt;?> href="<?php echo $t;?>">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							<?php echo $row['Category']['name'];?>
						</a>
					</h4>
				</div>
				<?php if($row['Category']['id'] == 1 || $row['Category']['id'] == 2 ){
				    echo $this->element('truyentranh/submenuleft',array('abc'=>$ixyz,'id'=>$row['Category']['id']));   
				}?>

			</div>
			<?php endforeach?>

			
		</div><!--/category-products-->

		
        <?php if($this->params['controller'] =='stories' && $this->action =='detail_story'):?>
		<div class="brands_products">
			
		</div><!--/brands_products-->
        <?php endif;?>

		<!--<div class="shipping text-center">shipping
			<img src="images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->

	</div>
</div>