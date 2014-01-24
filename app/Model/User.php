<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'username' => array(
            '' => array(
                'rule' => 'isUnique',
                'required' => true,
                'allowEmpty' => false,
            )
        ),
    );
}