<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="estilos/mediaquery.css">
</head>
<body onresize="mudouTamanho()">
    <?php 
        require_once "includes/acessobanco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";        
        include_once "topo.php";
        $ordem = $_GET['o'] ?? "p";
        $chave = $_GET['c'] ?? null;
    ?>
    <main id="corpo">
        <h1>Escolha seu Pokemon</h1>
        <br>
        <form action="bancodedados.php" id="busca" method="get">
            <strong>Ordenar: </strong>
            <a href="bancodedados.php?o=n&c=<?=$chave;?>">Nome</a> | 
            <a href="bancodedados.php?o=p&c=<?=$chave;?>">N° Pokedex</a> | 
            <a href="bancodedados.php?o=e&c=<?=$chave;?>">Evolução</a> | 
            <a href="bancodedados.php">Mostrar Todos </a> | 
            <strong>Buscar:</strong> <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php 
            try {
                // Tenta fazer a consulta
                $q = "
                SELECT 
                p.cod, p.nome, p.capa, p.evolucao, p.icone, p.pokedex,
                pt.tipagem as primeiro_tipo, 
                st.tipagem as segundo_tipo 
                FROM pokemons p 
                JOIN tiposgerais pt on p.typeone = pt.cod
                JOIN tiposgerais st on p.typetwo = st.cod ";
                
                if (!empty($chave)) {
                    $q .= "WHERE p.nome like '%$chave%' OR p.evolucao like '%$chave%' OR pt.tipagem like '%$chave%' OR st.tipagem like '%$chave%' ";
                }

                switch($ordem) {
                    case "n":
                        $q .= "ORDER BY p.nome";
                        break;
                    case "e":
                        $q .= "ORDER BY p.evolucao";
                        break;
                    default:
                        $q .= "ORDER BY p.cod";
                        break;
                }

                $busca = $banco->query($q);
                

                if (!$busca) {
                    // A consulta falhou
                    $mensagem_erro = "Falha na busca! " . $banco->error;
                    throw new \Exception($mensagem_erro);
                }

                // Se não deu erro, o código continua
                if ($busca->num_rows ==0) {
                    // Busca feita, porém retorno vazio
                    echo "<p>Nenhum resultado encontrado</p>";
                } else {
                    // Tudo certo, podemos retornar
                    while ($reg=$busca->fetch_object()) {
                        $t = thumb($reg->icone);
                        echo "<tr>";
                        echo "<td><img src='$t' class='mini'></img></td>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo " [$reg->primeiro_tipo] | ";
                        echo " [$reg->segundo_tipo]";
                        echo "<br><strong>N° Pokedex</strong>: $reg->pokedex";
                        if (is_admin()) {
                            echo "<td>
                            <span class='material-symbols-outlined'>add_circle</span>  
                            <span class='material-symbols-outlined'>edit</span>  
                            <span class='material-symbols-outlined'>delete</span>  
                            </td></tr>";
                        } else if (is_editor()) {
                            echo "<td><span class='material-symbols-outlined'>edit</span></td></tr>";
                        }
                    }
                }
            } catch (\Exception $e) {
                echo "<p>" . $e->getMessage() . "</p>";
            }
            ?>
        </table>
    </main>
    <script>
            function mudouTamanho() {
                if (window.innerWidth >= 700) {
                    itens.style.display = "block";
                } else {
                    itens.style.display = "none";
                }
            }
            function clickMenu() {
                if (itens.style.display == "block") {
                    itens.style.display = "none"
                } else {
                    itens.style.display = "block"
                }
            }
    </script>
    <?php include_once "rodape.php";?>
</body>
</html>