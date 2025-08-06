<?php
//Definição das credenciais de conexão
$servername="localhost";
$username="root";
$password = "";
$dbname="armazenaimagem";

//Criando a conexão usando msqli
$conexao = new mysqli($servername,$username,$password,$dbname);

//Verificando a conexão
if($conexao -> connect_error){
    die("Falha na conexão: ".$conexao->connect_error);
}
?>