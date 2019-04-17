<?php
class Category extends AppModel {
    var $name='Category';
    public $primaryKey = 'category_id';
    public $actsAs = array('Tree');
    
}