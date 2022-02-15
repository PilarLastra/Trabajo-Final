<?php

namespace DAO;

use Classes\Enterprise\JobPosition as JobPosition;

interface IJobPositionDAO
{
    function Add(JobPosition $jobPosition);
    function GetAll();
    
}