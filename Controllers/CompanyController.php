<?php

namespace Controllers;

use Classes\Alert;
use DAO\CompanyDAO as CompanyDAO;
use Classes\Enterprise\Company as Company;
use DAO\ArchivoDAO;
use DAO\JobApplicationDAO;
use DAO\JobOfferDAO;
use DAO\StudentDAO;
use Exception;

class CompanyController
{
    private $companyDAO;
    private $studentDAO;
    private $jobOfferDAO;
    private $jobApplicationDAO;
    private $archivoDAO;

    public function __construct()
    {
      $this->companyDAO = new CompanyDAO();
      $this->studentDAO = new StudentDAO();
      $this->jobOfferDAO = new JobOfferDAO();
      $this->jobApplicationDAO = new JobApplicationDAO();
      $this->archivoDAO = new ArchivoDAO();

    }

    public function ShowListView()
    {
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function ShowCompanyProfile($company_Id)
    {
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-profile.php");
    }

    public function ShowAddView(Alert $alert = null)
    {

        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/add-company.php");
    }

    public function ShowAppView()
    {
        $studentList = $this->studentDAO->GetAll();
        $jobOfferList = $this->jobOfferDAO->GetAll();
        $jobApplicationList = $this->jobApplicationDAO->GetAll();

        require_once(VIEWS_PATH . "/applicationlist-company.php");
    }

    public function Remove($CUIL)
    {
        try{
        $this->companyDAO->Remove($CUIL);
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
        }
        catch(Exception $ex) {
            echo "Su compañia no pudo ser eliminada.";
        }
        finally{
            $this->ShowListView();
        }
    }

    public function SearchByName($nombre)
    {
        $companyList = $this->companyDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function Modify($CUIL)
    {

        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/modify-company.php");
    }

    public function ModifyAttribute($cuil, $legalName, $address, $contactNumber, $email, $password, $web_Page, $description, $active)
    {
        
        $this->companyDAO->Modify();
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . '/'.$_SESSION['loggedUser']->getUserType().'-home.php');
    }

    public function Validar($cuil)
    {

        $this->companyDAO->Validar($cuil);
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "/validate-session.php");
        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function Add($legalName, $cuil, $web_Page, $contactNumber, $password, $email, $description, $province, $location, $address, $active= 'no')
    {
        $alert = new Alert("","");
        try{

        
        $company = new Company();
        $company->setCUIL($cuil);
        $company->setLegalName($legalName);
        $company->setAddress($address);
        $company->setContactNumber($contactNumber);
        $company->setEmail($email);
        $company->setPassword($password);
        $company->setWeb($web_Page);
        $company->setProvince($province);
        $company->setLocation($location);
        $company->setDescription($description);
        $company->setActive ($active);
        $this->companyDAO->Add($company);
        $alert->setType("success");
        $alert->setMessage("Compañia agregada con exito");
    }
    catch(Exception $ex){
        $alert ->setType("danger");
        $alert->setMessage($ex->getMessage());
    }
    finally{

        $this->ShowListView($alert);
    }
    }
}
