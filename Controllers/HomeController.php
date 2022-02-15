<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\AdminDAO as AdminDAO;
use DAO\CompanyDAO;
use DAO\JobApplicationDAO;
use DAO\JobOfferDAO;

class HomeController
{
    private $studentDAO;
    private $adminDAO;
    private $companyDAO;


    public function __construct()
    {
        $this->UserDAO = new UserDAO();
        $this->studentDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
        $this->companyDAO = new CompanyDAO();
    }

    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "/index.php");
    }

    public function ShowAdminView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/admin-home.php");
    }


    public function ShowStudentView()
    {

        $studentList = $this->studentDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php"); //implementar una clase para la validacion de sesion / creacion / destroy, etc
        require_once(VIEWS_PATH . "/student-home.php");
    }

    public function ShowCompanyView()
    {

        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php"); //implementar una clase para la validacion de sesion / creacion / destroy, etc
        require_once(VIEWS_PATH . "/company-home.php");
    }

  

}
