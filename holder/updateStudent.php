<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include '../Studentdatabase/databasestd.php';
include '../StudentModel/student.php';



$database = new DatabaseStd();
$db = $database->getConnection();
$items = new Student($db);


$items->id = (int) $_POST['id'] ;

$items->name = $_POST['name'];
$items->age = $_POST['age'];
$items->mark = $_POST['mark'];
$items->email =$_POST['email'] ;
$items->city = $_POST['city'];


if($items->updateStudent()){
    echo json_encode("Student data updated.");
} else{
    echo json_encode("Data could not be updated");
}



?>