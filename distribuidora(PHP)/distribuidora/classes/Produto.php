<?php
require('banco/Conexao.php');

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
  public function listarItem($id)
  {
    $sql = 'SELECT * FROM produto WHERE id = :id';
    $produto = $this->connection->prepare($sql);
    $produto->bindValue(':id', $id, PDO::PARAM_INT);
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
     $sql = 'INSERT INTO produto (id, nome, valor, descricao) ';
     $sql .= 'VALUES (:id, :nome, :valor, :descricao)';
     $produto = $this->connection->prepare($sql);
     $produto->bindValue(':id', $dados['id'], PDO::PARAM_STR);
     $produto->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $produto->bindValue(':valor', $dados['valor'], PDO::PARAM_STR);
     $produto->bindValue(':descricao', $dados['descricao'], PDO::PARAM_STR);
     $produto->bindValue(':fk_cpf', $dados['fk_cpf'], PDO::PARAM_STR);
     
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
     $sql = 'UPDATE produto SET id = :id, nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id';
     $produto = $this->connection->prepare($sql);
     $produto->bindValue(':id', $dados['id'], PDO::PARAM_INT);
     $produto->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $produto->bindValue(':valor', $dados['valor'], PDO::PARAM_STR);
     $produto->bindValue(':descricao', $dados['descricao'], PDO::PARAM_STR);
     $produto->bindValue(':fk_cpf', $dados['fk_cpf'], PDO::PARAM_STR);
     
     return $produto->execute();
   }

   /**
   * DELETE
   * 
   * @param int $id
   * @return object
   */
  public function deletar($id)
  {
    $sql = 'DELETE FROM produto WHERE id = :id';
    $produto = $this->connection->prepare($sql);
    $produto->bindValue(':id', $id, PDO::PARAM_INT);
    return $produto->execute();
  }
}