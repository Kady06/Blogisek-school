<?php
require DATABASE;

class Administration_model
{

    public function createCategory(string $name, string $description): mixed
    {
        global $pdo;

        $query = "INSERT INTO categories (name, description) VALUES (:name, :description)";
        $values = array(":name" => $name, ":description" => $description);

        try {
            $pdo->prepare($query)->execute($values);
            return "Kategorie byla úspěšně vytvořena!";
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createPost(int $category, string $title, string $author, string $content): mixed
    {
        global $pdo;

        $query = "INSERT INTO posts (category_id, title, author, content) VALUES (:category, :title, :author, :content)";
        $values = array(":category" => $category, ":title" => $title, ":author" => $author, ":content" => $content);

        try {
            $pdo->prepare($query)->execute($values);
            return "Příspěvek byl úspěšně vytvořen!";
        } catch (PDOException $e) {
            return false;
        }
    }

    public function editPost(int $id, int $category, string $title, string $author, string $content) {
        global $pdo;

        $query = "UPDATE posts SET category_id = :category, title = :title, author = :author, content = :content WHERE id = :id";
        $values = array(":id"=> $id, ":category"=> $category, ":title"=> $title, ":author"=> $author, ":content"=> $content);

        try {
            $pdo->prepare($query)->execute($values);
            return "Příspěvek byl úspěšně upraven!";
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getPosts(): array
    {
        global $pdo;

        $query = "SELECT posts.*, categories.name as category_name FROM posts JOIN categories ON posts.category_id = categories.id ORDER BY created_at DESC";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getCategories(): array
    {
        global $pdo;

        $query = "SELECT * FROM categories ORDER BY name";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
}
