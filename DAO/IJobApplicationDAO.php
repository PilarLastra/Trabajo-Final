<?php

namespace DAO;

use Classes\JobApplication as JobApplication;

interface IJobApplicationDAO
{
    function Add(JobApplication $JobApplication);
    function GetAll();
    
}