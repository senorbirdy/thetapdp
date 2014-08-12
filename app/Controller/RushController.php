<?php

class RushController extends AppController {

    public $data = array(
            'title_for_layout' => 'RPI PDPSI - RUSH',
            'home_link' => '',
            'about_link' => '',
            'rush_link' => 'active',
            'brothers_link' => '',
            'gallery_link' => '',
            'calendar_link' => '',
            'contact_link' => '',
            'left_rush_link' => '',
            'why_link' => '',
            'faq_link' => ''
        );

    public function index() {
        $this->set($this->data);
    }
    
    public function why() {
        $this->set($this->data);
    }

    public function faq() {
        $this->set($this->data);
    }
}
?>
