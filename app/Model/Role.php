<?php
    class Role extends AppModel{
        var $name = "Role";
        //var $primaryKey = "role_id";
        var $hasMany = array(
           'User' => array(
                'classname' => 'User',
                'foreignKey' => 'role_id'
           ) 
        );
        public $validate = array(
            'name' => array(
                'too long'=>array(
                    'rule' => array('between', 5, 32),
                    'message' => 'Tên quyền chỉ cho phép nhập từ 5 - 32 ký tự'
                ),
                'not empty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Tên quyền không được để trống'
                ),
                'duplicate name' => array(
                    'rule' => 'isUnique',
                    'message' => 'Tên quyền này đã dùng'
                )
            )            
        );
    }
?>