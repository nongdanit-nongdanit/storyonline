<?php
App::uses('Validation', 'Utility');

class CandidatesController extends AppController
{
    public $name = "Candidates";
    var $layout = 'admin';
    var $uses = array('Candidate');
    var $components = array('RequestHandler','Cookie');
    public function beforeFilter(){
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }
    function admin_index(){
        $this->set('title_for_layout', 'List candidates');
        $data = $this->Candidate->find('all', array(
                    //'limit'       =>100,
            'conditions'=>array('status'=>1), 
            'order'       =>array('updated'=>'desc','name'=>'asc'),
            'recursive'   =>-1
        ));     
        $this->set('data', $data);
    }
    public function admin_edit($id = null){
        $this->set('title_for_layout', 'Edit');
        $this->Candidate->id = $id;
        $detail = $this->Candidate->find('first', array(
            'conditions'=> array('Candidate.id = '.$id),
            'recursive'=>-1
            )
        );
        $this->set('data', $detail);
        if($this->request->is('post') || $this->request->is('put')){
            $this->request->data['Candidate']['phone'] = str_replace("-", "", $this->request->data['Candidate']['phone']);
            $this->Candidate->set($this->request->data);
            if($this->Candidate->validates(array('fieldList'=>array('email','name')))){
                //print_r($this->request->data); exit;
                $now = date('Y:m:d H:i:s');
                $this->request->data['Candidate']['updated'] = $now;
                if($this->Candidate->save($this->request->data)){
                    $this->Session->setFlash('Update Success','default',array('class'=>"alert alert-success"));
                    $this->redirect(array('action'=>'index'));
                }
            }else{
                $errors = $this->User->validationErrors;
            }

        }
        
    }
    public function admin_add(){
        $this->set('title_for_layout', 'Add');
        if($this->request->is('post') || $this->request->is('put')){
            $this->Candidate->set($this->request->data);
            $this->request->data['Candidate']['phone'] = str_replace("-", "", $this->request->data['Candidate']['phone']);
            if($this->Candidate->validates(array('fieldList'=>array('email','name')))){
                //print_r($this->request->data); exit;
                if($this->Candidate->save($this->request->data)){
                    $this->Session->setFlash('Add Success','default',array('class'=>"alert alert-success"));
                    $this->redirect(array('action'=>'index'));
                }
            }else{
                $errors = $this->User->validationErrors;
            }

        }
        
    }
    public function delete(){
        $this->layout = 'ajax';
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $arr = $this->request->data;
            $id = $arr['id'];
            $data = $this->Candidate->find('first', array(
                    'conditions'=>array('id = '.$id), 
                    'recursive'=>-1
                )
            );
            if(count($data)>0){
                $this->Candidate->delete($id);
                return json_encode('T');
            }else return json_encode('F');
            
        }
    }
}   