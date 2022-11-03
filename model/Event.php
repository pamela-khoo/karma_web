<?php
require_once ('../karma_db/DBController.php'); 

class Event {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function getEvent() {
        $sql = "SELECT * FROM events";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getEventById($id) {
        $query = "SELECT * FROM events WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function addEvent($name,$start_date,$end_date,$start_time,$end_time,$description,
                        $status,$venue,$category,$organization,$points,$image_url,$limit_registration) {
        $query = "INSERT INTO events (name, start_date, end_date, start_time, end_time, description, status, venue,
                    category, organization, points, image_url, limit_registration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssssisiiisi";
        $paramValue = array(
            $name,
            $start_date,
            $end_date,
            $start_time,
            $end_time,
            $description,
            $status,
            $venue,
            $category,
            $organization,
            $points,
            $image_url,
            $limit_registration
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editEvent($name,$start_date,$end_date,$start_time,$end_time,$description,$status,
                        $venue,$category,$organization,$points,$image_url,$limit_registration,$id) {
        $query = "UPDATE events SET name = ?,start_date = ?, end_date = ?, start_time = ?, end_time = ?, description = ?,
                    status = ?, venue = ?, category = ?, organization = ?, points = ?, image_url = ?, limit_registration = ? WHERE id = ?";
        $paramType = "ssssssisiiisii";
        $paramValue = array(
            $name,
            $start_date,
            $end_date,
            $start_time,
            $end_time,
            $description,
            $status,
            $venue,
            $category,
            $organization,
            $points,
            $image_url,
            $limit_registration,
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }  

    function deleteEvent($event_id) {
        try {
            $query = "DELETE FROM events WHERE id = ?";
            $paramType = "i";
            $paramValue = array(
                $event_id
            );
            $this->db_handle->update($query, $paramType, $paramValue);
        } catch (mysqli_sql_exception $e) {
            $e->getMessage();
            echo '<script>alert("Event cannot be deleted\nCannot delete event with associated records");</script>';
            echo '<script>window.location.href = "index.php?action=event-view";</script>';
        }
    }

}
?>