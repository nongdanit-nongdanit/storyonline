<?php
//ALTER TABLE `articles` ADD `url_img` VARCHAR(500) NOT NULL DEFAULT '' AFTER `url_link`;
//ALTER TABLE `articles` ADD `iswarning` TINYINT(5) NOT NULL DEFAULT '0' AFTER `url_img`;

#http://fuelphp.com/
#http://twig.sensiolabs.org/

App::import('Vendor', 'simple_html_dom');
class ArticlesController extends AppController
{
    var $layout = 'admin'; 
    var $uses = array('Article','Articleurl','Category','Story','Link');
    public $components = array('RequestHandler','Session');
    var $destination    = null;
    
    public function beforeFilter(){
        parent::beforeFilter();
    }
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->destination      = WWW_ROOT.'img'.DS.'story'.DS;            
    }    
    
    function admin_index(){
        $this->set('title_for_layout', 'Danh sách truyện');
        $data = $this->Article->find('all', array(
    			//'limit'       =>100,
                'conditions'=>array('type'=>2, 'iscomplete'=>0), 
    			'order'       =>array('text_chap_end'=>'desc','updated'=>'desc','name'=>'asc'),
                'recursive'   =>-1
        ));     
        $this->set('data', $data);
    }
    function admin_updateliststory(){
        $this->set('title_for_layout', 'Cập nhật danh sách truyện tranh');
        $data = $this->Article->find('all', array(
    			//'limit'       =>100,
                'conditions'=>array('type'=>2, 'iscomplete'=>0, 'text_chap_end <>'=>'', 'status' => 1, 'no_clone'=> 1),
    			'order'       =>array('text_chap_end'=>'desc','updated'=>'desc','name'=>'asc'),
                'recursive'   =>-1
        ));
        
        if(count($data) > 0){
            $dataOK = array();
            foreach($data as $row){
                $url = $row['Article']['url_link'];
                if(!empty($url)){
                    $html = file_get_html($url);
                    $target = array();
                    $target2 = array();
                    $target = $html->find(".info_content div.row .col-md-2 p a");

                    if(!empty($target)) {
                        if($target[0]->innertext != $row['Article']['text_chap_end']){
                            foreach($target as $key=>$element){
                                if($element->innertext == $row['Article']['text_chap_end']){
                                    break;
                                }else{
                                    $html2 = file_get_html($element->href);
                                    $target2 = array();
                                    $target2 = $html2->find(".dtl_img img");
                                    if(!empty($target2)) {
                                        $link_img = "";
                                        foreach($target2 as $key2=>$element2){
                                            $httparr[] = $element2->src;
                                            $link_img .= "" . $element2->src . "#";
                                            //$this->dump_my_html_tree($element2, true);
                                        }
                                        $link_img = "#".$link_img;

                                        $dataArticleurl[]['Articleurl']= array(
                                              'name'    => $element->innertext,
                                              'article_id'    => $row['Article']['id'],
                                              'link_img'    => $link_img,
                                              'created'  => date('Y:m:d H:i:s'),
                                        );
                                    }
                                    //$arr_link_img[] = $link_img; 
                                }
                            }
                            krsort($dataArticleurl);
                        
                        }
                    }
                }
                
            }
                if(!empty($dataArticleurl) && $this->Articleurl->saveAll($dataArticleurl)){
                    foreach($dataArticleurl as $rowdata){

                        $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                        $dataArticle['Article']['text_chap_end'] = $rowdata['Articleurl']['name'];
                        $dataArticle['Article']['id']   = $rowdata['Articleurl']['article_id'];
                        if($this->Article->save($dataArticle)){
                           $dataOK[] = $rowdata['Articleurl']['article_id'];
                        }  
                    }
                }
            
            //print_r($dataOK); //exit;
            $this->set('dataOK', $dataOK);
        }
    }
    function admin_download(){
        $img =array("http://truyenqq.com/ebook/163x212/cross-manage_1478496103.jpg", "http://truyenqq.com/ebook/163x212/haou-airen_1478151136.jpg","http://truyenqq.com/ebook/163x212/bokutachi-wa-shitte-shimatta_1478669052.jpg");
        $j="djkasjdjkadalls";
        /*foreach ($img as $k=>$i) {
            $this->save_image($i,'basename',$j.".jpg");
            $i++;
            $a[] = $j.".jpg";
        }*/
        echo $this->save_image("http://truyenqq.com/ebook/163x212/cross-manage_1478496103.jpg",'basename',"1234.jpg");
        //print_r($img);
        //rename($fullpath, $this->destination . $name);        
    }
    function admin_insertSession(){
        $this->set('title_for_layout', 'Thêm bai theo session');
        $text = "Không còn dữ liệu";
        $abc = array();
        if($this->Session->check('ABC')){
            $abc = $this->Session->consume('ABC');
            if(!empty($abc)){
                $j=0;
                $a = array();
                $b = array();
                foreach($abc as $k=>$v){
                   if($j <= 50){
                        $a[]    = $v;
                   }else{
                        $b[]    = $v;
                   }
                   $j++; 
                }
                $text = "Hết chap";
                if(!empty($b)){ $this->Session->write("ABC",$b); $text = "Còn chap";} 
            }
            if(!empty($a) && $this->Articleurl->saveAll($a)){
                $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                $dataArticle['Article']['text_chap_end'] = $a[count($a)-1]['Articleurl']['name'];
                
                $dataArticle['Article']['id']   = $a[count($a)-1]['Articleurl']['article_id'];
                if($this->Article->save($dataArticle)){
                    $this->Session->setFlash('OK','default',array('class'=>"alert alert-success"));
                    
                }
            }
        }
        
        $this->set('abc',$text);
    }
    function admin_cloneOneUrl(){
        $this->set('title_for_layout', 'Lấy một truyện theo url');
        $dataCategory =  $this->Category->find('all', array(
             'conditions'=>array('parent_id' => 1, 'active'=> 1),
             'recursive'=>-1
        ));
        $this->set('dataCategory',$dataCategory);
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data['Article'];
            $url = $data['url_link'];
            $dataArticle = $this->Article->find('first', array(
                    'conditions'=>array('url_link like "'.$url.'"'), 
                    'recursive'=>-1
                )
            );
            if(!empty($dataArticle)){//cập nhật
                $data['id'] = $dataArticle['Article']['id'];
                if(!empty($url)){
                    $html = file_get_html($url);
                    $target = array();
                    $target2 = array();
                    $target = $html->find(".info_content div.row .col-md-2 p a");
                    $targetwarning = $html->find(".info_gr01 p.alert-warning span");
                    if(!empty($targetwarning)) {
                        $canhbao = $targetwarning[0]->innertext;
                        $canhbao = 1;
                    }else{
                        $canhbao = 0;
                    }
                    
                    $targetdescription =  $html->find(".info_gr01 div.info_txt01 p");
                    if(!empty($targetdescription)) {
                        if(count($targetdescription) >=2){
                            $description = $targetdescription[1]->innertext;
                        }else{
                            $targetdescription =  $html->find(".info_gr01 div.info_txt01");
                            $description = $targetdescription[0]->innertext;
                        }                    
                    }else{
                        $description = "";
                    }
                    
                    if(!empty($target)) {
                        if($target[0]->innertext != $dataArticle['Article']['text_chap_end']){
                            //echo "<ul>";
                            foreach($target as $key=>$element){
                                if($element->innertext == $dataArticle['Article']['text_chap_end']){
                                    break;
                                }else{
                                    $html2 = file_get_html($element->href);
                                    $target2 = array();
                                    $target2 = $html2->find(".dtl_img img");
                                    if(!empty($target2)) {
                                        $link_img = "";
                                        foreach($target2 as $key2=>$element2){
                                            $httparr[] = $element2->src;
                                            $link_img .= "" . $element2->src . "#";
                                            //$this->dump_my_html_tree($element2, true);
                                        }
                                        $link_img = "#".$link_img;
                                        
                                        $dataArticleurl[]['Articleurl']= array(
                                              'name'    => $element->innertext,
                                              'article_id'    => $data['id'],
                                              'link_img'    => $link_img,
                                              'created'  => date('Y:m:d H:i:s'),
                                        );
                                    }
                                    //$arr_link_img[] = $link_img; 
                                }                               
                            }
                            if(!empty($dataArticleurl)){
                                krsort($dataArticleurl);
                                $j=0;
                                foreach($dataArticleurl as $k=>$v){
                                   if($j <= 50){
                                        $a[]    = $v;
                                   }else{
                                        $b[]    = $v;
                                   }
                                   $j++; 
                                }
                                $text = "Hết chap";
                                if(!empty($b)) { $this->Session->write("ABC",$b); $text = "Còn chap";} 
                            }
                            
                            if(!empty($a) && $this->Articleurl->saveAll($a)){
                                $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                                $dataArticle['Article']['text_chap_end'] = $a[count($a)-1]['Articleurl']['name'];
                                $dataArticle['Article']['status'] = 1;
                                
                                $dataArticle['Article']['iswarning'] = $canhbao;
                                //$dataArticle['Article']['description'] = $description;
                                $dataArticle['Article']['iscomplete'] = $data['iscomplete'];
                                $dataArticle['Article']['id']   = $data['id'];
                                if($this->Article->save($dataArticle)){
                                    $this->Session->setFlash('OK - '.$dataArticle['Article']['name'].' - '.$text,'default',array('class'=>"alert alert-success"));
                                    if(!empty($b)){
                                        $this->redirect(array('action' => 'insertSession'));
                                    }                                    
                                }                        
                            }
                            //echo "</ul>";
                        }          
                    }                
                }
            }else{//tạo mới
                if(!empty($url)){
                    $html = file_get_html($url);
                    $target = array();
                    $target2 = array();
                    $target = $html->find(".info_content div.row .col-md-2 p a");
                    $targetwarning = $html->find(".info_gr01 p.alert-warning span");
                    if(!empty($targetwarning)) {
                        $canhbao = $targetwarning[0]->innertext;
                        $canhbao = 1;
                    }else{
                        $canhbao = 0;
                    }
                    
                    $targetdescription =  $html->find(".info_gr01 div.info_txt01 p");
                    if(!empty($targetdescription)) {
                        if(count($targetdescription) >=2){
                            $description = $targetdescription[1]->innertext;
                        }else{
                            $description = "";
                        }                    
                    }else{
                        $description = "";
                    }
                    $targetname =  $html->find(".info_gr01 div.info_text01 h1.info_title");
                    $name =  $targetname[0]->innertext;
                    $targetimg =  $html->find(".info_gr01 div.info_img01 img");
                    $url_img  = $targetimg[0]->src;
                    
                    $dataArticle['Article']['name'] = $name;
                    $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                    $dataArticle['Article']['text_chap_end'] = "";
                    $dataArticle['Article']['status'] = 1;
                    $dataArticle['Article']['numview'] = rand(101,201);
                    $dataArticle['Article']['iswarning'] = $canhbao;
                    //$dataArticle['Article']['description'] = $description;
                    $dataArticle['Article']['iscomplete'] = $data['iscomplete'];
                    $dataArticle['Article']['url_link'] = $url;
                    $dataArticle['Article']['type'] = 2;
                    $dataArticle['Article']['category_id'] = $data['category_id'];
                    if($this->Article->save($dataArticle)){
                        $lastId = $this->Article->id;
                        $this->save_image($url_img,'basename',$lastId.".jpg");
                    } 
                    if(!empty($target)) {
                        if($target[0]->innertext != $dataArticle['Article']['text_chap_end']){
                            $i = 0;
                            foreach($target as $key=>$element){
                                    if($element->innertext == $dataArticle['Article']['text_chap_end']){
                                        break;
                                    }else{
                                        $html2 = file_get_html($element->href);
                                        $target2 = array();
                                        $target2 = $html2->find(".dtl_img img");
                                        if(!empty($target2)) {
                                            $link_img = "";
                                            foreach($target2 as $key2=>$element2){
                                                $httparr[] = $element2->src;
                                                $link_img .= "" . $element2->src . "#";
                                                //$this->dump_my_html_tree($element2, true);
                                            }
                                            $link_img = "#".$link_img;
                                            
                                            $dataArticleurl[]['Articleurl']= array(
                                                  'name'    => $element->innertext,
                                                  'article_id'    => $lastId,
                                                  'link_img'    => $link_img,
                                                  'created'  => date('Y:m:d H:i:s'),
                                            );
                                        }
                                    }                                
                                $i++;
                            }
                            
                            if(!empty($dataArticleurl)){
                                krsort($dataArticleurl);
                                $j=0;
                                foreach($dataArticleurl as $k=>$v){
                                   if($j <= 50){
                                        $a[]    = $v;
                                   }else{
                                        $b[]    = $v;
                                   }
                                   $j++; 
                                }
                                $text = "Hết chap";
                                if(!empty($b)){ $this->Session->write("ABC",$b); $text = "Còn chap";} 
                            }                      
                            if(!empty($a) && $this->Articleurl->saveAll($a)){
                                $dataArticle['Article']['text_chap_end'] = $a[count($a)-1]['Articleurl']['name'];
                                $dataArticle['Article']['id']   = $lastId;
                                if($this->Article->save($dataArticle)){
                                    
                                    $this->Session->setFlash('OK - '.$dataArticle['Article']['name'].' - '.$text,'default',array('class'=>"alert alert-success"));
                                    if(!empty($b)){
                                        $this->redirect(array('action' => 'insertSession'));
                                    }
                                }
                                                       
                            }
                            //echo "</ul>";
                        }          
                    }                
                }
                
            }
            
        }
    }
    function admin_add(){
        $this->set('title_for_layout', 'Thêm');      
             
        $this->set('dataArticle', $this->getAllArticle(array('type'=>2, 'iscomplete'=>0,'no_clone'=>1)));
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data['Article'];
            $dataArticle = $this->Article->find('first', array(
                    'conditions'=>array('id = '.$data['id']), 
                    'recursive'=>-1
                )
            );
            $url = $dataArticle['Article']['url_link'];
            if(!empty($url)){
                $html = file_get_html($url);
                $target = array();
                $target2 = array();
                $target = $html->find(".info_content div.row .col-md-2 p a");
                $targetwarning = $html->find(".info_gr01 p.alert-warning span");
                if(!empty($targetwarning)) {
                    $canhbao = $targetwarning[0]->innertext;
                    $canhbao = 1;
                }else{
                    $canhbao = 0;
                }
                
                $targetdescription =  $html->find(".info_gr01 div.info_txt01 p");
                if(!empty($targetdescription)) {
                    if(count($targetdescription) >=2){
                        $description = $targetdescription[1]->innertext;
                    }else{
                        $description = "";
                    }                    
                }else{
                    $description = "";
                }
                
                if(!empty($target)) {
                    if($target[0]->innertext != $dataArticle['Article']['text_chap_end']){
                        //echo "<ul>";
                        $name_chuong = array();
                        foreach($target as $key=>$element){
                            if($element->innertext == $dataArticle['Article']['text_chap_end']){
                                break;
                            }else{
                                $html2 = file_get_html($element->href);
                                $target2 = array();
                                $target2 = $html2->find(".dtl_img img");
                                if(!empty($target2)) {
                                    $link_img = "";
                                    foreach($target2 as $key2=>$element2){
                                        $httparr[] = $element2->src;
                                        $link_img .= "" . $element2->src . "#";
                                        //$this->dump_my_html_tree($element2, true);
                                    }
                                    $link_img = "#".$link_img;
                                    
                                    $dataArticleurl[]['Articleurl']= array(
                                          'name'    => $element->innertext,
                                          'article_id'    => $data['id'],
                                          'link_img'    => $link_img,
                                          'created'  => date('Y:m:d H:i:s'),
                                    );
                                }
                                //$arr_link_img[] = $link_img; 
                            }
                        }
                        krsort($dataArticleurl);
                        
                        if(!empty($dataArticleurl) && $this->Articleurl->saveAll($dataArticleurl)){
                            $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                            $dataArticle['Article']['text_chap_end'] = $dataArticleurl[0]['Articleurl']['name'];
                            $dataArticle['Article']['status'] = 1;
                            $dataArticle['Article']['numview'] = rand(101,201);
                            $dataArticle['Article']['iswarning'] = $canhbao;
                            //$dataArticle['Article']['description'] = $description;
                            $dataArticle['Article']['iscomplete'] = $data['iscomplete'];
                            $dataArticle['Article']['id']   = $data['id'];
                            if($this->Article->save($dataArticle)){
                                $this->Session->setFlash('OK '.$dataArticle['Article']['name'],'default',array('class'=>"alert alert-success"));
                            }                        
                        }
                        //echo "</ul>";
                    }          
                }
                
            }else{
                $this->Session->setFlash('Chưa cập nhật link dữ liệu','default',array('class'=>"alert alert-success"));
            }            
        }
    }
    function admin_dstruyen($id = 1){
        $this->set('title_for_layout', 'Lấy danh sách truyện trong thể loại');
        $dataTheLoai = $this->danhsachTheLoai($id);
        $this->set('dataTheLoai', $dataTheLoai);
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data['Article'];
            $url = $data['url_link'];
            if(!empty($url)){
                $html = file_get_html($url);
                $target = array();
                $target = $html->find("#content_category div.row .col-md-2 .ind_info div a");
                
                $target2 = $html->find("#content_category div.row .col-md-2 .ind_info div a img");
                if(!empty($target)) {
                    //echo "<ul>";                        
                    //foreach($target as $key=>$element){
                        //$data_urrl[] = $element->href;
                        //$this->dump_my_html_tree($element, true);  
                    //}
                    foreach($target2 as $key2=>$element2){
                        $dataArticleReplace = $this->Article->find('first', array(
                                'fields' => array('id','name'),
                                'conditions'=>array('name like "'.$element2->alt.'"'), 
                                'recursive'=>-1
                            )
                        );
                        if(empty($dataArticleReplace)){
                            $img[] = $element2->src;
                            //$this->dump_my_html_tree($element, true);
                            $dataArticle[]['Article']= array(
                              'name'    => $element2->alt,
                              'category_id'    => $data['category_id'],
                              'created'  => date('Y:m:d H:i:s'),
                              'updated'     => date('Y:m:d H:i:s'),
                              'ishome'  => 0,
                              'status'  => 0,
                              'iscomplete'  => 0,
                              'text_chap_end'   => '',
                              'type'    => 2,
                              'url_link'    => $target[$key2]->href,
                            ); 
                        }                 
                    }
                    
                    if($this->Article->saveAll($dataArticle)){
                        $post_ids=$this->Article->inserted_ids; //contains insert_ids
                        $this->Session->setFlash('OK '.$url,'default',array('class'=>"alert alert-success"));
                    }
                    
                    foreach ($img as $k=>$i) {
                        $this->save_image($i,'basename',$post_ids[$k].".jpg");
                    }
                    //echo "</ul>";
                }
            }
        }
    }
    function admin_clonethichtruyentranh(){
        $this->set('title_for_layout', 'Clone thichtruyentranh');
        
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data['Article'];
            $url = $data['url_link'];
            if(empty($url)){
                $datalink = $this->Link->find('all', array(
                    'limit'       =>50,
                    'order'       =>array('id'=>'asc'),
                    'recursive'   =>-1
                ));
                //echo $datalink[0]['Link']['link'];
                
            }else{
                $datalink = array();
                $datalink[]['Link'] = array(
                    'id'    => 0,
                    'link'  => $url,
                    'title' => "",
                );
                
            }
            $id_chap = $data['id_chap'];
            $alt = $data['alt'];
            $action = $data['action'];
            $idURL = $data['idURL'];
            
            $dataArticle = $this->Article->find('first', array(
                    'conditions'=>array('id' => $id_chap), 
                    'recursive'=>-1
                )
            );
            if(!empty($dataArticle)){
                if(!empty($datalink)){
                    $dataArticleURL = array();
                    //print_r($datalink); exit;
                    foreach($datalink as $row){
                        $url = $row['Link']['link'];
                        if(!empty($url)){
                            $html = file_get_html($url);
                            $target = $html->find("script");
                            $target2 = $html->find(".boxpageleft .divtab_list .breadcum-wrapper div.current a");
                            $name =  $target2[0]->title;
                            if(!empty($target)) {

                                $a = explode(';', $target[5]->innertext);

                                $b = trim(str_replace("var imgArray = [                           '", '', $a[0]));
                                $b1 = str_replace("',               ]", '', $b);
                                $c = explode("',                                '", $b1);
                                $i = 2;
                                //$f = array();
                                $link_img = "";
                                foreach ($c as $d) {
                                    $e = str_replace('<img src="', '', $d);
                                    $f = str_replace('" alt="'.$alt.' ' . $i . '"/>', '', $e);
                                    // Câu truy v?n
                                    $link_img .= "" . $f . "#";

                                    $i++;
                                }
                                $link_img = "#".$link_img;
                            }
                            if(!empty($idURL) && $action==2){
                                $dataArticleurl = $this->Articleurl->find('first', array(
                                    'conditions'=>array('id = '.$idURL), 
                                    'recursive'=>-1
                                    )
                                );

                            }

                            if(!empty($dataArticleurl)){
                                $dataArticleURL['Articleurl']['link_img'] = $link_img;
                                $dataArticleURL['Articleurl']['created'] = date('Y:m:d H:i:s');
                                $dataArticleURL['Articleurl']['id'] = $idURL;
                                if($this->Articleurl->save($dataArticleURL)){
                                    $dataArticlea['Article']['id']   = $id_chap;
                                    $dataArticlea['Article']['no_clone']   = 0;
                                    $dataArticlea['Article']['text_chap_end'] = $name;
                                    $dataArticlea['Article']['updated'] = date('Y:m:d H:i:s');
                                    if($this->Article->save($dataArticlea)){
                                        $this->Session->setFlash('OK - '.$dataArticle['Article']['name'],'default',array('class'=>"alert alert-success"));
                                        return;
                                    }
                                }
                            }else{
                                $dataArticleURL[]['Articleurl']= array(
                                    'name'    => $name,
                                    'article_id'    => $id_chap,
                                    'link_img'  => $link_img,
                                    'created'     => date('Y:m:d H:i:s'),
                                  );
                                $this->Link->delete($row['Link']['id']);
                            }
                        }
                    }
                    if( !empty($dataArticleURL) &&  $this->Articleurl->saveAll($dataArticleURL)){
                        $count = count($dataArticleURL) - 1;
                        $dataArticlea['Article']['id']   = $id_chap;
                        $dataArticlea['Article']['no_clone']   = 0;
                        $dataArticlea['Article']['text_chap_end'] = $dataArticleURL[$count]['Articleurl']['name'];
                        $dataArticlea['Article']['updated'] = date('Y:m:d H:i:s');
                        if($this->Article->save($dataArticlea)){
                            $this->Session->setFlash('OK - '.$dataArticle['Article']['name'],'default',array('class'=>"alert alert-success"));
                        }
                    }
                }
                
            }
        }
    }
    public function clonechap(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $id = $arr['id'];
            $dataArticle = $this->Article->find('first', array(
                    'conditions'=>array('id ='.$id), 
                    'recursive'=>-1
                )
            );
            
            if(!empty($dataArticle)){//cập nhật
                $url = $dataArticle['Article']['url_link'];
                if(!empty($url)){
                    $html = file_get_html($url);
                    $target = array();
                    $target2 = array();
                    $target = $html->find(".info_content div.row .col-md-2 p a");
                    $targetwarning = $html->find(".info_gr01 p.alert-warning span");
                    if(!empty($targetwarning)){
                        $canhbao = $targetwarning[0]->innertext;
                        $canhbao = 1;
                    }else{
                        $canhbao = 0;
                    }
                    
                    $targetdescription =  $html->find(".info_gr01 div.info_txt01 p");
                    if(!empty($targetdescription)) {
                        if(count($targetdescription) >=2){
                            $description = $targetdescription[1]->innertext;
                        }else{
                            $targetdescription =  $html->find(".info_gr01 div.info_txt01");
                            $description = $targetdescription[0]->innertext;
                        }                    
                    }else{
                        $description = "";
                    }
                    
                    if(!empty($target)) {
                        if($target[0]->innertext != $dataArticle['Article']['text_chap_end']){
                            $name_chuong = array();
                            foreach($target as $key=>$element){
                                if($element->innertext == $dataArticle['Article']['text_chap_end']){
                                    break;
                                }else{
                                    $html2 = file_get_html($element->href);
                                    $target2 = array();
                                    $target2 = $html2->find(".dtl_img img");
                                    if(!empty($target2)) {
                                        $link_img = "";
                                        foreach($target2 as $key2=>$element2){
                                            $httparr[] = $element2->src;
                                            $link_img .= "" . $element2->src . "#";
                                            //$this->dump_my_html_tree($element2, true);
                                        }
                                        $link_img = "#".$link_img;
                                        
                                        $dataArticleurl[]['Articleurl']= array(
                                              'name'    => $element->innertext,
                                              'article_id'    => $id,
                                              'link_img'    => $link_img,
                                              'created'  => date('Y:m:d H:i:s'),
                                        );
                                    }
                                }
                            }
                            krsort($dataArticleurl);
                            
                            if(!empty($dataArticleurl) && $this->Articleurl->saveAll($dataArticleurl)){
                                $dataArticle['Article']['updated'] = date('Y:m:d H:i:s');
                                $dataArticle['Article']['text_chap_end'] = $dataArticleurl[0]['Articleurl']['name'];
                                $dataArticle['Article']['status'] = 1;
                                
                                $dataArticle['Article']['iswarning'] = $canhbao;
                                //$dataArticle['Article']['description'] = $description;
                                $dataArticle['Article']['id']   = $id;
                                if($this->Article->save($dataArticle)){
                                    return json_encode('T');
                                }
                            }else return json_encode('F');
                        }else return json_encode('F');
                    }else return json_encode('F');
                }else return json_encode('F');
            }else return json_encode('F');
        }
    }
    public function delete(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $id = $arr['id'];
            $data = $this->Article->find('first', array(
                    'conditions'=>array('id = '.$id), 
                    'recursive'=>-1
                )
            );
            if(count($data)>0){
                if($data['Article'] ['type']==1){//chữ
                    $this->Story->query("DELETE FROM `stories` WHERE `catId` = ".$id);
                    @unlink(WWW_ROOT.'img'.DS.'story_text'.DS.$id.".jpg");
                }else{
                    $this->Articleurl->query("DELETE FROM `articleurls` WHERE `article_id` = ".$id);
                    @unlink(WWW_ROOT.'img'.DS.'story'.DS.$id.".jpg");
                }
                
                $this->Article->delete($id);
                return json_encode('T');
            }else return json_encode('F');
            
        }
    }
    function ishome(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax())
        {
            $arr = $this->request->data;
            $id = $arr['id'];
            $val = $arr['val'];
            $data = $this->Article->find('first', array(
                    'fields' => array('ishome', 'id'),
                    'conditions'=>array('id = '.$id), 
                    'recursive'=>-1
            ));
            if(!empty($data))
            {
                $ar = array();
                $ar['ishome'] = $val;
                $ar['id'] = $id;
                $this->Article->save($ar);
                return json_encode('T');                    
            }else
            {
                return json_encode('F');
            }
        }
   }
   function ishot(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax())
        {
            $arr = $this->request->data;
            $id = $arr['id'];
            $val = $arr['val'];
            $data = $this->Article->find('first', array(
                    'fields' => array('ishot', 'id'),
                    'conditions'=>array('id = '.$id), 
                    'recursive'=>-1
            ));
            if(!empty($data))
            {
                $ar = array();
                $ar['ishot'] = $val;
                $ar['id'] = $id;
                $this->Article->save($ar);
                return json_encode('T');                    
            }else
            {
                return json_encode('F');
            }
        }
   }
   function noclone(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $id = $arr['id'];
            $val = $arr['val'];
            $data = $this->Article->find('first', array(
                    'fields' => array('no_clone', 'id'),
                    'conditions'=>array('id = '.$id), 
                    'recursive'=>-1
            ));
            if(!empty($data))
            {
                $ar = array();
                $ar['no_clone'] = $val;
                $ar['id'] = $id;
                $this->Article->save($ar);
                return json_encode('T');                    
            }else
            {
                return json_encode('F');
            }
        }
   }  
    private function save_image($img, $fullpath = 'basename',$name) {
        if ($fullpath == 'basename') {
          $fullpath = basename($img);
        }
        $ch = curl_init ($img);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $rawdata = curl_exec($ch);
        curl_close ($ch);
     
        if (file_exists($fullpath)) {
          unlink($fullpath);
        }
     
        $fp = @fopen($fullpath, 'x+');
        fwrite($fp, $rawdata);
        fclose($fp);
        //Di chuyển file ảnh sang thư mục khác
        
        rename(WWW_ROOT.$fullpath, $this->destination . $name);
        //move_uploaded_file($tmp_name, $this->destination . $name); 
        //copy(WWW_ROOT.$fullpath, $this->destination . $name);
      }
        
    
    private function danhsachTheLoai($id){
        $arrProducer = $this->Category->find('all', array(
            'fields' => array('category_id', 'name'),
            'conditions' => array('parent_id = '.$id),
            'recursive'   =>-1
        ));
        $arr = array(); 
        if(count($arrProducer)>0)
        {
            foreach($arrProducer as $row){
                $arr[$row['Category']['category_id']] = $row['Category']['name']; 
            }
        }else{
            $arr[0]='No data';
        }
        
        return $arr;
    }
    
    
    
    private function dump_my_html_tree($node, $show_attr=true, $deep=0, $last=true) {
        $count = count($node->nodes);
        if ($count>0) {
            if($last)
                echo '<li class="expandable lastExpandable"><div class="hitarea expandable-hitarea lastExpandable-hitarea"></div>&lt;<span class="tag">'.htmlspecialchars($node->tag).'</span>';
            else
                echo '<li class="expandable"><div class="hitarea expandable-hitarea"></div>&lt;<span class="tag">'.htmlspecialchars($node->tag).'</span>';
        }
        else {
            $laststr = ($last===false) ? '' : ' class="last"';
            echo '<li'.$laststr.'>&lt;<span class="tag">'.htmlspecialchars($node->tag).'</span>';
        }
    
        if ($show_attr) {
            foreach($node->attr as $k=>$v) {
                echo ' '.htmlspecialchars($k).'="<span class="attr">'.htmlspecialchars($node->$k).'</span>"';
            }
        }
        echo '&gt;';
        
        if ($node->tag==='text' || $node->tag==='comment') {
            echo htmlspecialchars($node->innertext);
            return;
        }
    
        if ($count>0) echo "\n<ul style=\"display: none;\">\n";
        $i=0;
        foreach($node->nodes as $c) {
            $last = (++$i==$count) ? true : false;
            $this->dump_my_html_tree($c, $show_attr, $deep+1, $last);
        }
        if ($count>0)
            echo "</ul>\n";
    
        //if ($count>0) echo '&lt;/<span class="attr">'.htmlspecialchars($node->tag).'</span>&gt;';
        echo "</li>\n";
    }
    private function getAllArticle($sql){
        $dataArticle = $this->Article->find('all', array(
                'fields' => array('id', 'name','updated'),
    			'order'       =>array('name'=>'asc', 'id'=>'asc'),
                'conditions'=>$sql,
                'recursive'   =>-1
        ));
        $arr = array(); 
        if(count($dataArticle)>0)
        {
            foreach($dataArticle as $row){
                $arr[$row['Article']['id']] = array('name' => $row['Article']['name']." - (". $row['Article']['updated']." )", 'value' =>  $row['Article']['id'], 'myTag' => $row['Article']['name']) ; 
            }
        }else{
            $arr[0]='No data';
        }
        
        return $arr;
    }
    
    
    //Font-end
    public function getArticle($type=1){
        if($type == 1){
            $dataArticle = $this->Article->find('all', array(
                'conditions'=>array('ishot = 1 and status = 1'),
                'limit'=>4,
                'order' =>array('name'=>'DESC'),
                'recursive'=>-1
            ));
        }
        return $dataArticle;
    }
    
    
}