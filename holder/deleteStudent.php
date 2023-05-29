<?php


header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include '../Studentdatabase/databasestd.php';
include '../StudentModel/student.php';



$database = new DatabaseStd();
$db = $database->getConnection();
$items = new Student($db);


$items->id = (int) $_POST['id'] ;


if($items->deleteStudent()){
    echo json_encode("User data Delete.");
} else{
    echo json_encode("Data could not be Delete");

}



?>