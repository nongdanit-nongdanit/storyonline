<?php
class ErrorsController extends AppController {
    public $name = 'Errors';
    public $layout = 'truyentranh';
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('error400');
    }

    public function error400() {
        $this->set('data', $this->_data);
    }
}