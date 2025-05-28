<?php
/*
tabela cliente(ID_CLIENTE,NOME,TELEFONE,ENDERECO,CPF)
CRUD
Create -Insert
Read - Select
Update
Delete
*/

class cliente
{

  /* Atributos*/
  private $idCliente;
  private $nome;
  private $telefone;
  private $endereco;
  private $cpf;

  /* Getter e Setters */
  public function getIdCliente()
  {
    return $this->idCliente;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getTelefone()
  {
    return $this->telefone;
  }
  public function getEndereco()
  {
    return $this->endereco;
  }
  public function getCpf()
  {
    return $this->cpf;
  }
  public function setIdCliente($valor)
  {
    $this->idCliente = $valor;
  }
  public function setNome($valor)
  {
    $this->nome = $valor;
  }
  public function setTelefone($valor)
  {
    $this->telefone = $valor;
  }
  public function setEndereco($valor)
  {
    $this->endereco = $valor;
  }
  public function setCpf($valor)
  {
    $this->cpf = $valor;
  }

  /**
   * Métodos:
   * C-inserirCliente($nome)
   *
   * R-listarClientes()
   * R-consultarCliente()
   *
   * alterarCliente($idCliente)
   * excluirCliente($idAluno)
   */

  public function consultarClientes($idCliente)
  {
    require("./conexaobd.php");

    $comando = "SELECT * FROM clientes WHERE id_cliente=:idCliente";
    $stmt = $pdo->prepare($comando);
    $stmt->bindParam(":idCliente", $idCliente);

    $stmt->execute();

    if ($stmt->rowCount() == 0) {
      $this->idCliente = 0;
      $this->nome = "";
      $this->telefone = "";
      $this->endereco = "";
      $this->cpf = "";
      $retorna = false;
    } else {
      foreach ($stmt as $registro) {
        $this->idCliente = $registro['idCliente'];
        $this->nome = $registro['nome'];
        $this->telefone = $registro['telefone'];
        $this->endereco = $registro['endereco'];
        $this->cpf = $registro['cpf'];
      }
      $retorna = true;
    }
    return $retorna;
  }

  public function listarClientes()
  {
    require("./conexaobd.php");

    $comando = "SELECT * FROM clientes ORDER BY nome ;";

    $stmt = $pdo->prepare($comando);

    $stmt->execute();
    return $stmt;
  }

  public function inserirClientes($nome, $telefone, $endereco, $cpf)
  {
    require("./conexaobd.php");
    $comando = "INSERT INTO clientes (nome, telefone, endereco, cpf)
            VALUES (:nome, :telefone, :endereco, :cpf);";
    $stmt = $pdo->prepare($comando);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":cpf", $cpf);

    $stmt->execute();
    if ($stmt->rowCount() == 1) {
      $retorna = true;
    } else {
      $retorna = false;
    }
    return $retorna;
  }

  public function alterarCliente($idCliente, $nome, $telefone, $endereco, $cpf)
  {
    require("./conexaobd.php");
    $comando = "UPDATE clientes SET nome = :nome, telefone = :telefone, endereco = :endereco, cpf = :cpf WHERE id_cliente = :idCliente";

    $stmt = $pdo->prepare($comando);
    $stmt->bindParam("id_cliente", $idCliente);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":cpf", $cpf);

    $stmt->execute();
    if ($stmt->rowCount() == 1) {
      $retorna = true;
    } else {
      $retorna = false;
    }
    return $retorna;
  }
  public function excluirCliente($idCliente)
  {
    require("./conexaobd.php");
    $comando = "DELETE FROM clientes WHERE id_cliente=:idCliente";

    $stmt = $pdo->prepare($comando);
    $stmt->bindParam(":idCliente", $idCliente);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
      $retorna = true;
    } else {
      $retorna = false;
    }
    return $retorna;
  }
}
