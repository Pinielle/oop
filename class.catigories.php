<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.05.17
 * Time: 16:27
 */
require_once 'dbconfig.php';
    class Categories
    {
        private $conn;

        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        public function selectCategories()
        {
            $allCat = '';
            try
            {
                $stmt = $this->conn->prepare("SELECT title,id FROM categories");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $allCat = $stmt->fetchAll();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            return $allCat;

        }

        public function selectCategory($id)
        {
            $category = '';
            try
            {
                $stmt = $this->conn->prepare("SELECT FROM categories WHERE id=:id");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $category = $stmt->fetch();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            return $category;
        }

        public function addCategory($data)
        {
            try
            {
                $stmt = $this->conn->prepare("INSERT INTO categories (title) VALUES (:title)");


                $stmt->bindparam(":title", $data['title']);
                $stmt->execute();


                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function updateCategory($data)
        {
            try {
                $stmt = $this->conn->prepare("UPDATE categories SET
                                        title = :title
                                        WHERE id = :id;
                                        ");

                $stmt->bindparam(":title", $data['title']);
                $stmt->bindparam(":id", $data['id']);
                $stmt->execute();

                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function deleteCategory($id)
        {
            $del = '';

            try {
                $stmt = $this->conn->prepare("DELETE FROM categories WHERE id=:id");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $del = $stmt->fetch();
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
            return $del;
        }
    }