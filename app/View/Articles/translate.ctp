<div class="clearboth"> </div>
<div class="header__breadcrumb">
    <div class="header__breadcrumb__wrapper">
        <ul>                    
            <?php echo $this->element('breadcrumbs');?>     
        </ul>
    </div>
</div>
<div class="clearboth"> </div>

<div class="block-body translate">
 <?php echo $this->Html->script('vdict');?>
 <style>
    .translate iframe{
        border: 1px solid #cdcdcd;
        width: 99.8%;
        min-height: 500px;
    }
 </style>
 <iframe src="http://dic.tienganh123.com/v2" id="iframe" width="100%" height="300px"></iframe>
</div>