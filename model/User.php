<?php
require_once ('../karma_web/DBController.php'); 
session_start();  

class User {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }

    function __destruct() {
        
    }  

    function loginAdmin($email, $password){  
        $conn = $this->db_handle->connectDB();
        $query = "SELECT id, CONCAT(CONCAT(first_name,' '),last_name) AS name, email FROM user 
                    WHERE email = '".$email."' AND password = '".$password."' AND status = 1 AND role = 0";
        $res = mysqli_query($conn, $query);  
        $user_data = mysqli_fetch_array($res);  
        $no_rows = mysqli_num_rows($res);  
        
        if ($no_rows == 1)   
        {  
            $_SESSION['login'] = true;  
            $_SESSION['uid'] = $user_data['id'];  
            $_SESSION['name'] = $user_data['name'];  
            $_SESSION['email'] = $user_data['email'];  
            return TRUE;  
        }  
        else  
        {  
            return FALSE;  
        }  
    }  

    function getUser() {
        $sql = "SELECT id, CONCAT(CONCAT(first_name,' '),last_name) AS name, email, points, status FROM user";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getUserById($id) {
        $query = "SELECT * FROM user WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function editUser($first_name, $last_name, $status, $email, $points, $role, $user_id) {
        $query = "UPDATE user SET first_name = ?, last_name = ?, status = ?, email = ?, points = ?, role = ? WHERE id = ?";
        $paramType = "ssisiii";
        $paramValue = array(
            $first_name, $last_name, $status, $email, $points, $role, $user_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }  

    function deleteUser($user_id) {
        try {
            $query = "DELETE FROM user WHERE id = ?";
            $paramType = "i";
            $paramValue = array(
                $user_id
            );
            $this->db_handle->update($query, $paramType, $paramValue);
        } catch (mysqli_sql_exception $e) {
            $e->getMessage();
            echo '<script>alert("User cannot be deleted\nCannot delete user with associated records");</script>';
            echo '<script>window.location.href = "index.php?action=user-view";</script>';
        }
    }

    /**
     * Organization-side  
     * 
     * ***/  

    function loginOrg($email, $password){  
        $conn = $this->db_handle->connectDB();
        $query = "SELECT id, CONCAT(CONCAT(first_name,' '),last_name) AS name, email FROM user 
                    WHERE email = '".$email."' AND password = '".$password."' AND status = 1 AND role = 2";
        $res = mysqli_query($conn, $query);  
        $user_data = mysqli_fetch_array($res);  
        $no_rows = mysqli_num_rows($res);  
        
        if ($no_rows == 1)   
        {  
            $_SESSION['login'] = true;  
            $_SESSION['uid'] = $user_data['id'];  
            $_SESSION['name'] = $user_data['name'];  
            $_SESSION['email'] = $user_data['email'];  
            return TRUE;  
        }  
        else  
        {  
            return FALSE;  
        }  
    }  

    function getVolunteer() {
        $sql = "SELECT id, CONCAT(CONCAT(first_name,' '),last_name) AS name, email, points, status FROM user u WHERE role = 1";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}  
?>  