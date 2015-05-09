<?php

class UsersController extends BaseController {
    public function  create() {
    }
    public function  onInit() {
        $this->title = "User.";
    }
    public function index() {
      $this->renderView();
    }
    
}

