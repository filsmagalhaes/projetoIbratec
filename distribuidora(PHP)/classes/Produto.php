<?php
require('core/Database.php');

class Produto {


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
    $sql = 'SELECT * FROM produto';
    $produto = $this->connection->prepare($sql);
    $produto->execute();
    return $produto->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - produto específico
   * 
   * @param int $id
   * @return object
   */
  public function listarItem($idProduto)
  {
    $sql = 'SELECT * FROM produto WHERE idProduto = :idProduto';
    $produto = $this->connection->prepare($sql);
    $produto->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
    $produto->execute();
    return $produto->fetch(PDO::FETCH_OBJ);
  }

  /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO produto ( nome, valor, descricao) ';
     $sql .= 'VALUES (:nome, :valor, :descricao)';
     $produto = $this->connection->prepare($sql);
     $produto->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $produto->bindValue(':valor', $dados['valor'], PDO::PARAM_INT);
     $produto->bindValue(':descricao', $dados['descricao'], PDO::PARAM_STR);
          
     $produto->execute();
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
     $sql = 'UPDATE produto SET  nome = :nome, valor = :valor, descricao = :descricao WHERE idProduto = :idProduto';
     $produto = $this->connection->prepare($sql);
     $produto->bindValue(':idProduto', $dados['idProduto'], PDO::PARAM_INT);
     $produto->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $produto->bindValue(':valor', $dados['valor'], PDO::PARAM_STR);
     $produto->bindValue(':descricao', $dados['descricao'], PDO::PARAM_STR);
          
     return $produto->execute();
   }

   /**
   * DELETE
   * 
   * @param int $idProduto
   * @return object
   */
  public function deletar($idProduto)
  {
    $sql = 'DELETE FROM produto WHERE idProduto = :idProduto';
    $produto = $this->connection->prepare($sql);
    $produto->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
    return $produto->execute();
  }
}