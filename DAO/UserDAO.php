<?php

namespace DAO;

use Classes\Users\user;
use DAO\IUserDAo as IUserDAO;
use DAO\StudentDAO as StudentDAO;

class UserDAO implements IUserDAO
{

    private $userList = array();
    private $studentDAO;
    private $adminDAO;
    private $found;

    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
        $this->found = false;
    }



    public function GetByEmail($email)
    {
        $user = null;
        $userList = $this->studentDAO->GetAll();

        echo $this->found;
        $user = array_filter($userList, function ($user) use ($email) {

            if ($user->getEmail() == $email) {
                $this->found = true;
            }

            return $user->getEmail() == $email;
        });


        if ($this->found == false) {
            $userList = $this->adminDAO->GetAll();
            $user = array_filter($userList, function ($user) use ($email) {
                return $user->getEmail() == $email;
            });
        }

        $user = array_values($user); //Reordering array indexes

        return (count($user) > 0) ? $user[0] : null;
    }
}
