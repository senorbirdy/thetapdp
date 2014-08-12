<?php

App::uses('CakeEmail', 'Network/Email');

class ContactsController extends AppController {

    public $data = array(
            'title_for_layout' => 'RPI PDPSI - CONTACT',
            'home_link' => '',
            'about_link' => '',
            'rush_link' => '',
            'brothers_link' => '',
            'gallery_link' => '',
            'calendar_link' => '',
            'contact_link' => 'active'
        );

    public $components = array('Session');

    public function index() {
        $this->set($this->data);
    }

    public function mail() {
        $this->Contact->set($this->request->data);
        if($this->Contact->validates()){
            $msg = $this->request->data;
            CakeEmail::deliver(
                'pdpimmortal@gmail.com', 
                '[PDP WEBMAIL]: '. $msg[0]['subject'], 
                $msg[0]['body'],
                array( 
                    'from' => $msg[0]['email'],
                    'sender' => 'thetaorg@thetapdpsi.org'
                )
            );
            $this->Session->setFlash('Thanks for your message', false, array('div' => false));
            $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
        } else {
            $errors = $this->Contact->validationErrors;
            $errors = Set::extract('/Contact/.', $errors);
            $this->set('errors', $errors);
            $this->set($this->data);
            $this->render('index');
        }
    }

}
?>
