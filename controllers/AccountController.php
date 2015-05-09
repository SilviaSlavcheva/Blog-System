<?php

class AccountController extends BaseController{
    private $db;
    public function onInit() {
        parent::onInit();
        $this->db = new AccountModel();
    }

    public function register() {
        if ($this->isPost) {
            $username = $_POST['username'];
            if ($username == null || strlen($username) < 3) {
                $this->addErrorMessage("Üsername is invalid!");
                $this->redirect("account", "register");
            }
            $password = $_POST['password'];
            
            $isRegister = $this->db->register($username, $password);
            if ($isRegister) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful registration!");
                $this->redirect("posts", "index");
            } else {
                $this->addErrorMessage("register failed!");
            }
        }
        $this->renderView(__FUNCTION__);
    }
    public function login() {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLogin = $this->db->login($username, $password);
            var_dump($isLogin);
            if ($isLogin) {
            $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful login!");
               return $this->redirect("posts", "index");
            }
            else {
                $this->addErrorMessage("Login error!");
                
            }
        }
        $this->renderView(__FUNCTION__);
    }
    public function logout() {
        $this->authorize();
        unset($_SESSION['username']);
        $this->addInfoMessage("Successful logout!");
        $this->redirectToUrl("/");
    }
}
