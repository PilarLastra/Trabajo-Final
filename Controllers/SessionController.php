<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\AdminDAO as AdminDAO;
use DAO\SessionDAO as SessionDAO;

class SessionController
{
    private $UserDAO;
    private $studentDAO;
    private $adminDAO;
    private $sessionDAO;


    public function __construct()
    {
        $this->UserDAO = new UserDAO();
        $this->studentDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
        $this->sessionDAO = new SessionDAO();
    }

    public function ValidateAdmin(){
        $this->sessionDAO ->ValidateAdmin();
    }

    public function ValidateStudent(){
        $this->sessionDAO ->ValidateStudent();
    }

    public function ValidateCompany(){
        $this->sessionDAO ->ValidateCompany;
    }


    public function Login($email, $password)
    {
        $user = $this->sessionDAO->GetUser($email, $password);
        if($user !=null){
        $logged = $this->sessionDAO->Login($user);
        if ($logged == "admin") {
            FRONT_ROOT . "/Session/ValidateAdmin.php";
            require_once(VIEWS_PATH . "/admin-home.php");
            } else {
                FRONT_ROOT . "/Session/ValidateStudent.php";
                require_once(VIEWS_PATH . "/student-home.php");
            }  
        }
        else if($user = $this->sessionDAO->GetCompany($email, $password)){
            if($user !=null){
                $_SESSION["loggedUser"] = $user;
                FRONT_ROOT . "/Session/ValidateCompany.php";
                require_once(VIEWS_PATH . "/company-home.php");
        
        }
    }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";

        }
    
    }

    public function RegisterViewStudent()
    {
        require_once(VIEWS_PATH . "/register-student.php");
    }

    public function RegisterViewCompany()
    {
        require_once(VIEWS_PATH . "/register-company.php");
    }

    public function Register($email, $password){
        $this->sessionDAO->Register($email, $password);
        FRONT_ROOT . '/Home/Index';
    }

    public function Logout()
    {

        $this->sessionDAO->Logout();
    }
}