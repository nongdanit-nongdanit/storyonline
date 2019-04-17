<?php
    echo "<li><a href=".Router::url('/').">Trang chủ</a></li>";
    if($this->params['controller'] == 'stories'){
        echo $breadcrumbs;		
    }    
?>