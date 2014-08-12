<?php

App::uses('AppModel', 'Model');

class Contact extends AppModel {

    public $name = 'Contact';

    public $useTable = false;

    public $validate = array(
        'subject' => array(
            'rule' => 'notEmpty',
            'required' => true, 
            'allowEmpty' => false,
            'message' => 'Subject cannot be blank'
        ),
        'body' => array(
            'rule' => 'notEmpty',
            'required' => true, 
            'allowEmpty' => false,
            'message' => 'Message cannot be black'
        ),
        'email' => array(
            'rule' => array('email',true),
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Invalid Email'
        )
    );


}

?>
