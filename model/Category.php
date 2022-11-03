<?php
require_once ('../karma_db/DBController.php'); 

class Category {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function getCategory() {
        $sql = "SELECT * FROM category";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getCategoryById($id) {
        $query = "SELECT * FROM category WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function addCategory($name, $status) {
        $query = "INSERT INTO category (name, status) VALUES (?, ?)";
        $paramType = "si";
        $paramValue = array(
            $name,
            $status
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editCategory($name, $status, $id) {
        $query = "UPDATE category SET name = ?,status = ? WHERE id = ?";
        $paramType = "sii";
        $paramValue = array(
            $name,
            $status,
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }  

    function deleteCategory($category_id) {
        try {
            $query = "DELETE FROM category WHERE id = ?";
            $paramType = "i";
            $paramValue = array(
                $category_id
            );
            $this->db_handle->update($query, $paramType, $paramValue);
        } catch (mysqli_sql_exception $e) {
            $e->getMessage();
            echo '<script>alert("Category cannot be deleted\nCannot delete category with associated records");</script>';
            echo '<script>window.location.href = "index.php?action=category-view";</script>';
        }
    }

}
?>