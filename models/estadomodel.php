<?php
include_once 'models/clsestado.php';
class EstadoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT 
                                                    estado_id,
                                                    estado_descripcion
                                                FROM 
                                                    general.estado ;");
        while ($row = $query->fetch()) {
            $item = new Estado();
            $item->estado_id = $row['estado_id'];
            $item->estado_descripcion = $row['estado_descripcion'];
            array_push($items, $item);
        }
        return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}

?>