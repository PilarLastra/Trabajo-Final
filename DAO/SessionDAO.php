<?php

namespace DAO;

use Classes\Enterprise\Company;
use Classes\Users\Admin;
use Classes\Users\Student;
use Controllers\StudentController;
use \Exception as Exception;
use DAO\ISessionDAO as ISessionDAO;
use DAO\Connection as Connection;

class SessionDAO implements ISessionDAO
{

    

    public function ValidateAdmin(){
        if ($_SESSION["loggedUser"]->getUserType() == "admin"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function ValidateStudent(){
        if ($_SESSION["loggedUser"]->getUserType() == "student"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function Register($email, $password){

        try {
            $query = "SELECT student.email FROM student";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $row){
                if($row['email'] == $email){
                    echo "<script> if(confirm('Usted ya se encuentra cargado en el sistema'));";
                    echo "window.location = '../index.php';
                </script>";
                }
            }
        }
        catch (Exception $ex) {
            throw $ex;
        }
            if($this->ApiStudent($email) == true){
                    $this->RegisterApiStudent($email, $password);
                 echo "<script> if(confirm('Informacion validada'));";
                 echo "window.location = '../index.php';
             </script>";
             
             
                }
                else{
                 echo "<script> if(confirm('Usted no se encuentra cargado en el sistema'));";
                 echo "window.location = '../index.php';
             </script>";
                }
            }

    public function ApiStudent($email){

          $ch = curl_init();
          $url = 'https://utn-students-api.herokuapp.com/api/Student';
          $header = array(
              'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
          );
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  
          $response = curl_exec($ch);
  
          $arrayToDecode = json_decode($response, true);
          if($arrayToDecode != null){
          foreach($arrayToDecode as $row){
              if($email == $row['email']){
                  return true;
              }
          }
        }
          return false;
         
          
          
  
      }
  

    public function RegisterApiStudent($email, $password){
        $jsonStudents = new StudentController();
        $ch = curl_init();
          $url = 'https://utn-students-api.herokuapp.com/api/Student';
          $header = array(
              'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
          );
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  
          $response = curl_exec($ch);
  
          $arrayToDecode = json_decode($response, true);
          foreach($arrayToDecode as $row){
            if($email == $row['email']){
                $jsonStudents->Add(
                    $row['studentId'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['dni'],
                    $row['gender'],
                    $row['birthDate'],
                    $row['email'],
                    $password,
                    $row['phoneNumber'],
                    $row['careerId'],                 
                    $row['fileNumber'],
                    $row['active'],
                    "student",
                );
            }
        }
    }

   
    public function ValidateCompany(){
        if ($_SESSION["loggedUser"]->getUserType() == "company"){
            return;
        }
        else{
            echo "<script> if(confirm('Acceso incorrecto'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }
    
    public function Login($user){
        if (($user != null)) {
            $_SESSION["loggedUser"] = $user;
            if ($user->getUserType() == "admin") {
                return "admin";
            } else {
                return "student";
            }
        } else {
            echo "<script> if(confirm('Verifique que los datos ingresados sean correctos'));";
            echo "window.location = '../index.php';
		</script>";
        }
    }

    public function GetUser($email, $password){
        
        try{
            $query="SELECT *FROM student WHERE email like '$email%' AND password like '$password%' ";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            if($resultSet!= null){
                

            foreach($resultSet as $row){
                
                $student = new Student();
                $student->setStudentId($row["id"]);
                $student->setCareerId($row["career_id"]);
                $student->setFileNumber($row["file_number"]);
                $student->setActive($row["active"]);
                $student->setName($row["first_name"]);
                $student->setLastName($row["last_name"]);
                $student->setDni($row["dni"]);
                $student->setGender($row["gender"]);
                $student->setPhoneNumber($row["phone_number"]);
                $student->setBirthDate($row["birth_date"]);
                $student->setEmail($row["email"]);
                $student->setPassword($row["password"]);
                $student->setUserType($row["user_type"]);

            }
            return $student;
        }else{
            $query="SELECT *FROM admin WHERE email like '$email%' AND password like '$password%'";

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if($resultSet!= null){

            foreach($resultSet as $row){
                
                $admin = new Admin();
                $admin->setIdAdmin($row["id"]);
                $admin->setName($row["first_name"]);
                $admin->setLastName($row["last_name"]);
                $admin->setDni($row["dni"]);
                $admin->setGender($row["gender"]);
                $admin->setPhoneNumber($row["phone_number"]);
                $admin->setBirthDate($row["birth_date"]);               
                $admin->setEmail($row["email"]);
                $admin->setPassword($row["password"]);
                $admin->setUserType($row["user_type"]);

            }
            return $admin;
        }
    }
        }
         catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetCompany($email, $password){
        
        try{
            $query="SELECT *FROM company WHERE email like '$email%' AND password like '$password%' ";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            foreach($resultSet as $row){
            if($resultSet!= null && $row["active"] == "si"){                        
                $company = new Company();
                $company->setCompanyId($row["company_Id"]);
                $company->setCUIL($row["cuil"]);
                $company->setLegalName($row["legal_name"]);
                $company->setAddress($row["address"]);
                $company->setContactNumber($row["contact_number"]);
                $company->setEmail($row["email"]);
                $company->setPassword($row["password"]);
                $company->setWeb($row["web_Page"]);
                $company->setProvince($row["province"]);
                $company->setLocation($row["location"]);
                $company->setDescription($row["description"]);
                $company->setUserType($row["user_Type"]);
                $company->setActive($row["active"]);
                return $company;
            }
            
        }
        
    }
         catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Logout()
    {
        session_destroy();

        echo "<script> if(confirm('Sesion terminada'));";
        echo "window.location = '../index.php';
		</script>";
    }




}