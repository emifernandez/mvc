<?php
class LoginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function ingresar($params) {
        $usuario = $params['usuario'];
        $password = sha1(md5($params['password']));
        
        $query = $this->db->connect()->prepare("select * 
            from usuario.usuarios u 
            where u.usuario_nick = :usuario 
                and u.usuario_pass = :password");
        try {
            $query->execute(['usuario' => $usuario 
                , 'password' => $password]);
            
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