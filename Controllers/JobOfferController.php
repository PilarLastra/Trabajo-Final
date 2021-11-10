<?php

namespace Controllers;

use Classes\Alert;
use DAO\JobOfferDAO as JobOfferDAO;
use Classes\Enterprise\JobOffer as JobOffer;
use DAO\CareerDAO as CareerDAO;;
use DAO\CompanyDAO  as CompanyDAO;;
use DAO\JobPositionDAO as JobPositionDAO;;
use Exception;

class JobOfferController
{
    private $jobOfferDAO;
    private $jobPositionDAO;
    private $careerDAO;
    private $companyDAO; 


    public function __construct()
    {
        $this->jobOfferDAO = new JobOfferDAO();
        $this->jobPositionDAO = new JobPositionDAO();
        $this->companyDAO = new CompanyDAO();
        $this->careerDAO = new CareerDAO();
    }

    public function ShowAddView()
    {
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobOffer.php");

    }

    public function Add($company_Id, $career_Id, $puesto, $exp, $turn, $salary, $lang, $langP, $place, $description )
    {
        require_once(VIEWS_PATH . "/validate-session.php");
        $alert = new Alert("","");
        try{
        $jobOffer = new JobOffer();
        $jobOffer->setCompanyId($this->jobOfferDAO->MatchByName($company_Id));
        $jobOffer->setJobPositionId($this->jobOfferDAO->MatchByJobPos($puesto));
        $jobOffer->setCareerId($this->jobOfferDAO->MatchByCareerId($career_Id));
        $jobOffer->setSalary($salary);
        $jobOffer->setDescription($description);
        $jobOffer->setTurn($turn);
        $jobOffer->setExp($exp);
        $jobOffer->setLang($lang);
        $jobOffer->setPrefLang($langP);
        $jobOffer->setPlace($place);
        $this->jobOfferDAO->Add($jobOffer);
        $alert->setType("success");
        $alert->setMessage("Oferta agregada con exito");
    
        }
        catch(Exception $ex){
            $alert ->setType("danger");
            $alert->setMessage($ex->getMessage());
        }
        finally{
    
            $this->ShowAddView($alert);
        }
        

    }

    public function SearchByParameters($puesto, $carrera){
        $jobOfferList = $this->jobOfferDAO->SearchByParameters($puesto, $carrera);
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }

    public function ShowListView()
    {
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }


    public function ShowListApplyView()
    {
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-jobApplication.php");
    }

    
    public function Modify($job_Offer_Id)
    {

        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/modify-jobOffer.php");
    }

    public function ModifyAttribute($job_Offer_Id, $puesto, $career_Id, $salary, $description, $turn, $exp, $lang, $pLang, $place)
    {

        $this->jobOfferDAO->Modify();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }

    public function Remove($job_Offer_Id)
    {
        $this->jobOfferDAO->Remove($job_Offer_Id);
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $companyList = $this->companyDAO->GetAll();
        $careerList = $this->careerDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/jobOffer-list.php");
    }


}