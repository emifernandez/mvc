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
                                                        usuario_nick,
                                                        usuario_contrasenna,
                                                        usuario_documento,
                                                        usuario_nombre,
                                                        usuario_apellido,
                                                        usuario_direccion,
                                                        usuario_telefono,
                                                        usuario_email,
                                                        estado_id
                                                    )
                                                    VALUES (
                                                        :usuario_nick,
                                                        :usuario_contrasenna,
                                                        :usuario_documento,
                                                        :usuario_nombre,
                                                        :usuario_apellido,
                                                        :usuario_direccion,
                                                        :usuario_telefono,
                                                        :usuario_email,
                                                        :estado_id
                                                    );");
            $query->execute([
                'usuario_nick'          => $params['usuario']
                , 'usuario_contrasenna' => $params['contrasenna']
                , 'usuario_documento'   => $params['documento']
                , 'usuario_nombre'      => $params['nombre']
                , 'usuario_apellido'    => $params['apellido']
                , 'usuario_direccion'   => $params['direccion']
                , 'usuario_telefono'    => $params['telefono']
                , 'usuario_email'       => $params['email']
                , 'estado_id'           => $params['estado']

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>