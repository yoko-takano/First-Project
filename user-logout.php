<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos/menustyle.css">
    <link rel="stylesheet" href="estilos/menuquery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
</head>
<body>
    <?php 
        require_once "includes/acessobanco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";        
    ?>
    
    <main>
        <section id="login">
            <div id="imagem">
                <!-- Aqui vai a imagem nas CSS-->
            </div>
            <div id="formulario">
                <?php 
                    logout();
                    echo msg_sucesso('Usuário deslogado com sucesso');
                ?>
            </div>
            <a href="user-login.php" class="botao">Voltar <span class="material-symbols-outlined">arrow_back</span></a>
        </section>
    </main>
</body>
</html>