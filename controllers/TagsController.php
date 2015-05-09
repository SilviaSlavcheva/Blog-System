<?php

class TagsController extends BaseController{
    private $db;
    public function onInit() {
       parent::onInit();
       $this->title = "Tags";
       $this->db = new TagsModel();
   }
   public function index() {
       $this->authorize();
       $this->renderView();
   }
}
