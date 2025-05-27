<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Cliente</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>Cadastro de clientes</h1>
    </header>
    <form action="./salvar.php">
      <?php
      $idCliente = $_GET["idCliente"];
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

    </form>
  </div>
</body>

</html>
