<?php

class GalleryController extends AppController {

    public $data = array(
            'title_for_layout' => 'RPI PDPSI - GALLERIES',
            'home_link' => '',
            'about_link' => '',
            'rush_link' => '',
            'brothers_link' => '',
            'gallery_link' => 'active',
            'calendar_link' => '',
            'contact_link' => ''
        );

    public $components = array('Paginator', 'RequestHandler');

    public $paginate = array(
        'Photo' => array (
            'fields' => array('Photo.id', 'Photo.image_file_name'),
            'limit' => 20,
            'order' => array(
                'Photo.id' => 'asc'
            )
        ),
    );

    public function index() {
        $this->set($this->data);
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

    public function show($gallery) {
        $this->Paginator->settings = $this->paginate;
        $photos = $this->Paginator->paginate(
            'Photo',
            array('Photo.gallery' => $gallery)
        );

        $this->set($this->data);
        $photos = Set::extract('/Photo/.', $photos);
        $this->set('gallery', $gallery);
        $this->set('photos', $photos);
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath = 'Elements';
            $this->render('gallery_page');
        }
    }
}
?>
