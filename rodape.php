<?php 
echo "<footer>";
echo "<p>Acessado por " . $_SERVER['REMOTE_ADDR']. " em " . date('d/m/Y'). "</p>";
echo "<p>Site criado por <strong>Yoko Takano</strong></p>";
echo "</footer>";
$banco->close();
?>