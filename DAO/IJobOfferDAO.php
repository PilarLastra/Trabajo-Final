<?php

namespace DAO;

use Classes\Enterprise\JobOffer as JobOffer;

interface IJobOfferDAO
{
    function Add(JobOffer $jobOffer);
    function GetAll();
    
}