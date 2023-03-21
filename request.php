<?php

include 'config.php';

if(isset($_POST['type']) && $_POST['type'] == 'insert') {
    $sql = MySql::connect()->prepare("INSERT INTO `$_POST[table]` VALUES (null,?,?)");
    $sql->execute(array($_POST['user'],$_POST['values']));

    echo "<div class='msg row-reverse'>
        <div class='user'>
            <h3>".$_POST['user']."</h3>
            <p>".$_POST['values']."</p>
        </div>
    </div>";
    


    $_SESSION['lastId'] = MySql::connect()->lastInsertId();
}else if(isset($_POST['type']) && $_POST['type'] == 'get') {
    $lastId = $_SESSION['lastId'];
    $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.chat` WHERE id > $lastId");
    $sql->execute();
    $sql = $sql->fetchAll();
    $sql = array_reverse($sql);
    foreach ($sql as $key => $value) {
        if($value['nome'] == $_SESSION['user']) {
        echo "<div class='msg row-reverse'>
            <div class='user'>
                <h3>".$value['nome']."</h3>
                <p>".$value['mensagem']."</p>
            </div>
        </div>";
        }else {
            echo "<div class='msg row-direction'>
            <div class='user'>
                <h3>".$value['nome']."</h3>
                <p>".$value['mensagem']."</p>
            </div>
        </div>";
        }

        $_SESSION['lastId'] = $value['id'] + 1;
    }
}

?>