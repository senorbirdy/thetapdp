<?php

class AboutController extends AppController {

    public $data = array(
        'title_for_layout' => 'RPI PDPSI - ABOUT',
        'home_link' => '',
        'about_link' => 'active',
        'rush_link' => '',
        'brothers_link' => '',
        'gallery_link' => '',
        'calendar_link' => '',
        'contact_link' => '',
        'intro_link' => '',
        'history_link' => '',
        'mission_link' => ''
    );

    public function index() {
        $this->set($this->data);
    }

    public function history() {
        $this->set($this->data);
    }

    public function mission() {
        $this->set($this->data);
    }
}
?>
