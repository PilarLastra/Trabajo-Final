<?php

namespace Controllers;

use DAO\ArchivoDAO;
use DAO\JobApplicationDAO;

class ArchivoController{



    private $archivoDAO;
    private $jobApplicationDAO;

    public function __construct()
    {
        $this->archivoDAO = new ArchivoDAO();
        $this->jobApplicationDAO = new JobApplicationDAO();
    }


    public function UploadPdf(){
        $this->archivoDAO->UploadPdf();
        $cvId = $this->archivoDAO->latestId();
        $appId = $this->jobApplicationDAO->latestId();
        $this->jobApplicationDAO->updateCvId($cvId[0]['idArchivo'], $appId[0]['job_Application_Id']);
        
      
         require_once(VIEWS_PATH . '/validate-session.php');
         require_once(VIEWS_PATH . '/student-home.php');

    }
}