<?php

namespace DAO;

use DAO\Connection as Connection;
use \Exception as Exception;

class ArchivoDAO {

    public function UploadPdf($fichero){
        if(is_uploaded_file($_FILES[$fichero]['tmp_name'])){
            $ruta="upload/";
            $nombreFinal=trim($_FILES[$fichero]['CV']);
            $nombreFinal=mb_ereg_replace(" ","",$nombreFinal);
            $upload = $ruta . $nombreFinal;
            if(move_uploaded_file($_FILES[$fichero]['tmp_name'],$upload)){
                echo "Upload exitoso!";
            }
            $query = "INSERT INTO archivos (name, description, ruta, tipo, size) VALUES (:name, :description, :ruta, :tipo, :size)";
            $this->connection = Connection::GetInstance();
            $parameters["name"] = "CV";
            $parameters["description"] = "CV APPPLICANT";
            $parameters["ruta"] = $_FILES['fichero']['name'];
            $parameters["tipo"] = $_FILES['fichero']['type'];
            $parameters["size"] = $_FILES['fichero']['type'];

            $this->connection->ExecuteNonQuery($query, $parameters);


        }

    }

}
