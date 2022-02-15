<?php

namespace DAO;


interface ISessionDAO
{
    function Login($email);
    function Logout();
    
}