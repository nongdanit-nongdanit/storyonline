<?php
class StoriesController extends AppController
{
    public $layout = 'truyentranh';
    public $components = array('RequestHandler', 'Data');        
    var $uses = array('Article','Category','Articleurl','Story');
    var $helpers = array('Js','Paginator','Html');
    var $paginate = array();
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function view_text(){
        $this->paginate = array(
            'conditions'=>array('status=1 AND type=1'),
            'limit'=>36,
            'order' => array('id' => 'desc'),            
            'recursive'=>-1
        );
        $dataArticle = $this->paginate("Article");
        $this->_data['story'] = $dataArticle;
        $this->_data['slug']    = "Truyện chữ";
        $this->_data['description'] = "Truyện chữ mới,".$this->_data['description'];
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
        return $this -> render('/Stories/view');
    }
    public function view_no_text(){
        $this->paginate = array(
            'conditions'=>array('status=1 AND type=2'),
            'limit'=>36,
            'order' => array('id' => 'desc'),
            'recursive'=>-1
        );
        $dataArticle = $this->paginate("Article");        
        $this->_data['story'] = $dataArticle;
        $this->_data['slug']    = "Truyện tranh";
        $this->_data['description'] = "Truyện tranh mới,".$this->_data['description'];
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
        return $this -> render('/Stories/view');
    }
    public function view_hot(){
        $this->paginate = array(
            'conditions'=>array('Article.status' => 1,'Article.ishot' =>1),
            'limit'=>36,
            'order' => array('id' => 'desc'),
            'recursive'=>-1
        );
        $dataArticle = $this->paginate("Article");        
        $this->_data['story'] = $dataArticle;
        $this->_data['slug']    = "Truyện hot";
        $this->_data['title_for_layout'] = $this->_data['slug'].' Online';
        $this->_data['description'] = "Truyện hot,".$this->_data['description'];
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
        return $this -> render('/Stories/view');
    }
    public function view_new(){
        $this->paginate = array(
            'conditions'=>array('Article.status' => 1,'Article.ishot' =>1),
            'limit'=>36,
            'order' => array('id' => 'desc'),
            'recursive'=>-1
        );
        $dataArticle = $this->paginate("Article");        
        $this->_data['story'] = $dataArticle;
        $this->_data['slug']    = "Truyện mới";
        $this->_data['title_for_layout'] = $this->_data['slug'].' Online';
        $this->_data['description'] = "Truyện mới cập nhật,".$this->_data['description'];
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
        return $this -> render('/Stories/view');
    }
    //Danh muc
    public function view_genre($id=null,$slug){
    
        $dataGenre = $this->Category->find('first', array(
    					'fields' => array('category_id as id', 'name','parent_id','ordering','description'),
    					'conditions'=>array('category_id = '.$id),
    					'recursive'   =>-1
                    ));
        $this->paginate = array(
            'conditions'    =>  array('Article.status' => 1,'Article.category_id' =>$id),
            'limit'=>72,
            'order' => array('Article.id' => 'desc'),
            'recursive'=>-1
        );
        $dataArticle = $this->paginate("Article");  

        if($dataGenre['Category']['parent_id'] == 1){
            $text = "Truyện tranh";
        }else{
            $text = "Truyện chữ";
        }
        
        $this->_data['genre'] = $dataGenre;
        $this->_data['story'] = $dataArticle;
        $this->_data['category_id']    = $id;
        $this->_data['title_for_layout'] = $text.' Online - '.$dataGenre['Category']['name'];
        $this->_data['description'] = $dataGenre['Category']['name'].",".$this->_data['description'];
        $this->_data['keywords'] = ($dataGenre['Category']['name']).",doc truyen ".strtolower(Inflector::slug($dataGenre['Category']['name'],"-",1)).",".strtolower(Inflector::slug($dataGenre['Category']['name'],"-",1))." online";
        $this->_data['slug']    = $text;
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
    }
    public function detail_story($slug,$id = null){
        //chi tiết truyện
        $dataArticle = $this->Article->find('first', array(
            'conditions'=>array('Article.id'=>$id, 'Article.status'=> 1),
            'recursive'=>0
        ));
        $this->_data['dataArticle'] = $dataArticle;
        //$this->set('dataArticle', $dataArticle);
        //Danh sách truyện
        if($dataArticle['Article']['type'] == 1){
                $dataListArticle = $this->Story->find('all', array(
                    'conditions'=>array('catId = '.$id),
                    'fields'    => array('title as name', 'id'),
                    'order' =>array('id'=>'DESC'),
                    'recursive'=>-1
                ));
            
            $text = "Truyện chữ";
            $dir = "story_text";
        }else{
            
                $dataListArticle = $this->Articleurl->find('all', array(
                    'conditions'=>array('article_id = '.$id),
                    'fields'    => array('name', 'id','created'),
                    'order' =>array('id'=>'DESC'),
                    'recursive'=>-1
                ));  
                        
            $text = "Truyện tranh";
            $dir = "story";
        }       
        
        $this->_data['dataListArticle'] = $dataListArticle;
        //$this->set('dataListArticle', $dataListArticle);
        //echo "<pre>";
        //print_r($dataListArticle);exit;
        //echo "</pre>";
        
        //truyện hot
        $dataStoryNew = $this->Article->find('all', array(
            'conditions'=>array('status=1 AND ishot = 1'),
            'order' => array('updated' => 'desc', 'created'  => 'desc'),
            'limit'=>6,
            'recursive'=>-1
        ));
        $i = 1;
        $data = array();
        $data1 = array();
        $data2 = array();
        foreach($dataStoryNew as $row){
            if($i < 4){
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
        $this->_data['category_id']    = $dataArticle['Article']['category_id'];
        $this->_data['title_for_layout'] = $text.' Online - '.$dataArticle['Article']['name'];
        $this->_data['slug']    = $text;
        
        $this->_data['url'] = Router::url($this->here, true);
        $this->_data['description'] = $this->Data->subString($dataArticle['Article']['description'],200).$this->_data['description'].",".$dataArticle['Article']['name'];
        $this->_data['keywords'] = strtolower($text).",".$this->Data->showNameArticles($dataArticle['Article']['name']).",".strtolower(Inflector::slug($text,"-",1)).",".strtolower(Inflector::slug($this->Data->showNameArticles($dataArticle['Article']['name']),"-",1));
        $name_img =  $this->Data->get_image_story($dataArticle['Article']['id'].'.jpg',$dir);
        $this->_data['url_image']= Router::url('/img'.$this->webroot.$dir.'/'.$name_img, true);
        $this->set('data', $this->_data);
    }
    public function detail_chap($slug1,$slug2,$slug3,$id = null){
        
        if($slug1 == 'truyen-tranh' || $slug1 == 'truyen_tranh'){
            $dataArticleurl = $this->Articleurl->find('first', array(
                'conditions'=>array('id = '.$id),
                'recursive'=>-1
            ));
            $this->_data['dataArticleurl'] = $dataArticleurl;
            $nameChap = $dataArticleurl['Articleurl']['name'];            
            $article_id = $dataArticleurl['Articleurl']['article_id'];
            /*if(!empty($dataArticleurl['Articleurl']['ordering'])){
                $field = "ordering";
                $value = $dataArticleurl['Articleurl']['ordering'];
            }else{
                $field = "id";
                $value = $id;
            }*/
            $field = "id";
            $value = $id;
            $neighbors = $this->Articleurl->find(
                'neighbors',
                array(
                    'fields'=>array('name', 'id'),
                    'conditions'=>array('Articleurl.article_id'=> $article_id),
                    'field' => $field, 'value' => $value
                )
            );
            $dataListArticle = $this->Articleurl->find('all', array(
                'conditions'=>array('article_id = '.$article_id),
                'fields'    => array('name', 'id','created'),
                'order' =>array('id'=>'DESC'),
                'recursive'=>-1
            ));
            
            $dataArticle = $this->Article->find('first', array(
                'conditions'=>array('id = '.$article_id),
                'recursive'=>-1
            ));
            $nameArticle = $dataArticle['Article']['name'];
            $dir = "story";
        }elseif($slug1 == 'truyen-chu' || $slug1 == 'truyen_chu'){
            $dataStory = $this->Story->find('first', array(
                'conditions'=>array('id = '.$id),
                'recursive'=>-1
            ));
            $this->_data['dataStory'] = $dataStory;
            $nameChap = $dataStory['Story']['title'];
            $catId = $dataStory['Story']['catId'];
            /*if(!empty($dataStory['Story']['ordering'])){
                $field = "ordering";
                $value = $dataStory['Story']['ordering'];
            }else{
                $field = "id";
                $value = $id;
            }*/
            $field = "id";
            $value = $id;
            $neighbors = $this->Story->find(
                'neighbors',
                array(
                    'fields'=>array('title as name', 'id'),
                    'conditions'=>array('Story.catId'=> $catId),
                    'field' => $field, 'value' => $value
                )
            );
            //echo "<pre>";
            //print_r($neighbors); exit;
            //echo "</pre>";      
            $dataListArticle = $this->Story->find('all', array(
                'conditions'=>array('catId = '.$catId),
                'fields'    => array('title as name', 'id'),
                'order' =>array('id'=>'DESC'),
                'recursive'=>-1
            ));            
            $dataArticle = $this->Article->find('first', array(
                'conditions'=>array('id = '.$catId),
                'recursive'=>-1
            ));
            $nameArticle = $dataArticle['Article']['name'];
            $dir = "story_text";         
        }
        $this->_data['neighbors'] = $neighbors;
        $this->_data['nameChap'] = $nameChap;
        $this->_data['nameArticle'] = $nameArticle;        
        $this->_data['article_id'] = $dataArticle['Article']['id'];
        $this->_data['dataListArticle'] = $dataListArticle;
        $this->_data['title_for_layout'] = 'Truyện tranh Online - '.$nameArticle.' - '.$nameChap;
        $this->_data['url'] = Router::url($this->here, true);
        $this->_data['description'] = $this->Data->subString($dataArticle['Article']['description'],200) . $nameChap." ,".$this->_data['description'];
        
        $this->_data['keywords'] = Inflector::slug($slug1,"-",1).",".$this->Data->showNameArticles($nameArticle).",".strtolower(Inflector::slug($nameChap,"-",1)).",".strtolower(Inflector::slug($this->Data->showNameArticles($nameArticle),"-",1));
        $name_img =  $this->Data->get_image_story($dataArticle['Article']['id'].'.jpg',$dir);
        $this->_data['url_image']= Router::url('/img'.$this->webroot.$dir.'/'.$name_img, true);
        
        $dataArticle['Article']['numview'] = $dataArticle['Article']['numview'] + 1; 
        $this->Article->save($dataArticle);
        $this->set('data', $this->_data);
        
    }
    public function searchdropbox(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $value = $arr['key'];            
            $dataArticle = $this->Article->find('all', array(
                'conditions'=>array('Article.status'=>1,'Article.name LIKE'=>'%'.trim($value).'%'),
                'limit' => 10,
                'recursive'=>-1
            ));
            $this->set('data', $dataArticle);
            $this->set('key', $value);
            $form = $this->render('/Stories/search');
            return json_encode($form);   
        }
    }
    public function search(){
        if($this->request->is('get')){
            $arrSearch = $this->request->query;
            $this->_data['dataSearch'] = $arrSearch;
            $this->paginate = array(
                'conditions'=>array('Article.status'=>1,'Article.name LIKE'=>'%'.trim($arrSearch['search']).'%'),
                'limit'=>12,
                'order' => array('id' => 'desc'),
                'recursive'=>-1
            );
            $dataArticle = $this->paginate("Article");        
            $this->_data['story'] = $dataArticle; 
        }
         
        $this->_data['title_for_layout'] = "Kết quả tìm kiếm: ".$arrSearch['search'];
        $this->_data['description'] = "Tim kiem truyen: ".$arrSearch['search']. " " .$this->_data['description'];
        $this->_data['url'] = Router::url($this->here, true);
        $this->set('data', $this->_data);
        return $this -> render('/Stories/search-page');
    }
}