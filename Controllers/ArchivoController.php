<?php

namespace Controllers;

use DAO\ArchivoDAO;

class ArchivoController{



    private $archivoDAO;

    public function __construct()
    {
        $this->archivoDAO = new ArchivoDAO();
    }


    public function UploadPdf($fichero){
        $this->archivoDAO->UploadPdf($fichero);
    }
}