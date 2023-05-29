<?php
class Student{
        // Connection
        private $conn;
        // Table
        private $db_table = "student";
        // Columns
        
        
        
        public $id;
        public $name;
        public $age;
        public $email;
        public $mark;
        public $city;

        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getStudent(){
            $sqlQuery = "SELECT * FROM " 
              . $this->db_table . "";
            $stmt = $this->conn->query($sqlQuery);
            
          
            return $stmt;
        }


        public function createStudent(){
          $sqlQuery = 
            "INSERT INTO $this->db_table (name, age, mark, email,city ) VALUES
             ('$this->name', '$this->age','$this->mark','$this->email','$this->city')";

          $stmt = $this->conn->query($sqlQuery);
      
          if($stmt){
             return true;
          }
          return false;
      }


      public function updateStudent(){
        $sqlQuery = "UPDATE  $this->db_table  SET
                    name = '$this->name' , age = '$this->age' ,mark = '$this->mark',email = '$this->email',city = '$this->city'
                  WHERE id = '$this->id' ";
    
        $stmt = $this->conn->query($sqlQuery);

        if($stmt){
           return true;
        }
        return false;
    }


    
    function deleteStudent(){
        $sqlQuery = "DELETE FROM $this->db_table WHERE id = '$this->id'";
        $stmt = $this->conn->query($sqlQuery);
       
        if($stmt){
            return true;
        }
        return false;
    }
        
}

?>