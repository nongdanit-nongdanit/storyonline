<?php
class HomesController extends AppController
{
    public $layout = 'truyentranh';
    var $uses = array('Article','Category');
    public function beforeFilter(){
        parent::beforeFilter();
        //$this->set('cookieansd', $this->Cookie->read('cookieansd'));
    }
    public function index(){
        //mới cập nhật
        $dataStoryUpdate = $this->Article->find('all', array(
            'conditions'=>array('status=1 AND ishome =1'),
            'order' => array('updated' => 'desc', 'created'  => 'desc'),
            'limit'=>28,
            'recursive'=>-1
        ));
        $this->_data['dataStoryNewUpdate'] = $dataStoryUpdate;
        //$this->set('dataStoryNewUpdate', $dataStoryUpdate);    
    
        //truyện hot trang index
        $dataStoryNew = $this->Article->find('all', array(
            'conditions'=>array('status=1 AND ishot = 1 AND ishome = 1'),
            'order' => array('updated' => 'desc', 'created'  => 'desc'),
            'limit'=>8,
            'recursive'=>-1
        ));
        $i = 1;
        $data = array();
        $data2 = array();
        $data1 = array();
        foreach($dataStoryNew as $row){
            if($i <= 4){
               $data1[] = $row;
            }else{
               $data2[] = $row; 
            }
            $i++;
        }
        $data = array(
            'data1' => $data1,
            'data2' => $data2
        );
        $this->_data['dataStoryNew'] = $data;
        //$this->set('dataStoryNew', $data);
        $this->set('data', $this->_data);
        //print_r($this->_data); exit();
    }
}