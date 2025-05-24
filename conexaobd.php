<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancoDeDados = "clientes";

try {
  $pdo = new PDO("mysql:host=$servidor;dbname=$bancoDeDados;charset=utf8", $usuario, $senha);
  $pdo->exec("SET NAMES utf8");
  $pdo->exec("SET CHARACTER SET utf8");
 // echo "Sucesso na conexao com o SGBD ";
} catch (PDOException $erro) {
  echo "Erro na conexao com o SGBD" . $erro->getMessage();
}
