<?php
require('core/Database.php');

class Vendedor {


 /**
   * Connection instance
   * @var Database $connection
   */
   private $connection;
   /**
    * Intialize object with connection
    * 
    * @return void
    */
   public function __construct()
   {
     $this->connection = (new Database())->connect();
   }
   
   
  /**
   * SELECT - tudo
   * 
   * @return array
   */
  public function listarTudo()
  {
    $sql = 'SELECT * FROM vendedor';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->execute();
    return $vendedor->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - vendedor específico
   * 
   * @param int $cnpj
   * @return object
   */
  public function listarItem($idVendedor)
  {
    $sql = 'SELECT * FROM vendedor WHERE idVendedor = :idVendedor';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
    $vendedor->execute();
    return $vendedor->fetch(PDO::FETCH_OBJ);
  }

  /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO vendedor (cpf, nome, telefone, email) ';
     $sql .= 'VALUES (:cpf, :nome, :telefone, :email)';
     $cliente = $this->connection->prepare($sql);
     $cliente->bindValue(':cpf', $dados['cpf'], PDO::PARAM_STR);
     $cliente->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $cliente->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $cliente->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     $cliente->execute();
     return $this->connection->lastInsertId();
   }

/**
   * Update
   * 
   * @param array $dados
   * @return object
   */
   public function atualizar($dados)
   {
     $sql = 'UPDATE vendedor SET cpf = :cpf, nome = :nome, telefone = :telefone, email = :email ';
     $sql .=' WHERE idVendedor = :idVendedor';
     $vendedor = $this->connection->prepare($sql);
     $vendedor->bindValue(':idVendedor', $dados['idVendedor'], PDO::PARAM_INT);
    $vendedor->bindValue(':cpf', $dados['cpf'], PDO::PARAM_STR);
     $vendedor->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $vendedor->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $vendedor->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     return $vendedor->execute();
   }

   /**
   * DELETE
   * 
   * @param int $idVendedor
   * @return object
   */
  public function deletar($idVendedor)
  {
    $sql = 'DELETE FROM vendedor WHERE idVendedor = :idVendedor';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->bindValue(':idVendedor', $idVendedor, PDO::PARAM_INT);
    return $vendedor->execute();
  }
}