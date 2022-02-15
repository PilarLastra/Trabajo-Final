<?php

namespace DAO;

use DAO\IStudentDAO as IStudentDAO;
use Classes\Users\Student as Student;
use DAO\Connection as Connection;
use \Exception as Exception;

class StudentDAO implements IStudentDAO
{
    private $studentList = array();
    private $tableName = "student";
    

    public function Add(Student $student)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (id, first_name, career_id, file_number, active, last_name, dni, gender, birth_date, email, password, phone_number) VALUES (:id, :first_name, :career_id, :file_number, :active, :last_name, :dni, :gender, :birth_date, :email, :password, :phone_number);";
            $parameters["id"] = $student->getStudentId();
            $parameters["first_name"] = $student->getName();
            $parameters["career_id"] = $student->getCareerId();
            $parameters["file_number"] = $student->getFileNumber();
            $parameters["active"] = $student->getActive();
            $parameters["last_name"] = $student->getLastName();
            $parameters["dni"] = $student->getDni();
            $parameters["gender"] = $student->getGender();
            $parameters["birth_date"] = $student->getBirthDate();
            $parameters["email"] = $student->getEmail();
            $parameters["password"] = $student->getPassword();
            $parameters["phone_number"] = $student->getPhoneNumber();
            
            
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetByEmail($email)
    {
        $student = null;
        try {
            $query = "SELECT * FROM $this->tableName WHERE email like '$email%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
               $student = $resultSet;
                }
            return $student;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function GetAll()
    {
        $studentList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $student = new Student();
                $student->setStudentId($row["id"]);
                $student->setCareerId($row["career_id"]);
                $student->setFileNumber($row["file_number"]);
                $student->setActive($row["active"]);
                $student->setName($row["first_name"]);
                $student->setLastName($row["last_name"]);
                $student->setDni($row["dni"]);
                $student->setGender($row["gender"]);
                $student->setPhoneNumber($row["phone_number"]);
                $student->setBirthDate($row["birth_date"]);
                $student->setEmail($row["email"]);
                $student->setPassword($row["password"]);
                $student->setUserType($row["user_type"]);



                array_push($studentList, $student);
            }

            return $studentList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function MatchByCareerId($name)
    {
        try {
            $query = "SELECT career.id from career WHERE career.description like '$name%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $row){
                $id=$row['id'];
             }
        
            return $id;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
