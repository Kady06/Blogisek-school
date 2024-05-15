<?php
include MODELS . "Home_model.php";
include MODELS ."Administration_model.php";
class Home
{

    private $home_model;
    private $administration_model;

    public function __construct()
    {
        $this->home_model = new Home_model();
        $this->administration_model = new Administration_model();
    }

    public function index(): void
    {
        $data = array();
        $data["title"] = "Home";
        $data["current"] = "home";

        $data["curr_category"] = null;


        $data["categories"] = $this->administration_model->getCategories();

        if (isset($_GET["search"]) && !empty($_GET["search"])) {
            $data["search"] = $_GET["search"];
            $data["posts"] = $this->home_model->getSearchPost($_GET["search"]);
        } else {
            $data["posts"] = $this->home_model->getAllPosts();
        }

        if ($data["posts"] === []) {
            $data["errorMessage"] = "Nebylo nic nalezeno";
        }
        showLayout("home", $data);
    }

    public function category($id): void
    {
        $data = array();
        $data["title"] = "Home";
        $data["current"] = "home";

        if (!$this->home_model->existsCategory($id)) header("Location: /");

        $data["curr_category"] = $id;


        $data["categories"] = $this->administration_model->getCategories();

        if (isset($_GET["search"]) && !empty($_GET["search"])) {
            $data["search"] = $_GET["search"];
            $data["posts"] = $this->home_model->getSearchPost($_GET["search"], $id);
        } else {
            $data["posts"] = $this->home_model->getAllPosts($id);
        }

        if ($data["posts"] === []) {
            $data["errorMessage"] = "Nebylo nic nalezeno";
        }
        showLayout("home", $data);
    }
    
}
