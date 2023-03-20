<?php

include 'config.php';

if(isset($_POST['type']) && $_POST['type'] == 'insert') {
    $sql = MySql::connect()->prepare('INSET INTO `$_POST[table]` VALUES null,?,?');
    $sql->execute(array($_POST['user'],$_POST['values']));
}

?>