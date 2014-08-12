<?php

class BrothersController extends AppController {

    public $data = array(
            'title_for_layout' => 'RPI PDPSI - BROTHERS',
            'home_link' => '',
            'about_link' => '',
            'rush_link' => '',
            'brothers_link' => 'active',
            'gallery_link' => '',
            'calendar_link' => '',
            'contact_link' => ''
        );

    public function index() {
        $brothers = $this->Brother->find('all', array('fields' => array('Brother.id', 'Brother.name', 'Brother.pledge_name', 'Brother.pledge_class')));
        $brothers = Set::extract('/Brother/.', $brothers);
        $this->set($this->data);
        $this->set('brothers', $brothers);
        $this->set('id', '');
    }

    public function show($id) {
        $brothers = $this->Brother->find('all', array('fields' => array('Brother.id', 'Brother.name')));
        $current = $this->Brother->find('first', array('conditions' => array('Brother.id' => $id)));
        $brothers = Set::extract('/Brother/.', $brothers);
        $current = Set::extract('/Brother/.', $current);
        $this->set($this->data);
        $this->set('brothers', $brothers);
        $this->set('id', $id);
        $this->set('current', $current[0]);
    }
}

?>
