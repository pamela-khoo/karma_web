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

    function addOrganization($org_name,$status,$description,$logo_url) {
        $query = "INSERT INTO organization (org_name, status, description, logo_url) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = array(
            $org_name,
            $status,
            $description,
            $logo_url,
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editOrganization($org_name,$status,$description,$logo_url,$id) {
        $query = "UPDATE organization SET org_name = ?,status = ?, description = ?, logo_url = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $org_name,
            $status,
            $description,
            $logo_url,
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

}
?>