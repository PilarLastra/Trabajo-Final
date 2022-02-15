<?php

namespace DAO;

use Classes\Enterprise\Company as Company;

interface ICompanyDAO
{
    function Add(Company $company);
    function GetAll();
    function Remove($cuil);
}
