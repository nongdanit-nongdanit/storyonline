<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $_data = array(
        'title_for_layout' 		=> 'Truyện Online',
		'description'	=> 'Tổng hợp truyện tranh, truyện chữ online hay, mới nhất cập nhật liên tục,anime ,one pice, vua hai tac',
		'keywords'		=> 'truyen online, truyen chu online, doc truyen online, manga, doc truyen.',
        'url_image'     => 'http://truyenweb.info/truyentranh/images/one_pice.jpg',
        'site_name'     => 'Truyenweb.info',
        'url'           => 'http://truyenweb.info/',
        
    );
    
	public $components = array(
		//'DebugKit.Toolbar',
		'Data',
		'Session',
		'Auth'=>array(
			'authenticate' => array(
				'Blowfish' => array(
					'userModel' => 'User',
				)
			),
			'loginAction' => array('admin'=>true, 'controller'=>'users', 'action'=>'login'),
			'loginRedirect' => array('admin'=>true, 'controller'=>'users', 'action'=>'index'),
			'logoutRedirect' => array('admin'=>true, 'controller'=>'users', 'action'=>'login'),
			'authError' => 'You can not access that page',
			'authorize' => array('Controller')
		)
	);
	public function beforeFilter(){
		//Thông tin chung
		/*$this->loadModel('General');
		$General = $this->General->find('first', array(
			'conditions'=>array("general_id=1"),
			'recursive'=>-1
		));
		$this->set('General', $General['General']);*/
		if($this->params['prefi
			x'] == "admin"){
            if($this->Auth->loggedIn()){
                $this->Auth->allow(); 
            }
        }else{
            $this->Auth->allow(); 
        }
        
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
		$this->set("DataComponent", $this->Data);
	}
}
