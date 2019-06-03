<?php
class RolModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($params) {
        try {
            $query = $this->db->connect()->prepare("INSERT INTO 
                                                        seguridad.rol
                                                    (
                                                        rol_descripcion,
                                                        estado_id
                                                    )
                                                    VALUES (
                                                        :rol_descripcion,
                                                        :estado_id
                                                    );");
            $query->execute([
                'rol_descripcion' => $params['rol_descripcion']
                , 'estado_id'     => $params['estado']

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($params) {
        try {
            $query = $this->db->connect()->prepare("UPDATE 
                                                        seguridad.rol 
                                                    SET 
                                                        rol_descripcion = :rol_descripcion,
                                                        estado_id = :estado_id
                                                    WHERE 
                                                        rol_id = :rol_id;");
            $query->execute([
                'rol_id'            => $params['rol_id']
                , 'rol_descripcion' => $params['rol_descripcion']
                , 'estado_id'       => $params['estado']

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function get() {
        $item = [];
        try {
            $query = $this->db->connect()->query("SELECT 
                                                        rol_id,
                                                        rol_descripcion,
                                                        a.estado_id,
                                                        estado_descripcion
                                                    FROM seguridad.rol a
                                                        INNER JOIN general.estado b
                                                        ON a.estado_id = b.estado_id;");
            $item = $query->fetchall();
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id) {
        $item = [];
        try {
            $query = $this->db->connect()->prepare("SELECT 
                                                    rol_id,
                                                    rol_descripcion,
                                                    estado_id
                                                FROM 
                                                    seguridad.rol
                                                WHERE rol_id = :rol_id ;");
            $query->execute(['rol_id' => $id]);
            $item = $query->fetch();
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }
}

?>