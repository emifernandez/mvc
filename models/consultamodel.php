<?php
error_reporting(0);
include_once 'models/productotipo.php';
class ConsultaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM ventas.producto_tipo");
        while ($row = $query->fetch()) {
            $item = new ProductoTipo();
            $item->producto_tipo_id = $row['producto_tipo_id'];
            $item->producto_tipo_nombre = $row['producto_tipo_nombre'];
            array_push($items, $item);
        }
        return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id) {
        $item = new ProductoTipo();
        
            $query = $this->db->connect()->prepare("SELECT * FROM ventas.producto_tipo where producto_tipo_id = :producto_tipo_id");
        try {
            $query->execute(['producto_tipo_id' => $id]);
            
            while ($row = $query->fetch()) {
                $item->producto_tipo_id = $row['producto_tipo_id'];
                $item->producto_tipo_nombre = $row['producto_tipo_nombre'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item) {
        //actualizar datos a la base de datos
        
        $query = $this->db->connect()->prepare("UPDATE 
                                                    ventas.producto_tipo 
                                                SET 
                                                    producto_tipo_nombre = :producto_tipo_nombre
                                                WHERE 
                                                    producto_tipo_id = :producto_tipo_id");
        try {
            $query->execute([
                'producto_tipo_id' => $item['producto_tipo_id']
                , 'producto_tipo_nombre' => $item['producto_tipo_nombre']

            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        $query = $this->db->connect()->prepare("DELETE FROM 
                                                    ventas.producto_tipo 
                                                WHERE 
                                                    producto_tipo_id = :producto_tipo_id;");
        try {
            $query->execute(['producto_tipo_id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>