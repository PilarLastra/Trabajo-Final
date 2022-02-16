<?php

namespace Controllers;

use DAO\AdminDAO as AdminDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\StudentDAO as StudentDAO;
use Classes\Users\Admin as Admin;
use Classes\Company as Company;
use DAO\ArchivoDAO;
use DAO\JobApplicationDAO;
use DAO\JobOfferDAO;

class AdminController
{
    private $adminDAO;
    private $companyDAO;
    private $studentDAO;
    private $jobOfferDAO;
    private $jobApplicationDAO;
    private $archivoDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->companyDAO = new CompanyDAO();
        $this->studentDAO = new StudentDAO();
        $this->jobOfferDAO = new JobOfferDAO();
        $this->jobApplicationDAO = new JobApplicationDAO();
        $this->archivoDAO = new ArchivoDAO();
    }


    public function ShowStudentListView()
    {
        $studentList = $this->studentDAO->GetAll();
        require_once(VIEWS_PATH . "/student-list.php");
    }

    

    public function ShowAddView(){
        require_once(VIEWS_PATH . "/add-admin.php");
    }


    public function ShowAdminListView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "admin-list.php");
    }

    public function Add($firstName, $lastName, $dni, $gender, $birhtDate, $email, $phoneNumber)
    {
        $admin = new Admin();
        $admin->setName($firstName);
        $admin->setLastName($lastName);
        $admin->setDni($dni);
        $admin->setGender($gender);
        $admin->setBirthDate($birhtDate);
        $admin->setEmail($email);
        $admin->setPhoneNumber($phoneNumber);

        $this->adminDAO->Add($admin);

        echo FRONT_ROOT.'/Company/ShowListView';
    }

    public function Remove($id)
    {
        $this->adminDAO->Remove($id);

        $this->ShowAdminListView();
    }

    public function printPdf(){
        require_once(VIEWS_PATH . "/fpdf/fpdf.php");
        $this->jobApplicationDAO->PrintPdf();
    }

    public function ShowAppView()
    {
        $studentList = $this->studentDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $jobApplicationList = $this->jobApplicationDAO->GetAll();

        require_once(VIEWS_PATH . "/applicationlist-admin.php");
    }
}
