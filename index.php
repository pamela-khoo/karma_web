<?php
require_once ("model/Category.php");
require_once ("model/Event.php");
require_once ("model/Mission.php");
require_once ("model/Organization.php");

$action = "";

if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    /**
     * Category
     * 
     **/
    case "category-view":
        $category = new Category();
        $result = $category->getCategory();
        require_once "view/category_view.php";
        break;

    case "category-add":
            if (isset($_POST['add_cat'])) {
                $name = $_POST['name'];
                $status = $_POST['status'];
                
                $category = new Category();
                $insertId = $category->addCategory($name, $status);
                if (empty($insertId)) {
                    $response = array(
                        "message" => "Problem in Adding New Record",
                        "type" => "error"
                    );
                    echo '<script>alert("Problem in Adding New Record");</script>';
                } 
                echo '<script>alert("Recorded Added Succesfully");</script>';
            }
            require_once "view/category_add.php";
            break;

    case "category-edit":
        $id = $_GET["id"];
        $category = new Category();
        
        if (isset($_POST['add_cat'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            
            $category->editCategory($name, $status, $id);
            echo '<script>alert("Recorded Edited Succesfully");</script>';
        }
        
        $result = $category->getCategoryById($id);
        
        require_once "view/category_edit.php";
        break;

    case "category-delete":
        $category_id = $_GET["id"];
        $category = new Category();
        
        $category->deleteCategory($category_id);
        
        $result = $category->getCategory();
        require_once "view/category_view.php";
        break;

    /**
     * Event
     * 
     * ***/
    case "event-view":
        $event = new Event();
        $result = $event->getEvent();
        require_once "view/event_view.php";
        break;

    case "event-add":
        if (isset($_POST['add_event'])) {
            $name = $_POST['name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $venue = $_POST['venue'];
            $category = $_POST['category'];
            $organization = $_POST['organization'];
            $points = $_POST['points'];
            $image_url = $_POST['image_url'];
            $limit_registration = $_POST['limit_registration'];
            
            $event = new Event();
            $insertId = $event->addEvent($name,$start_date,$end_date,$start_time,$end_time,$description,
                        $status,$venue,$category,$organization,$points,$image_url,$limit_registration);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
                
                echo '<script>alert("Problem in Adding New Record");</script>';

            } 
            echo '<script>alert("Recorded Added Succesfully");</script>';
        }

        require_once "view/event_add.php";
        break;

    case "event-edit":
        $id = $_GET["id"];
        $event = new Event();
        
        if (isset($_POST['add_event'])) {
            $name = $_POST['name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $venue = $_POST['venue'];
            $category = $_POST['category'];
            $organization = $_POST['organization'];
            $points = $_POST['points'];
            $image_url = $_POST['image_url'];
            $limit_registration = $_POST['limit_registration'];
            
            $event->editEvent($name,$start_date,$end_date,$start_time,$end_time,$description,
                                $status,$venue,$category,$organization,$points,$image_url,$limit_registration,$id);
            echo '<script>alert("Recorded Edited Succesfully");</script>';
        }
        
        $result = $event->getEventById($id);
        
        require_once "view/event_edit.php";
        break;

    case "event-delete":
        $event_id = $_GET["id"];
        $event = new Event();
        
        $event->deleteEvent($event_id);
        
        $result = $event->getEvent();
        require_once "view/event_view.php";
        break;

    case "mission-view":
        $id = $_GET["id"]; 
        $mission = new Mission();       
        $result = $mission->getMissionById($id);
        
        require_once "view/mission_view.php";
        break;

    case "update-status":
        $status = $_GET['status'];
        $eid = $_GET['event_id'];
        $uid = $_GET['id'];

        $mission = new Mission();  
        $result = $mission->updateMissionStatus($status, $eid, $uid);
        break;

    /**
     * Organization
     * 
     * ***/
    case "org-view":
        $organization = new Organization();
        $result = $organization->getOrganization();
        require_once "view/organization_view.php";
        break;
        
    case "org-add":
        if (isset($_POST['add_org'])) {
            $org_name = $_POST['org_name'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $logo_url = $_POST['logo_url'];

            
            $organization = new Organization();
            $insertId = $organization->addOrganization($org_name, $status, $description, $logo_url);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
                echo '<script>alert("Problem in Adding New Record");</script>';
            } 
            echo '<script>alert("Recorded Added Succesfully");</script>';
        }
        require_once "view/organization_add.php";
        break;

    case "org-edit":
        $id = $_GET["id"];
        $organization = new Organization();
        
        if (isset($_POST['add_org'])) {
            $name = $_POST['org_name'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $logo_url = $_POST['logo_url'];

            $organization->editOrganization($name, $status, $description, $logo_url, $id);
            echo '<script>alert("Recorded Edited Succesfully");</script>';
        }
        
        $result = $organization->getOrganizationById($id);
        require_once "view/organization_edit.php";
        break;

    case "org-delete":
        $organization_id = $_GET["id"];
        $organization = new Organization();
        
        $organization->deleteOrganization($organization_id);
        
        $result = $organization->getOrganization();
        require_once "view/organization_view.php";
        break;

    default:
        require_once "view/dashboard.php";
        break;
}



?>