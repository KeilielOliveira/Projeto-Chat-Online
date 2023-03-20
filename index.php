<!DOCTYPE html>
<html lang="pt_Br">
<head>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php 

include 'config.php';

if(isset($_SESSION['logado'])) {
    include 'main.php';
}else {
    include 'login.php';
}

?>

<script src="js/all.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>