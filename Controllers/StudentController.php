<?php

namespace Controllers;

use Classes\Alert;
use DAO\StudentDAO as StudentDAO;
use Classes\Users\Student as Student;
use DAO\CareerDAO;
use Exception;

class StudentController
{
    private $studentDAO;


    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "index.php");
    }

    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
        $this->careerDAO =new CareerDAO();
    }

    public function ShowListView()
    {
        $studentList = $this->studentDAO->GetAll();

        require_once(VIEWS_PATH . "/student-list.php");
    }

    public function ViewProfile($name)
    {
        $studentList = $this->studentDAO->GetAll();

        require_once(VIEWS_PATH . "/student-profile.php");
    }

    public function ShowCompanyListView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "company-list.php");
    }

    public function ShowAddView ()
    {
        $careerList = $this->careerDAO->GetAll();
        require_once(VIEWS_PATH . "/add-student.php");
    }


    public function Add($studentId, $firstName, $lastName, $dni, $gender, $birthDate, $email, $password, $phoneNumber, $careerId, $fileNumber, $active)
    {
        $alert = new Alert("","");
       try{
        $student = new Student();
        $student->setStudentId($studentId);
        $student->setCareerId($careerId);
        $student->setName($firstName);
        $student->setLastName($lastName);
        $student->setDni($dni);
        $student->setFileNumber($fileNumber);
        $student->setGender($gender);
        $student->setBirthDate($birthDate);
        $student->setEmail($email);
        $student->setPassword($password);
        $student->setPhoneNumber($phoneNumber);
        $student->setActive($active);
        $this->studentDAO->Add($student);

        $this->ShowListView();
       }
    catch(Exception $ex){
        $alert ->setType("danger");
        $alert->setMessage($ex->getMessage());
    }

    }
}
