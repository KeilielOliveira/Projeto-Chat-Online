<?php

if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) {

?>

<section class="main"> 
    <div class="container">
        <div class="chat">
            <div class="message">
            <?php
            $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.chat` ORDER BY id DESC LIMIT 10");
            $sql->execute();
            $sql = $sql->fetchAll();
            $sql = array_reverse($sql);
            foreach ($sql as $key => $value) {
                if($value['nome'] != $_SESSION['user']) {
            ?>
                <div class="msg row-direction">
                    <div class="user">
                        <h3><?php echo $value['nome'] ?></h3>
                        <p><?php echo $value['mensagem'] ?></p>
                    </div>
                </div>
                <?php 
                }else {
                ?>
                <div class="msg row-reverse">
                    <div class="me">
                        <h3><?php echo $value['nome'] ?></h3>
                        <p><?php echo $value['mensagem'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
            <?php 
            $_SESSION['lastId'] = $value['id'];
            }
            ?>
            </div>
            <div class="form">
                <form action="request.php" method="post" id="mensagem">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['user'] ?>">
                    <textarea name="mensagem" placeholder="Mensagem...."></textarea>
                    <button><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>




<?php 

}

?>