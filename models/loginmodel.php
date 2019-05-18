<?php
class LoginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function ingresar($params) {
        $usuario = $params['usuario'];
        $password = sha1(md5($params['password']));
        
        $query = $this->db->connect()->prepare("SELECT *
                                                FROM seguridad.usuario a
                                                WHERE a.usuario_nick = :usuario
                                                AND a.usuario_contrasenna = :contrasenna");
        try {
            $query->execute(['usuario' => $usuario 
                , 'contrasenna' => $password]);
            
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