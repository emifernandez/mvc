<?php
class LoginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function ingresar($params) {
        $usuario = $params['usuario'];
        $contrasenna = $params['password'];
        
        $query = $this->db->connect()->prepare("SELECT *
                                                FROM seguridad.usuario a
                                                WHERE a.usuario_usuario = :usuario
                                                AND a.usuario_password = :contrasenna");
        try {
            $query->execute(['usuario'  => $usuario 
                        , 'contrasenna' => $contrasenna]);
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>