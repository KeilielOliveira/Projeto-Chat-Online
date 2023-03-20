<section class="login">
    <div class="form">
        <h3>Realizar Login</h3>

        <form method="post">
            <label>Ususário</label>
            <input type="text" name="user" >
            <label>Senha</label>
            <input type="password" name="pass" >
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</section>

<?php
if(isset($_POST['login'])) {
    Usuario::realizarLogin($_POST['user'],$_POST['pass']);
}

?>