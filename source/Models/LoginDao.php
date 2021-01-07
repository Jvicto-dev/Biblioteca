<?php

namespace Source\Models;
use Source\Database\Connect;

class LoginDao
{
    public function logar(Login $l){
        $sql = 'SELECT * FROM login WHERE user = ? AND senha = ?';
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt -> bindValue(1, $l->getUser());
        $stmt -> bindValue(2, $l->getPassword());
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user'] = $l->getUser();
            header('Location:../Pages/Inicial.php');
            return $resultado;
        }else{
            echo 'Usuario ou senha incorretos';
            return [];
        }
    }
}
