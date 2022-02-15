<?php

namespace Controllers;

use DAO\JobPositionDAO as JobPositionDAO;
use Classes\Enterprise\JobPosition as JobPosition;

class JobPositionController
{
    private $jobPositionDAO;

    public function __construct()
    {
        $this->jobPositionDAO = new JobPositionDAO();
    }

    public function Add($jobPositionid, $careerId, $description)
    {
        $jobPosition = new JobPosition();
        $jobPosition->setCareerId($careerId);
        $jobPosition->setDescription($description);
        $jobPosition->setJobPositionId($jobPositionid);


        $this->jobPositionDAO->Add($jobPosition);

       // $this->ShowListView();
    }

   
/*
    public function ShowListView()
    {
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

     public function SearchByName($nombre)
    {
        $careerList = $this->careerDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    public function ShowAddView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "add-jobPosition.php");
    }

    public function Remove($CUIL)
    {
        $this->jobPositionDAO->Remove($CUIL);
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    

    public function Modify($CUIL)
    {

        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "modify-jobPosition.php");
    }

    public function ModifyAttribute($legalName, $address, $contactNumber, $email, $cuil)
    {

        $this->jobPositionDAO->Modify();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "jobPosition-list.php");
    }

    
    */
}