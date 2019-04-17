<?php
    class User extends AppModel {
    
        var $name = "User";
        //var $primaryKey = "user_id";
        
        public $validate = array(
            'username' =>array(
                'too long'=>array(
                    'rule' => array('between', 5, 32),
                    'message' => 'Username phải lớn 5 ký tự'
                ),
                'not empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Username không được để trống'
                ),
                'duplicate username' => array(
                    'rule'=>'isUnique',
                    'message' => 'Username này đã có người dùng'
                )
            ),
            'password' => array(
                'too long' => array(
                    'rule' => array('between', 6, 32),
                    'message' => 'Mật khẩu phải từ 6 ký tự đến 32 ký tự'
                ),
                'not empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Mật khẩu không được để trống'
                ),
                'Match Password' => array(
                    'rule' => 'matchPasswords',
                    'message' => 'Không trùng khớp mật khẩu'
                )
            ),
            'confirm_password' => array(
                'too long' => array(
                    'rule' => array('between', 6, 32),
                    'message' => 'Nhập 6 - 32 ký tự'
                ),
                'not empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Vui lòng xác nhận mật khẩu'
                )
            ),
            'currentpassword' => array(
                /*'too long' => array(
                    'rule' => array('between', 6, 32),
                    'message' => 'Mật khẩu phải từ 6 ký tự đến 32 ký tự'
                ),*/
                'not Empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Nhập mật khẩu cũ.'
                ),
                'check password' => array(
                    'rule' => 'checkPassword',
                    'message'=> 'Sai Mật khẩu.'
                )
            ),
            'email' => array(
                'valid email' => array(
                    'rule' => 'email',
                    'message' => 'Nhập địa chỉ email hợp lệ'
                ),
                'duplicate email' => array(
                    'rule'=>'isUnique',
                    'message' => 'email đã có người sử dụng'
                )
            ),
            'name' => array(
                'not empty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Vui lòng nhập họ tên'
                )
            ),
            'phone' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Vui lòng nhập đúng số điện thoại'
			),
            'image' => array(
                'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
                'message' => 'Hinh anh khong hop le.'
            )
        );
        public $belongsTo = array(
          'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id'
            ),
            'City'=>array(
                'className' => 'City',
                'foreignKey' => 'city_id'
            ),
        );
        public function beforeSave($options = array()) {
            // Use bcrypt
            if (isset($this->data['User']['password'])) {
                $hash = Security::hash($this->data['User']['password'], 'blowfish');
                $this->data['User']['password'] = $hash;                
            }
            return true;
        }
        
        public function matchPasswords($data){
            if($this->data['User']['password']==$this->data['User']['confirm_password']){
                return true;
            }
            $this->invalidate('confirm_password', 'Không trùng khớp mật khẩu');
            return false;
        }
        
        public function checkPassword($data){
            $currentUser = $this->find('first', array('conditions'=>array('User.id= '.AuthComponent::user('id'))));
            $hashPass = Security::hash($data['currentpassword'], 'blowfish', $currentUser['User']['password']);
            if($currentUser['User']['password'] == $hashPass){
                return true;
            }
            return false;
        }
    }