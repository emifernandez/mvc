<?php
class UsuarioModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($params) {
        try {
            $query = $this->db->connect()->prepare("INSERT INTO 
                                                        seguridad.usuario
                                                    (
                                                        usuario_id,
                                                        usuario_documento_identidad,
                                                        usuario_nombre,
                                                        usuario_apellido,
                                                        usuario_email,
                                                        usuario_usuario,
                                                        usuario_password,
                                                        usuario_direccion,
                                                        usuario_telefono,
                                                        estado_id
                                                    )
                                                    VALUES (
                                                        :usuario_id,
                                                        :usuario_documento_identidad,
                                                        :usuario_nombre,
                                                        :usuario_apellido,
                                                        :usuario_email,
                                                        :usuario_usuario,
                                                        :usuario_password,
                                                        :usuario_direccion,
                                                        :usuario_telefono,
                                                        :estado_id
                                                    );");
            $query->execute([
                'usuario_id'                    => $params['usuario_id']
                ,'usuario_documento_identidad'  => $params['usuario_documento_identidad']
                , 'usuario_nombre'              => $params['usuario_nombre']
                ,'usuario_apellido'             => $params['usuario_apellido']
                , 'usuario_email'               => $params['usuario_email']
                ,'usuario_usuario'              => $params['usuario_usuario']
                , 'usuario_password'            => $params['usuario_password']
                ,'usuario_direccion'            => $params['usuario_direccion']
                , 'usuario_telefono'            => $params['usuario_telefono']
                ,'estado_id'                    => $params['estado_id']

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

    public function delete($params) {
        try {
            $query = $this->db->connect()->prepare("DELETE FROM
                                                        seguridad.rol 
                                                    WHERE 
                                                        rol_id = :rol_id;");
            $query->execute([
                'rol_id' => $params['rol_id']

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

    public function getNextId() {
        try {
            $query = $this->db->connect()->query("SELECT coalesce(max(usuario_id) + 1, 1)
                                                FROM seguridad.usuario;");
            $item = $query->fetchColumn();
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
}

?>