<?php

// allow requests from other applications
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require('classes/Pedido.php');

// listar (um) pedido
if(isset($_GET['action']) && $_GET['action'] == 'listarPedido' && isset($_GET['idPedido'])) {
  $pedido = new Pedido();
  echo json_encode($pedido->listarItem($_GET['idPedido']));
}

// Listar (todos) os pedidos
if(!isset($_GET['action'])) {
    $pedido = new Pedido();
    echo json_encode($pedido->listarTudo());
  }

// Novo pedido
if(isset($_POST['action']) && $_POST['action'] == 'inserir') {
  $pedido = new Pedido();
  echo json_encode($pedido->inserir($_POST));
  return;
}

// Atualizar pedido
if(isset($_POST['action']) && $_POST['action'] == 'atualizar') {
  $pedido = new Pedido();
  if($pedido->atualizar($_POST)) {
    echo 'Atualizado!';
  }
  return;

}
// Remover pedido
if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['idPedido'])) {
  $pedido = new Pedido();
  if($pedido->deletar($_GET['idPedido'])) {
    echo 'Pedido excluído!';
  }
  return;
}

// Todos pedidos
if(!isset($_GET['action'])) {
  $pedido = new Pedido();
  echo json_encode($payments->findAll());
}