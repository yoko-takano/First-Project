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
                    $u = $_POST['usuario'] ?? null;
                    $s = $_POST['senha'] ?? null;

                    if (is_null($u) || is_null($s)) {
                        require "user-login-form.php";
                    } else {
                        $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                        $busca = $banco->query($q);
                        if (!$busca) {
                            echo msg_erro('Falha ao acessar o banco');
                        } else {
                            if ($busca->num_rows>0) {
                            $reg = $busca->fetch_object();
                                if (testarHash($s, $reg->senha)){
                                    echo msg_sucesso('Logado com sucesso');
                                    echo "<a href='bancodedados.php' class='botao'>Voltar <span class='material-symbols-outlined'>arrow_back</span></a>";
                                    $_SESSION['user'] = $reg->usuario;
                                    $_SESSION['nome'] = $reg->nome;
                                    $_SESSION['tipo'] = $reg->tipo;
                                } else {
                                    echo msg_erro('Senha inválida');
                                    echo "<a href='user-login.php' class='botao'>Voltar <span class='material-symbols-outlined'>arrow_back</span></a>";

                                }
                            } else {
                                echo msg_aviso('Usuário não existe');
                                echo "<a href='user-login.php' class='botao'>Voltar <span class='material-symbols-outlined'>arrow_back</span></a>";
                            }
                        }
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>