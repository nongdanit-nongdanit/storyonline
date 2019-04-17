<?php
class GeneralsController extends AppController
{
    public $name = "Generals";
    var $layout = 'admin';
    var $uses = array('General', 'Article','Udv_category','Udv_story','Story','Category');
    var $components = array('RequestHandler','Cookie','Data');    
    
    function admin_dashboard(){
        $this->set('title_for_layout', 'Biểu đồ');
        $this->set('dataarray',$array = array()); 
    }
    function admin_index(){
        $this->set('title_for_layout', 'Thông tin website');
        $data =  $this->General->find('first', array(
             'conditions'=>array('id' => 1),
             'recursive'=>-1
        ));
        $this->set('data',$data);
        
        
        $dataUdv_category =  $this->Udv_category->find('all', array(
             'conditions'=>array('status' => 1),
             'recursive'=>-1
        ));
        $this->set('dataUdv_category',$dataUdv_category);
        
        $dataCategory =  $this->Category->find('all', array(
             'conditions'=>array('parent_id' => 2, 'active'=> 1),
             'recursive'=>-1
        ));
        $this->set('dataCategory',$dataCategory);
        
        if($this->request->is('post')){
            $arrParam = $this->data;
            $arrParam['General']['id'] = 1;                                               
            //$this->General->save($arrParam['General']);
            
            /**
             * Lấy dữ liệu
             * 
            */
            
            
            $dataStoryUpdate = $this->Udv_category->find('first', array(
                 'conditions'=>array('status' => 1,'catId' => $arrParam['Udv_category']['catId']),
                 'recursive'=>-1
            ));
            $dataf = $this->Udv_story->find('first', array(
                  'conditions'    =>array('catId' => $dataStoryUpdate['Udv_category']['catId']),
                  'limit'   => 1,
                  'order'         =>array('id'=>'asc'),                    
                  'recursive'=>-1
              ));
              $now = date('Y:m:d h:i:s', time() - 24 * 60 * 60 - rand(1,100));
              $arrParams['Article']['name']          = $this->Data->showNameArticles($dataStoryUpdate['Udv_category']['catName']);
              $arrParams['Article']['description']   = $dataf['Udv_story']['detail'];
              $arrParams['Article']['category_id']   = $arrParam['Udv_category']['category_id'];
              $arrParams['Article']['created']       = $now;
              $arrParams['Article']['updated']       = date('Y:m:d h:i:s', time() + rand(1,100));
              $arrParams['Article']['ishome']        = 0;
              $arrParams['Article']['ishot']         = 0;
              $arrParams['Article']['numview']         = rand(101,202);
              if($this->Article->save($arrParams)){
                  $id = $this->Article->id;
                  $dataStoryUpdate2 = $this->Udv_story->find('all', array(
                      'conditions'    =>array('catId' => $dataStoryUpdate['Udv_category']['catId']),
                      'order'         =>array('id'=>'asc'),                    
                      'recursive'=>-1
                  ));
                  $i = 1;
                  foreach($dataStoryUpdate2 as $row2){
                      $arrParamss[]['Story']= array(
                          'catId'    => $id,
                         'title'    => $row2['Udv_story']['title'],
                          'detail'    => $row2['Udv_story']['detail'],
                          'ordering'  => $i,
                      );                      
                      $i++;    
                      
                      $this->Udv_story->delete($row2['Udv_story']['id']);
                  }
                  $this->Story->saveAll($arrParamss);
                  
                  $this->Udv_category->delete($dataStoryUpdate['Udv_category']['catId']);
                  /*$arrParame['Udv_category']['catId'] =  $dataStoryUpdate['Udv_category']['catId'];
                  $arrParame['Udv_category']['status'] = 0;
                  $this->Udv_category->save($arrParame);*/      
              }
            
            $this->Session->setFlash('Thêm thành công');
            $this->redirect(array('action'=>'index'));
        }        
    }
}