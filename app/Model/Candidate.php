<?php
class Candidate extends AppModel {

    var $name = "Candidate";
    var $useDbConfig = 'senior';

    public $validate = array(
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
        'avatar' => array(
            'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
            'message' => 'Hinh anh khong hop le.'
        )
    );
    public $belongsTo = array(
      
    );
}