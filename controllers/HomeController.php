<?php

class HomeController extends BaseController {
    public function onInit() {
        parent::onInit();
        $this->title = "Home";
    }
    public function index() {
        $this->renderView();
    }
}


