<?php

class HomeController extends AppController {

    public function index() {
        $data = array(
            'title_for_layout' => 'RPI PDPSI - HOME',
            'home_link' => 'active',
            'about_link' => '',
            'rush_link' => '',
            'brothers_link' => '',
            'gallery_link' => '',
            'calendar_link' => '',
            'contact_link' => ''
        );
        $this->set($data);
        $this->loadModel('Gallery');
        $db = $this->Gallery->Photo->getDataSource();
        $subQuery = $db->buildStatement(
            array(
                'fields'     => array('MIN(Photo2.id)'),
                'table'      => $db->fullTableName($this->Gallery->Photo),
                'alias'      => 'Photo2',
                'group'      => 'gallery' 
            ),
            $this->Gallery->Photo
        );
        $subQuery = 'id IN ('.$subQuery.')';
        $subQueryExpression = $db->expression($subQuery);
        $conditions[] = $subQueryExpression;
        $fields = array('gallery', 'image_file_name');
        $photos = $this->Gallery->Photo->find('list', compact('fields', 'conditions'));
        $galleries = $this->Gallery->find('all', array('order' => 'Gallery.id ASC'));
        $galleries = Set::extract('/Gallery/.', $galleries);
        $this->set('galleries', $galleries);
        $this->set('photos', $photos);
    }
}
?>
