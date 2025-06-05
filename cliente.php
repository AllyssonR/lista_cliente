<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cliente.css">
  <link rel="stylesheet" href="./style.css">
  <title>Cadastro de Cliente</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>Cadastro de clientes</h1>
    </header>
    <form action="./salvar.php">
      <?php
      $idCliente = $_GET["id_cliente"];
      $nome = "";
      $telefone = "";
      $endereco = "";
      $cpf = "";
      if ($idCliente != 0) {
        require("./classecliente.php");
        $cliente = new cliente();
        $cliente->setIdCliente($idCliente);
        $cliente->consultarClientes(idCliente: $idCliente);
        $nome = $cliente->getNome();
        $telefone = $cliente->getTelefone();
        $endereco = $cliente->getEndereco();
        $cpf = $cliente->getCpf();
      }
      ?>
      <div class="form-group">

        <input type="hidden" name="id_cliente" value="<?php echo $idCliente ?>">
        <label for="nome">Nome do Cliente</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
        <label for="nome">telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $telefone ?>" required>
        <label for="nome">endereco</label>
        <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" required>
        <label for="nome">cpf</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>" required>
      </div>
      <div class="form-group">

        <input type="submit" " value=" Salvar">
        <a href="./index.php"><button type="button">Voltar</button></a>
      </div>
    </form>
  </div>
</body>

</html>
