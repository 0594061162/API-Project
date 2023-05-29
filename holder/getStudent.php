<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: *");

    include '../Studentdatabase/databasestd.php';
    include '../StudentModel/student.php';
    
    
    
    $database = new DatabaseStd();
    $db = $database->getConnection();
    $items = new Student($db);
    $stmt = $items->getStudent();
    $itemCount = $stmt->num_rows;
    

    if($itemCount > 0){
        
        $studentArr = array();
        $studentArr["student"] = array();
        $studentArr["Count"] = $itemCount;
        while ($row = $stmt->fetch_assoc()){
            $e = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "age" => $row["age"],
                "mark" => $row["mark"],
                "email" => $row["email"],
                "city" => $row["city"]
            );
            array_push($studentArr["student"], $e);
        }
        echo json_encode($studentArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
    
    
    ?>