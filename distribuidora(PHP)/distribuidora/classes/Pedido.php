<?php
require('banco/Conexao.php');

class Pedido {


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
    $sql = 'SELECT * FROM pedido';
    $pedido = $this->connection->prepare($sql);
    $pedido->execute();
    return $pedido->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - produto específico
   * 
   * @param int $id
   * @return object
   */
  public function listarItem($id)
  {
    $sql = 'SELECT * FROM pedido WHERE id = :id';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':id', $id, PDO::PARAM_INT);
    $pedido->execute();
    return $pedido->fetch(PDO::FETCH_OBJ);
  }

  /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO pedido (id, quantidade, forma_pagamento, cnpj) ';
     $sql .= 'VALUES (:id, :quantidade, :forma_pagamento)';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':id', $dados['id'], PDO::PARAM_STR);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_cnpj', $dados['fk_cnpj'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_id', $dados['fk_id'], PDO::PARAM_STR);

     $pedido->execute();
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
     $sql = 'UPDATE pedido SET id = :id, quantidade = :quantidade, forma_pagamento = :forma_pagamento WHERE id = :id';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':id', $dados['id'], PDO::PARAM_INT);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_cnpj', $dados['fk_cnpj'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_id', $dados['fk_id'], PDO::PARAM_STR);

     
     return $pedido->execute();
   }

   /**
   * DELETE
   * 
   * @param int $id
   * @return object
   */
  public function deletar($id)
  {
    $sql = 'DELETE FROM pedido WHERE id = :id';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':id', $id, PDO::PARAM_INT);
    return $pedido->execute();
  }
}