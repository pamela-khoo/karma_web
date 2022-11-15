<?php
require_once ('../karma_web/DBController.php'); 

class Organization {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function getOrganization() {
        $sql = "SELECT * FROM organization";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getOrganizationById($id) {
        $query = "SELECT * FROM organization WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function addOrganization($org_name,$status,$description,$logo_url,$org_url,$user_id) {
        $query = "INSERT INTO organization (org_name, status, description, logo_url, org_url, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "sisssi";
        $paramValue = array(
            $org_name,
            $status,
            $description,
            $logo_url,
            $org_url,
            $user_id,
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editOrganization($org_name,$status,$description,$logo_url,$org_url,$user_id,$id) {
        $query = "UPDATE organization SET org_name = ?,status = ?, description = ?, logo_url = ?, org_url = ?, user_id = ? WHERE id = ?";
        $paramType = "sisssii";
        $paramValue = array(
            $org_name,
            $status,
            $description,
            $logo_url,
            $org_url,
            $user_id,
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }  

    function deleteOrganization($organization_id) {
        try {
            $query = "DELETE FROM organization WHERE id = ?";
            $paramType = "i";
            $paramValue = array(
                $organization_id
            );
            $this->db_handle->update($query, $paramType, $paramValue);
        } catch (mysqli_sql_exception $e) {
            $e->getMessage();
            echo '<script>alert("Organization cannot be deleted\nCannot delete organization with associated records");</script>';
            echo '<script>window.location.href = "index.php?action=org-view";</script>';
        }
    }

     /**
     * Organization-side  
     * 
     * ***/  
    function getOrganizerOrganization($user_id) {
        $query = "SELECT * FROM organization WHERE user_id = ? ";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

}
?>