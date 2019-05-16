<?php
error_reporting(0);
class NuevoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($params) {
        //insertar datos al a base de datos
        try {
            $query = $this->db->connect()->prepare("INSERT INTO 
                                                        ventas.producto_tipo
                                                    (
                                                        producto_tipo_id,
                                                        producto_tipo_nombre
                                                    )
                                                    VALUES (
                                                        :producto_tipo_id,
                                                        :producto_tipo_nombre
                                                    );");
            $query->execute([
                'producto_tipo_id' => $params['producto_tipo_id']
                , 'producto_tipo_nombre' => $params['producto_tipo_nombre']

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>