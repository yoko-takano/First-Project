<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    ?>
    <main id="corpo">
        <?php 
            $c = $_GET['cod'] ?? null;
            $busca = $banco->query("
            SELECT 
            p.*,
            pt.tipagem AS primeiro_tipo,
            st.tipagem AS segundo_tipo,
            wo.tipagem AS primeira_fraq,
            wt.tipagem AS segunda_fraq
            FROM 
            pokemons p
            JOIN tiposgerais pt ON p.typeone = pt.cod
            JOIN tiposgerais st ON p.typetwo = st.cod
            JOIN tiposgerais wo ON p.weakone = wo.cod
            JOIN tiposgerais wt ON p.weaktwo = wt.cod
            WHERE 
            p.cod = '$c';");
        ?>
        <h1>Sobre o Pokemon</h1>
        <table class='detalhes'>
            <?php 
            if (!$busca) {
                echo "<tr><td>Busca falhou! $banco->error</tr></td>";
            } else {
                if ($busca->num_rows==1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo "<tr><td rowspan='6'><img src='$t' class='full'></img></td>";
                    echo "<td><h2>$reg->nome</h2></td></tr>";
                    if (is_admin()) {
                        echo "<td>
                        <span class='material-symbols-outlined'>add_circle</span>  
                        <span class='material-symbols-outlined'>edit</span>  
                        <span class='material-symbols-outlined'>delete</span>  
                        </td></tr>";
                    } else if (is_editor()) {
                        echo "<td><span class='material-symbols-outlined'>edit</span></td></tr>";
                    }                   
                    echo "<td><strong>N° Pokedex:</strong> $reg->pokedex</td></tr>";
                    echo "<tr><td>$reg->descricao</td></tr>";
                    echo "<tr><td><strong>Tipo:</strong> $reg->primeiro_tipo | $reg->segundo_tipo</td></tr>";
                    echo "<tr><td><strong>Fraqueza:</strong> $reg->primeira_fraq | $reg->segunda_fraq</td></tr>";                    
                } else {
                    echo "<tr><td>Nenhum registro encontrado</tr></td>";
                }
            }      
            ?>
        </table>
        <br>
        <?= voltar(); ?>
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
</body>
</html>