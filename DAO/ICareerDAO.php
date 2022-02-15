<?php

namespace DAO;

use Classes\Career as Career;

interface ICareerDAO
{
    function Add(Career $career);
    function GetAll();
    
}
