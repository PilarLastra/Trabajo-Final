<?php

namespace DAO;


use DAO\IimagenDAO as IimagenDAO;
use DAO\Connection as Connection;

use Exception;

class ImagenDAO implements IimagenDAO
{



    public function upload($imagen)
    {

        $imagen = $_FILES['imagen']['name'];

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $ruta = "imagenes/";
            $nombreFinal = trim($_FILES['imagen']['name']);
            $nombreFinal = mb_ereg_replace(" ", "", $nombreFinal);
            $upload = $ruta . $nombreFinal;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $upload)) {
            }


            $query = "INSERT INTO imagenes(imagen) VALUES ('$imagen')";

            $this->connection = Connection::GetInstance();

            $resultado = $this->connection->Execute($query);
        }
    }

    public function latestImagenId()
    {
        try {
            $query = "SELECT idImagen FROM imagenes ORDER BY idImagen DESC LIMIT 1";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                $imagenId = $resultSet;
                return $imagenId;
            }
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function traerImagenxId($idImagen)
    {
        try {

            $query = "SELECT * FROM imagenes WHERE idImagen = $idImagen";

            $this->connection = Connection::GetInstance();

            $resultado = $this->connection->Execute($query);

            if ($resultado) {
                return $resultado;
            }
        } catch (Exception $ex) {

            throw $ex;
        }
    }
}

