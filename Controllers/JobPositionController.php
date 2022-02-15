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
}