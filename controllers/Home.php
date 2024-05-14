<?php 
include MODELS . "Home_model.php";
class Home {

    private $home_model;

    public function __construct() {
        $this->home_model = new Home_model();
    }

    public function index(): void  {
        $data = array();
        $data["title"] = "Home";
        $data["current"] = "home";

        $data["posts"] = $this->home_model->getAllPosts();


        showLayout("home", $data);
    }
}