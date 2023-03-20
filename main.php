<?php

if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) {

?>

<section class="main"> 
    <div class="container">
        <div class="chat">
            <div class="message">
            <?php
            for ($i=0; $i < 100; $i++) { 
            ?>
                <div class="msg row-direction">
                    <div class="user">
                        <h3>Keiliel Oliveira</h3>
                        <p>Hello World!</p>
                    </div>
                </div>
                <div class="msg row-reverse">
                    <div class="me">
                        <h3>Keiliel Oliveira</h3>
                        <p>Hello World!</p>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="form">
                <form action="request.php" method="post" id="mensagem">
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