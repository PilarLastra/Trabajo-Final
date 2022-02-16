<?php

namespace Controllers;

use DAO\JobApplicationDAO as JobApplicationDAO;
use Classes\JobApplication as JobApplication;
use DAO\ArchivoDAO;
use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobOfferDAO AS JobOfferDAO ;
use DAO\JobPositionDAO as JobPositionDAO;

class JobApplicationController
{
    private $jobApplicationDAO;
    private $jobOfferDAO;
    private $jobPositionDAO;
    private $careerDAO;
    private $companyDAO; 
    private $archivoDAO;

    public function __construct()
    {
        $this->jobApplicationDAO = new JobApplicationDAO();
        $this->jobOfferDAO = new JobOfferDAO();
        $this->jobPositionDAO = new JobPositionDAO();
        $this->companyDAO = new CompanyDAO();
        $this->careerDAO = new CareerDAO();
        $this->archivoDAO = new ArchivoDAO();
    }

    public function ShowAddView()
    {
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobApplication.php");
    }

    public function ShowListView()
    {
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobApplication-list.php");
    }

    public function ShowListApplyView()
    {
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobApplication.php");
    }

    public function SearchByParameters($puesto, $carrera){
        $jobOfferList = $this->jobOfferDAO->SearchByParameters($puesto, $carrera);
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobApplication.php");
    }

    public function Add($studentId, $jobOfferId)
    {
        $jobApplication = new JobApplication();
        $jobApplication->setJobOfferId($jobOfferId);
        $jobApplication->setStudentId($studentId);
        $this->jobApplicationDAO->Add($jobApplication);
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
            
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-cvApplication.php");
    }

    public function Delete($jobApplicationId)
    {
        $this->jobApplicationDAO->Remove($jobApplicationId);
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/student-home.php");
    }

    public function End($jobApplicationId)
    {
        $this->jobApplicationDAO->End($jobApplicationId);
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $jobApplicationList = $this ->jobApplicationDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/applicationlist-admin.php");
    }

    public function ShowOfferView($jobOfferId)
    {
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/complete-JobOffer.php");
    }

    public function DownloadCV ($cvId){
        $jobApplicationList = $this->jobApplicationDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $pdf=$this->archivoDAO->DownloadCV($cvId);
        
    }

   
}