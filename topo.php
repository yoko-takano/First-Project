<?php 
echo "<header>";
echo "<h1>Pokemon - Primeira Geração</h1>";
echo "<span id='burger' class='material-symbols-outlined' onclick='clickMenu()'>Menu</span>";
echo "<menu id='itens'>
    <ul>
        <li><a href='index.php'>Página Inicial</a></li>
        <li><a href='bancodedados.php'>Pokedex</a></li>
        <li><a href='#'>Jogos</a></li>";
if (empty($_SESSION['user'])) {
   echo "<li><a href='user-login.php'>Entrar</a></li>"; 
   echo "</ul></menu></header>";
} else {
    echo "</ul></menu></header>";
    echo "<p>Bem-vindo(a), <strong>" . $_SESSION['nome'] . "</strong> | ";
    echo "Meus Dados | ";

    if (is_admin()) {
        echo "Novo Usuário | ";
        echo "Novo Pokemon | ";
    }

    echo "<a href='user-logout.php'>Sair</a> | ";
    echo "<p>(Usuário do tipo " . $_SESSION['tipo'] . ")</p>";
}

?>