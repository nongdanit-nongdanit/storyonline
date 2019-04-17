<div class="clearboth"> </div>
<div class="header__breadcrumb">
    <div class="header__breadcrumb__wrapper">
        <ul>                    
            <?php echo $this->element('breadcrumbs');?>     
        </ul>
    </div>
</div>
<div class="clearboth"> </div>

<div class="block-body">
<?php if(!empty($data['Article'] ['summary'])){
    echo $data['Article'] ['summary'];//echo $DataComponent->toAlias($data['Article'] ['name']);
}?>
</div>