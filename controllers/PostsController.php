<?php
class PostsController extends BaseController {
     private $db;
    

    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
        $this->dbc = new CommentsModel();
        $this->dbt = new TagsModel();
    }

    public function index($page = 0, $pageSize = 10) {
        $this->authorize();
        $from = $page * $pageSize;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->posts = $this->db->getFilteredPosts($from, $pageSize);
        $this->tags = $this->dbt->getAll();
        $this->renderView();
    }

    public function create() {
        $this->authorize();
        if ($this->isPost) {
            $title = $_POST['title'];
            if (strlen($title) < 2) {
                $this->addFieldValue('title', $title);
                $this->addValidationError("title", "The post title should be greater than 2");
                return $this->renderView(__FUNCTION__);
            }
            if ($this->db->createPost($title)) {
                $this->addInfoMessage("Post created.");
                $this->redirect('posts');
            } else {
                $this->addErrorMessage("Error creating post.");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function delete($id) {
        $this->authorize();
        if ($this->db->deletePost($id)) {
            $this->addInfoMessage("Post deleted.");
        } else {
            $this->addErrorMessage("Cannot delete post.");
        }
        $this->redirect('posts');
    }
    
    public function showPosts() {
        $this->posts = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
    
    public function seePost($id) {
        self::$counterVisitors++;
        $this->visitors = $this->db->setVisitors(self::$counterVisitors, $id);
        $this->post = $this->db->getPostById($id);
        $this->comments = $this->dbc->getCommentByPostId($id);
        $this->renderView(__FUNCTION__);
    }
    
    public function showUserPosts() {
         $this->authorize();
        $this->userId = $this->db->getUserIdByUsername($_SESSION['username']);
        
        $this->userPosts = $this->db->getPostByUserId($this->userId[0]['id']);
        
        $this->renderView(__FUNCTION__, false);
    }
    
    public function SeePostByTag($id) {
    
        self::$counterVisitors++;
        $this->visitors = $this->db->setVisitors(self::$counterVisitors, $id);
        $this->post = $this->dbt->getPostByTagId($id);
        if ($this->post) {
            $this->comments = $this->dbc->getCommentByPostId($this->post[0]['id']);
        }
        
        $this->renderView(__FUNCTION__);
    }
}