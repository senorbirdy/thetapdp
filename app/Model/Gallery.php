<?php

App::uses('AppModel', 'Model');

class Gallery extends AppModel {

    public $name = 'Gallery';
    public $primaryKey = 'title';
    public $hasMany = array(
        'Photo' => array('foreignKey' => 'gallery')
    );

}

?>
