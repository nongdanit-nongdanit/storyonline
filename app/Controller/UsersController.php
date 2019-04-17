<?php
App::uses('Validation', 'Utility');

class UsersController extends AppController
{
    public $name = "Users";
    var $layout = 'admin';
    var $uses = array('User','Letter');
    var $components = array('RequestHandler','Cookie');
    public function beforeFilter(){
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }
    
    public function admin_login(){
        //Kiêm tra user có quyền đăng nhập ko
        if($this->request->is('post')){
            if($this->Auth->login()){
                if($this->Auth->user('role_id')==2){
                    $this->redirect('/admin/candidates/index');
                }else{
                    $this->redirect('/admin/categories');
                }
                //return $this->redirect($this->Auth->redirectUrl());
            }else{
                //$this->Flash->error(__('Invalid username or password, try again'));
                $this->Session->setFlash('Username hoặc pass sai');
            }
        }
    }
    
    public function admin_logout(){
        $this->redirect($this->Auth->logout());
    }
    //Back-end
    public function admin_changePass($id=null){
        $this->set('title_for_layout', 'Change Password');
        if($this->request->is('post') || $this->request->is('put')){
            $this->User->set($this->request->data);
            
            if($this->User->validates(array('fieldList'=>array('currentpassword', 'password', 'confirm_password')))){
                $passNew = $this->request->data['User']['password'];
                $data1 = array('User'=>array(
                    'id' => $id,
                    'password' => $passNew
                ));
                
                $this->User->id = $id;
                if($this->User->save($data1)){
                    $this->Session->setFlash('Đổi mật khẩu thành công, Vui lòng login vào lại');
                    $this->redirect(array('action'=>'logout'));
                }  
            }else{
                $errors = $this->User->validationErrors;
            }
        }
    }
    public function admin_index(){
        
        $this->set('user',$user = array());
    }
    
    //Phần font-end
    public function newsletter(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $email = $arr['email'];
            if(empty($email)){
                echo "Vui lòng nhập email của bạn";
                return;
            }
            $isValid = Validation::email($email); // Returns true or false
            if($isValid){
                $data_Newsletter = $this->Letter->find('first', array(
                    'conditions'    => array('email' => $email),
                    'recursive'     =>-1
                ));
                if(!empty($data_Newsletter)){
                    echo "Email đã tồn tại, vui lòng nhập email khác";
                    return;
                }else{
                    $data['Letter']['email'] = $email;
                    $data['Letter']['status'] = 1;
                    $data['Letter']['created'] = date('Y:m:d H:i:s');
                    if($this->Letter->save($data)){
                        echo "Đăng ký thành công";
                        return;
                    }else echo "Đã có lỗi xảy ra, vui lòng thử lại";
                }
                
            }else{
                echo "Vui lòng nhập đúng định dạng email";
            }
        }
    }
}   