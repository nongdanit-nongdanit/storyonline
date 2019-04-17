<?php 
App::uses('ExceptionRenderer', 'Error');
class AppExceptionRenderer extends ExceptionRenderer{
    /*protected function _outputMessage($template) {
        $this->controller->layout = 'error';
        parent::_outputMessage($template);
        //$this->redirect('/errors/error400');
    }*/
    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error400'));
    }
    public function missingController($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error400'));
    }
    public function missing_action($error){
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error400'));
    }
}