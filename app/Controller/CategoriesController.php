<?php
class CategoriesController extends AppController
{
    var $name = 'Categories';
    var $layout = 'admin';
    var $uses = array('Category','User','Article');
    var $helpers    = array('Session', 'Paginator');
    var $destination    = null;
    var $components = array('Session','RequestHandler');
    public function beforeFilter(){
        parent::beforeFilter();
    }

    function admin_index()
    {
        $this->set('title_for_layout', 'Danh sách danh mục');
        $data = $this->Category->generateTreeList(null,null,null, '&nbsp;&nbsp;|&mdash;');     
        $this->set('cat', $data);
    }
    public function admin_add()
    {
        $this->set('title_for_layout', 'Thêm danh mục');
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        $error = array();
        if($this->request->is('post'))
        {
            $arrParams = $this->data['Category'];
            if($arrParams['name']==null)
            {
                $this->redirect(array('action'=>'add'));
            }
            if(empty($arrParams['ordering'])){
                $error['ordering']= "Vui lòng nhập vị trí ";
            }
            if(empty($error)){
                $now = date('Y:m:d h:i:s');
                $arrParams['date_created'] = $now;
                $arrParams['date_updated'] = $now;
                $this->Category->save($arrParams);
                $this->Session->setFlash('Thêm thành công','default',array('class'=>"alert alert-success"));
                //$this->redirect('index');
            }
            $this->set("error", $error);     
        }
    }
    
    public function admin_edit($id){
        $this->set('title_for_layout', 'Cập nhật danh mục');
        $result = $this->Category->generateTreeList(null, null, null, "---");
        $this->set('result', $result);
        $detail = $this->Category->find('first', array(
					'fields' => array('category_id', 'name','parent_id','active','ordering','description'),
					'conditions'=>array('category_id = '.$id),
					'recursive'   =>-1
                  ));
        $this->set('detail', $detail);
        if($this->request->is('post')){
            $arrParams = $this->data['Category'];
            if($arrParams['name']==null)
            {
                $this->redirect(array('action'=>'index'));
            }
            $now = date('Y:m:d h:i:s');
            $data = array(
                'Category'=>array(
                    'name'=> $arrParams['name'],
                    'date_updated'=>$now,
                    'parent_id'=>$arrParams['parent_id'],
                    'ordering'=>$arrParams['ordering'],
                    'active'=>$arrParams['active'],
                    'description'=>$arrParams['description']
                )
            );
            $this->Category->category_id = $id;
            $this->Category->save($data);
            $this->Session->setFlash('Cập nhật thành công','default',array('class'=>"alert alert-success"));
            $this->redirect('index');
        }
    }    
    public function del(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax())
        {
            $arr = $this->request->data;
            $id = $arr['id'];
            $data = $this->Category->find('first', array(
                        'conditions'=>array('category_id = '.$id)
                )
            );
            if(count($data)>0){
                $this->Category->delete($id);
                return json_encode('T');
            }else return json_encode('F');
        }               
    }
    //Font-end
    public function menu(){
        $result = Cache::read('menu');
        if (!$result) {
            $result = $this->Category->find('all', array('fields' => array('category_id as id', 'name','parent_id','active'),'conditions'=>array('active=1 and parent_id=0'),'order'=>array('ordering'=>'asc'), 'recursive'=>-1));
            Cache::write('menu', $result);
        }        
        return $result;
    }
    public function submenu($id){
        $arrProducer = $this->Category->find('all', array(
            'fields' => array('category_id as id', 'name','parent_id','active','ordering'),
            'conditions' => array('active = 1 AND parent_id = '.$id),
            'order'=>array('ordering'=>'asc'),
            'recursive'   =>-1
        ));
        return $arrProducer;
    }
    public function submenuleft($abc,$id){
        $arrProducer = $this->Category->find('all', array(
            'fields' => array('category_id as id', 'name','parent_id','active','ordering'),
            'conditions' => array('active = 1 AND parent_id = '.$id),
            'order'=>array('ordering'=>'asc'),
            'recursive'   =>-1
        ));
        return $arrProducer;
    }
    public function menutheloai($limit,$parent_id=2){
        $arrProducer = $this->Category->find('all', array(
            'fields' => array('category_id as id', 'name','parent_id','active','ordering'),
            'conditions' => array('ishome = 1 AND active = 1 AND parent_id = '.$parent_id),
            'limit'=>$limit,
            'order'=>array('ordering'=>'asc'),
            'recursive'   =>-1
        ));
        foreach($arrProducer as $row){
            $dataArticle = array();
            $dataArticle = $this->Article->find('all', array(
                'conditions'=>array('status=1 AND category_id='.$row['Category']['id']),
                'order' => array('updated' => 'desc', 'created'  => 'desc'),
                'limit'=>4,
                'recursive'=>-1
            ));
            $data[] = array(
                'id_cate'   => $row['Category']['id'],
                'name_cate' => $row['Category']['name'],
                'data'      => $dataArticle,
            );
        }   
        return $data;
    }
}