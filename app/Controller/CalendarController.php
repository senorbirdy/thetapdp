<?php

class CalendarController extends AppController {

    public function index() {
        $data = array(
            'title_for_layout' => 'RPI PDPSI - CALENDAR',
            'home_link' => '',
            'about_link' => '',
            'rush_link' => '',
            'brothers_link' => '',
            'gallery_link' => '',
            'calendar_link' => 'active',
            'contact_link' => ''
        );
        $this->set($data);
    }
}
?>
