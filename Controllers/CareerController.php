<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use Classes\Career as Career;

class CareerController
{
    private $careerDAO;

    public function __construct()
    {
        $this->careerDAO = new CareerDAO();
    }

    public function SearchByName($nombre)
    {
        $careerList = $this->careerDAO->SearchByNombre($nombre);
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "career-list.php");
    }

    public function Add($id, $description, $active)
    {
        $career = new Career();
        $career->setCareerId($id);
        $career->setDescription($description);
        $career->setActive($active);
        $this->careerDAO->Add($career);

       // $this->ShowListView();
    }
}
