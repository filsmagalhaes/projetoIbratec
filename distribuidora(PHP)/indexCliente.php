<?php

// allow requests from other applications
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require('classes/Cliente.php');

// listarr (um) cliente
if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['idCliente'])) {
  $cliente = new Cliente();
  echo json_encode($cliente->listarItem($_GET['idCliente']));
}

// Listar (todos) os clientes


// Novo cliente
if(isset($_POST['action']) && $_POST['action'] == 'inserir') {
  $cliente = new Cliente();
  echo json_encode($cliente->inserir($_POST));
  return;
}

// Atualizar cliente
if(isset($_POST['action']) && $_POST['action'] == 'atualizar') {
  $cliente = new Cliente();
  if($cliente->atualizar($_POST)) {
    echo 'Atualizado!';
  }
  return;

}
// Remover cliente
if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['idCliente'])) {
  $cliente = new Cliente();
      echo 'Cliente excluído!';

  if($cliente->deletar($_GET['idCliente'])) {
    echo 'Cliente excluído!';
  }
  return;
}

// Todos clientes
if(!isset($_GET['action'])) {
  $cliente = new Cliente();
  echo json_encode($cliente->listarTudo());
}