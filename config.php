<?php 

session_start();

define('HOST','localhost');
define('DB','chat_online');
define('USER','root');
define('PASS','');

spl_autoload_register(function($class) {
    include 'class/'.$class.'.php';
})

?>