<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.05.17
 * Time: 11:35
 */
    class Inventory
    {
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function addInventory(
            $category,$model,$article,$s_number,$price,$owner,$condition,$date,$w_period,$w_end,$comments)
        {
            try
            {
                $stmt = $this->conn->prepare("INSERT INTO inventory(category, model, article, s_number, 
		                                      price, owner, condition, date, w_period, w_end, comments) 
		                                      VALUES(:category, :model, :article, :s_number,
		                                      :price, :owner, :condition, :date, :w_period, :w_end, :comments)");

                $stmt->bindparam(":category", $category);
                $stmt->bindparam(":model", $model);
                $stmt->bindparam(":article", $article);
                $stmt->bindparam(":s_number", $s_number);
                $stmt->bindparam(":price", $price);
                $stmt->bindparam(":owner", $owner);
                $stmt->bindparam(":condition", $condition);
                $stmt->bindparam(":date", $date);
                $stmt->bindparam(":w_period", $w_period);
                $stmt->bindparam(":w_end", $w_end);
                $stmt->bindparam(":comments", $comments);

                $stmt->execute();

                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function selectInventories($options = array())
        {
            $allInv = array();
            $limit = '';
            if (isset($options['limit'])) {
                $limit=  $this->conn->prepare('limit ' . $options['limit']);
                $limit = $limit->queryString;
            }
            try
            {
                $stmt = $this->conn->prepare("SELECT * FROM inventory $limit");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $allInv = $stmt->fetchAll();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            return $allInv;
        }


    }