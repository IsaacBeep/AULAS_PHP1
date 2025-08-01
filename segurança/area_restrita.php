<?php
echo "<h1> Àrea Restrita  </h1>";
echo "<p>Você não deveria esta aqui, mas conseguiu acessar devido a uma falha de segurança</p>";
echo "<p>Isso mostra como ataques SQL podem compremeter sistemas sem proteção adequada</p>";

<form action="login_inseguro.php" method = "POST">
    <input type="text" name="João" placeholder="Digite seu nome">
    <button type="submit">Entrar</button>
</form>
