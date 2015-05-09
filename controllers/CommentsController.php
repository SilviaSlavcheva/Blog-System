<?php

class CommentsController extends BaseController{
    private $db;
    
    public function onInit() {
        parent::onInit();
        $this->title = "Comments";
        $this->db = new CommentsModel();
    }
    public function index() {
        parent::index();
        $this->authorize();
        $this->comments = $this->db->getAll();
        $this->renderView();
    }
}
