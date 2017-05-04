<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.05.17
 * Time: 16:27
 */
    class Categories
    {
        private $conn;

        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        public function getAllCategories()
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
    }