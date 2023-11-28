<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/mediaquery.css">
</head>

<body onresize="mudouTamanho()">
    <?php 
        require_once "includes/acessobanco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
        include_once "topo.php";
    ?>
    <main>
        <article>
            <h2>Como surgiu?</h2>
            <p><strong>Pokemon</strong> é uma série de jogos eletrônicos desenvolvidos pela <strong>Game Freak</strong> e publicados pela <strong>Nintendo</strong> como parte da franquia de mídia Pokemon. Lançado pela primeira vez em 1996 no Japão para o console Game Boy, a principal sérei de jogos de RPGs, que continuou em cada geração em portáteis da Nintendo.</p>
            <img id="logo" src="imagens/logo.png" alt="Logo de Pokemon" width="300px">
            <br>
            <h1>Gerações</h1>
            <p>Todas as propriedades de Pokémon são licenciadas e supervisionadas pela <strong>The Pokemon Company</strong>, são divididas aproximadamente pela geração. Essas gerações são divisões cronológicas aproximadamente lançados. Quando é lançada uma sequência oficial na série principal de RPGs que apresenta novos Pokémon, novos personagens e possivelmente novos conceitos de jogabilidade, essa sequência é considerada o início cartas, são todos atualizados com as novas propriedades de Pokémon para cada vez que uma nova geração começa.</p>
            <h3>Primeira Geração (1996 - 1999)</h3>
            <p>Os jogos originais de Pokémon são japoneses com um elemento de estratégia e foram criados por <strong>Satoshi Tajiri</strong> para o console Game Boy. Estes jogos de RPGs, e suas sequências, recriações e traduções para o inglês, ainda são considerados os jogos "principais" de Pokémon, e os jogos com os quais a maioria dos fãs da série estão familiarizados.</p>
            <picture>
                <source media="(max-width: 670px)" srcset="imagens/satoshi-tajiri-medio.jpg">
                <img src="imagens/satoshi-tajiri-grande.jpg" alt="Criador Satoshi Tajiri">
            </picture>
            <br>
            <p>A série Pokémon começou com o lançamento de Pocket Monsters Red e Green para o Game Boy no Japão. Quando estes jogos se revelaram extremamente populares, uma versão melhorada Blue foi lançada algum tempo depois, e a versão Blue foi reprogramada como Pokémon Red & Blue para lançamento internacional. A versão original "Green" nunca foi lançada fora do Japão. Depois, uma segunda versão melhorado, Pokémon Yellow, foi lançada para usar a paleta de cores do Game Boy Color e mais uma semelhança estilística com o anime popular Pokémon. Esta primeira geração de jogos introduziu as 151 espécies originais de Pokémon (na Pokédex Nacional, abrangendo todos os Pokémon de Bulbasaur até Mew), bem como os conceitos básicos do jogo de capturar, treinar, lutar e trocar Pokémon com jogadores humanos de computador.</p>
            <p>Essas versões dos jogos ocorrem dentro da região fictícia Kanto, embora o nome "Kanto" não tenha sido usado até a segunda geração. </p>
        </article>
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
    <?php include_once "rodape.php"?>
</body>
</html>