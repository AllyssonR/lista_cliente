<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $nome = $_GET['nome'];
  $telefone = $_GET["telefone"];
  $endereco = $_GET['endereco'];
  $cpf = $_GET["cpf"];

  if (empty($nome) || empty($telefone) || empty($endereco) || empty($cpf)) {
    $erro = "Erro Todos os campos são obrigatorios";
  }
  $cliente = [
    'nome' => $nome,
    'telefone' => $telefone,
    'endereco' => $endereco,
    'cpf' => $cpf
  ];
  if (!isset($_SESSION["clientes"])) {
    $_SESSION["clientes"] = [];
  }

  array_push($_SESSION["clientes"], $cliente);

  header("Location: index.php");
  exit();
}
