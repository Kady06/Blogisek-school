<?php
include MODELS . "Administration_model.php";

class administration
{

    private $administration_model;

    public function __construct()
    {
        $this->administration_model = new Administration_model();
    }


    public function index(): void
    {
        $data = array();

        $data["title"] = "Administrace";
        $data["current"] = "administration";
        $data["sub_current"] = "index";


        showLayout("administration/administration", $data);
    }

    public function categories(): void
    {
        $data = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["categoryName"];
            $description = $_POST["categoryDescription"];

            if (empty($name) || empty($description)) {
                $data["errorMessage"] = "Všechna pole musí být vyplněna!";
            } else {
                $result = $this->administration_model->createCategory($name, $description);
                if ($result) {
                    $data["successMessage"] = $result;
                } else {
                    $data["errorMessage"] = "Něco se pokazilo!";
                }
            }
        }

        $data["title"] = "Kategorie";
        $data["current"] = "administration";
        $data["sub_current"] = "categories";

        $data['all_categories'] = $this->administration_model->getCategories();

        showLayout("administration/categories", $data);
    }

    public function posts(): void
    {
        $data = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type-create"])) {
            $category = $_POST["category"];
            $title = $_POST["title"];
            $author = $_POST["author"];
            $content = $_POST["content"];

            if (empty($category) || empty($title) || empty($author) || empty($content)) {
                $data["errorMessage"] = "Všechna pole musí být vyplněna!";
            } else {
                $result = $this->administration_model->createPost($category, $title, $author, $content);
                if ($result) {
                    $data["successMessage"] = $result;
                } else {
                    $data["errorMessage"] = "Něco se pokazilo!";
                }
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type-edit"])) {
            $id = $_POST["id"];
            $category = $_POST["category"];
            $title = $_POST["title"];
            $author = $_POST["author"];
            $content = $_POST["content"];
            if (empty($category) || empty($title) || empty($author) || empty($content) || empty($id)) {
                $data["errorMessage"] = "Všechna pole musí být vyplněna!";
            } else {
                $result = $this->administration_model->editPost($id, $category, $title, $author, $content);
                if ($result) {
                    $data["successMessage"] = $result;
                } else {
                    $data["errorMessage"] = "Něco se pokazilo!";
                }
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type-delete"])) {
            $id = $_POST["id"];

            if (empty($id)) {
                $data["errorMessage"] = "Nastala chyba, zkuste to znovu!";
            } else {
                $result = $this->administration_model->deletePost($id);
                if ($result) {
                    $data["successMessage"] = $result;
                } else {
                    $data["errorMessage"] = "Něco se pokazilo";
                }
            }
        }

        $data["title"] = "Příspěvky";
        $data["current"] = "administration";
        $data["sub_current"] = "posts";

        $data["posts"] = $this->administration_model->getPosts();
        $data["categories"] = $this->administration_model->getCategories();


        showLayout("administration/posts", $data);
    }
}
