<?php

namespace Controllers;

use DAO\ImagenDAO;
use DAO\JobOfferDAO;

class ImageController
{

    private $imagenDAO;
    private $jobOfferDAO;

    public function __construct()
    {
        $this->imagenDAO = new ImagenDAO();
        $this->jobOfferDAO = new JobOfferDAO();
    }

    public function upload($imagen)
    {

        $this->imagenDAO->upload($imagen);
        $imagenId = $this->imagenDAO->latestImagenId();
        $jobOfferId = $this->jobOfferDAO->latestId();
        $this->jobOfferDAO->updateImagenId($imagenId[0]['idImagen'], $jobOfferId[0]['job_Offer_Id']);
        if ($_SESSION["loggedUser"]->getUserType() == "admin") {

            require_once(VIEWS_PATH . "/validate-session.php");
            require_once(VIEWS_PATH . "/admin-home.php");
        } else {
            require_once(VIEWS_PATH . "/validate-session.php");
            require_once(VIEWS_PATH . "/company-home.php");
        }
    }
}