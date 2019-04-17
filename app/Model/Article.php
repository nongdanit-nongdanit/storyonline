<?php
class Article extends AppModel {
    var $name='Article';
    var $inserted_ids = array();
        
    public $belongsTo = array(
        'Author'=>array(
            'className' => 'Author',
            'foreignKey' => 'author_id',
            'fields'    => array('name'),
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'fields'    => array('name', 'description', 'parent_id','date_updated'),
        ),
    );
    
    public function afterSave($created,$options = array()) {
        if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }
        return true;
    }        
}