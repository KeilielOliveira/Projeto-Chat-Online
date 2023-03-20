<?php

class Usuario {
    //Atualiza as informações do usúario
    public function atualizarUsuario($nome,$senha,$img) {    
        $sql = MySql::connect()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
        if($sql->execute(array($nome,$senha,$img,$_SESSION['user']))) {
            return true;
        }else {
            return false;
        }
    }
    //Verifica se o usúario já existe na tabela
    public function userExists($user) {
        $sql = MySql::connect()->prepare("SELECT 'id' FROM `tb_admin.usuarios` WHERE user=?");
        $sql->execute(array($user));
        if($sql->rowCount() == 1) {
            return true;
        }else {
            return false;
        }
    }
    //Cadastra o novo usuario se todos os requisitos baterem
    public static function cadastrarUsuario($nome,$cargo,$user,$password,$img) {
        $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
        $sql->execute(array($nome,$cargo,$user,$password,$img['name']));
    }

    public static function realizarLogin($user,$pass) {
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE nome = ? AND senha = ?");
        if($sql->execute(array($user,$pass))) {
            $_SESSION['logado'] = true;
            $_SESSION['user'] = $user;
            echo '<script>location.href="http://localhost/GitHub/Projeto-Chat-Online/"</script>';
        }
    }

}


?>