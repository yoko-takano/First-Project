<h1>Login</h1><br>
    <p>Seja bem-vindo(a)! Faça login para acessar sua conta e poder fazer as configurações em seu ambiente.</p>
    <br>
<form action="user-login.php" method="post" autocomplete="on">
    <div class="campo">
        <span class="material-symbols-outlined">person</span>
        <input type="text" name="usuario" id="idlogin" placeholder=" seu usuario" required maxlength="10" size="10" required>
        <label for="login">Login</label>
    </div>
    <div class="campo">
        <span class="material-symbols-outlined">vpn_key</span>
        <input type="password" name="senha" id="idsenha" placeholder=" sua senha" autocomplete="current-password" required size="8" maxlength="8">
        <label for="isenha">Senha</label>
    </div>
    <input type="submit" value="Entrar">
    <a href="#" class="botao">Esqueci a senha <span class="material-symbols-outlined">mail</span></a>
    <a href="bancodedados.php" class="botao">Voltar <span class="material-symbols-outlined">arrow_back</span></a>
</form>