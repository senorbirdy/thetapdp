<?php

App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

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

    public $components = array('Session', 'Security', 'Recaptcha.Recaptcha');

    public function index() {
        $this->set($this->data);
    }

    public function mail() {
        $this->Contact->set($this->request->data);
        $valid_data = $this->Contact->validates();
        $valid_captcha = $this->Recaptcha->verify();
        if($valid_data && $valid_captcha){
            CakeEmail::deliver(
                'pdpimmortal@gmail.com', 
                '[PDP WEBMAIL]: '. $this->request->data('Contact.subject'), 
                'Email: '.$this->request->data('Contact.email')."\n".$this->request->data('Contact.body'),
                array('from' => 'rpipdpsi@rpi-pdpsi.org')
            );
            $this->Session->setFlash('Thanks for your message', false, array('div' => false));
            $this->redirect(array('controller' => 'contact', 'action' => 'index'));
        } else {
            if (!$valid_captcha) {
                $captcha_error = '<div class="error-message">Invalid Captcha</div><p></p>' ;
                $this->set('captcha_error', $captcha_error);
            }
            if (!$valid_data) {
                $errors = $this->Contact->validationErrors;
                $errors = Set::extract('/Contact/.', $errors);
                $this->set('errors', $errors);
            }
            $this->set($this->data);
            $this->render('index');
        }
    }

}
?>
