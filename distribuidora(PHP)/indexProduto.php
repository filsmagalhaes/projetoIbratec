<?php

// allow requests from other applications
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

require('classes/Produto.php');

// listar (um) produto
if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['idProduto'])) {
  $produto = new Produto();
  echo json_encode($produto->listarItem($_GET['idProduto']));
}

// Listar (todos) os produto

// Novo produto
if(isset($_POST['action']) && $_POST['action'] == 'inserir'){
  $produto = new Produto();
  echo json_encode($produto->inserir($_POST));
  return;
}

// Atualizar produto
if(isset($_POST['action']) && $_POST['action'] == 'atualizar') {
  $produto = new Produto();
  if($produto->atualizar($_POST)) {
    echo 'Atualizado!';
  }
  return;

}
// Remover produto
if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['idProduto'])) {
  $produto = new Produto();
  if($produto->deletar($_GET['idProduto'])) {
    echo 'Produto excluído!';
  }
  return;
}

// Todos produtos
if(!isset($_GET['action'])) {
  $produto = new Produto();
  echo json_encode($produto->listarTudo());
}