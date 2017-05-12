<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 03.05.17
 * Time: 11:35
 */
require_once 'dbconfig.php';

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

    public function addInventory($data)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO inventory(category, model, article, s_number, 
		                                      price, owner, `condition`, date, w_period, w_end, comments) 
		                                      VALUES(:category, :model, :article, :s_number,
		                                      :price, :owner, :condition, :date, :w_period, :w_end, :comments)");


            $stmt->bindparam(":category", $data['category']);
            $stmt->bindparam(":model", $data['model']);
            $stmt->bindparam(":article", $data['article']);
            $stmt->bindparam(":s_number", $data['s_number']);
            $stmt->bindparam(":price", $data['price']);
            $stmt->bindparam(":owner", $data['owner']);
            $stmt->bindparam(":condition", $data['condition']);
            $stmt->bindparam(":date", $data['date']);
            $stmt->bindparam(":w_period", $data['w_period']);
            $stmt->bindparam(":w_end", $data['w_end']);
            $stmt->bindparam(":comments", $data['comments']);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateInventory($data)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE inventory SET
                                        category = :category,
                                        model = :model,
                                        article = :article,
                                        s_number = :s_number,
                                        price = :s_number,
                                        owner = :owner,
                                        `condition` = :condition,
                                        `date` = :date,
                                        w_period = :w_period,
                                        w_end = :w_end,
                                        comments = :comments
                                        WHERE id = :id;
                                        ");

            $stmt->bindparam(":category", $data['category']);
            $stmt->bindparam(":model", $data['model']);
            $stmt->bindparam(":article", $data['article']);
            $stmt->bindparam(":s_number", $data['s_number']);
            $stmt->bindparam(":price", $data['price']);
            $stmt->bindparam(":owner", $data['owner']);
            $stmt->bindparam(":condition", $data['condition']);
            $stmt->bindparam(":date", $data['date']);
            $stmt->bindparam(":w_period", $data['w_period']);
            $stmt->bindparam(":w_end", $data['w_end']);
            $stmt->bindparam(":comments", $data['comments']);
            $stmt->bindparam(":id", $data['id']);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectInventories($options = array())
    {
        $allInv = array();
        $limit = '';
        $where = 'where 1';
        if (isset($options['limit'])) {
            $limit = $this->conn->prepare('limit ' . $options['limit']);
            $limit = $limit->queryString;
        }
        if (isset($options['where'])) {
            $where .= $this->conn->prepare(" and CAT.title LIKE '%" . $options['where'] .
                "%' OR INV.model LIKE '%" . $options['where'] .
                "%' OR INV.article LIKE '%" . $options['where'] .
                "%' OR INV.s_number LIKE '%" . $options['where'] .
                "%' OR INV.price LIKE '%" . $options['where'] .
                "%' OR INV.owner LIKE '%" . $options['where'] .
                "%' OR INV.`condition` LIKE '%" . $options['where'] .
                "%' OR INV.comments LIKE '%" . $options['where'] . "%'" )->queryString;

        }
        if (isset($options['cat_id'])){
            $where .= $this->conn->prepare(" and CAT.id =" . $options['cat_id'])->queryString;
        }
        try {
            $stmt = $this->conn->prepare("SELECT INV.*,CAT.title AS category FROM inventory INV LEFT JOIN categories CAT ON INV.category = CAT.id $where $limit");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $allInv = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $allInv;
    }

    public function selectInventory($id)
    {
        $inventory = '';
        try {
            $stmt = $this->conn->prepare("SELECT INV.*,CAT.title AS category FROM inventory INV LEFT JOIN categories CAT ON INV.category = CAT.id WHERE INV.id=:id");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $inventory = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $inventory;
    }

    public function deleteInventory($id)
    {
        $del = '';

        try {
            $stmt = $this->conn->prepare("DELETE FROM inventory WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $del = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $del;
    }

}