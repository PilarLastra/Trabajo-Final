<?php

namespace DAO;

use Classes\Users\Student as Student;

interface IStudentDAO
{

    function GetAll();
    function GetByEmail($email);
    function Add(Student $student);
}
