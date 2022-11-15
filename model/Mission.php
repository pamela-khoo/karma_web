<?php
require_once ('../karma_web/DBController.php'); 

class Mission {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }

    function getMissionById($id) {
        $query = "SELECT u.id AS id, CONCAT(CONCAT(first_name,' '),last_name) AS name, email, participant_no, m.status AS status, e.id AS event_id, e.name AS event_name
                    FROM mission m JOIN user u ON m.user_id = u.id JOIN events e ON m.event_id = e.id WHERE e.id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function updateMissionStatus($status, $event_id, $id) {
        $query = "UPDATE mission SET status= ? WHERE event_id= ? AND user_id= ?";

        $paramType = "iii";
        $paramValue = array(
            $status,
            $event_id,
            $id,
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
        header('location:index.php?action=mission-view&id='.$event_id);
    } 

    function updateMissionStatusOrg($status, $event_id, $id) {
        $query = "UPDATE mission SET status= ? WHERE event_id= ? AND user_id= ?";

        $paramType = "iii";
        $paramValue = array(
            $status,
            $event_id,
            $id,
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
        header('location:index.php?action=org-mission-view&id='.$event_id);
    } 

}
?>