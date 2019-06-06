<?php
require('core/Database.php');

class Pedido {

// n uso o sublme mas como ver teus arquivos aqui?
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
  public function listarItem($idPedido)
  {
    $sql = 'SELECT * FROM pedido WHERE idPedido = :idPedido';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':idPedido', $idPedido, PDO::PARAM_INT);
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
     $sql = 'INSERT INTO pedido (quantidade, forma_pagamento, fk_idCliente, fk_idProduto) ';
     $sql .= 'VALUES (:quantidade, :forma_pagamento, :fk_idCliente, :fk_idProduto)';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_idCliente', $dados['fk_idCliente'], PDO::PARAM_INT);
     $pedido->bindValue(':fk_idProduto', $dados['fk_idProduto'], PDO::PARAM_INT);

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
     $sql = 'UPDATE pedido SET  quantidade = :quantidade, forma_pagamento = :forma_pagamento, ';
     $sql .= ' fk_idCliente = :fk_idCliente, fk_idProduto = :fk_idProduto ';
     $sql .= ' WHERE idPedido = :idPedido';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':idPedido', $dados['idPedido'], PDO::PARAM_INT);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':fk_idCliente', $dados['fk_idCliente'], PDO::PARAM_INT);
     $pedido->bindValue(':fk_idProduto', $dados['fk_idProduto'], PDO::PARAM_INT);

     
     return $pedido->execute();
   }

   /**
   * DELETE
   * 
   * @param int $idPedido
   * @return object
   */
  public function deletar($idPedido)
  {
    $sql = 'DELETE FROM pedido WHERE idPedido = :idPedido';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':idPedido', $idPedido, PDO::PARAM_INT);
    return $pedido->execute();
  }
}