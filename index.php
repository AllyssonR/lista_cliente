<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Lista de Clientes</title>
</head>

<body>
  <div class="container">
    <header>
      Cadastro de Clientes
    </header>
  </div>
  <div class="actions">
    <a href="./cliente.php"><button type="button">Novo Cliente</button></a>
  </div>
  <table>
    <thead>
      <th>ID</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Endereço</th>
      <th>CPF</th>
      <th>ALterar - Excluir</th>
    </thead>
    <tbody>
      <?php
      require("./classecliente.php");
      $cliente = new Cliente();
      $listaDeCliente = $cliente->listarClientes();

      foreach ($listaDeCliente as $registro) {
        $idCliente = $registro["id_cliente"];
        $nome = $registro["nome"];
        $telefone = $registro["telefone"];
        $endereco = $registro["endereco"];
        $cpf = $registro["cpf"];
        echo "<tr>";
        echo "<td>$idCliente</td>";
        echo "<td>$nome</td>";
        echo "<td>$telefone</td>";
        echo "<td>$endereco</td>";
        echo "<td>$cpf</td>";
        echo "<td>";
        echo "<a>Alterar</a>";
        echo "<a>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>
