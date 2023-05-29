<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include '../Studentdatabase/databasestd.php';
include '../StudentModel/student.php';



$database = new DatabaseStd();
$db = $database->getConnection();
$items = new Student($db);

$data = json_decode(file_get_contents("php://input"));


$items->name = $_POST['name'];
$items->age = $_POST['age'];
$items->mark = $_POST['mark'];
$items->email =$_POST['email'] ;
$items->city = $_POST['city'];


if($items->createStudent()){
    echo 'Student created successfully.';
} else{
    echo 'Student could not be created.';
}


?>
