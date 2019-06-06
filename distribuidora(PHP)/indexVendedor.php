<?php

// allow requests from other applications
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
require('classes/Vendedor.php');

// listar (um) vendedor
if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['idVendedor'])) {
  $vendedor = new vendedor();
  echo json_encode($vendedor->listarItem($_GET['idVendedor']));
}

// Listar (todos) os vendedores
if(!isset($_GET['action'])) {
    $vendedor = new vendedor();
    echo json_encode($vendedor->listarTudo());
  }

// Novo vendedor
if(isset($_POST['action']) && $_POST['action'] == 'inserir') {
  $vendedor = new vendedor();
  echo json_encode($vendedor->inserir($_POST));
  return;
}

// Atualizar vendedor
if(isset($_POST['action']) && $_POST['action'] == 'atualizar') {
  $vendedor = new vendedor();
  if($vendedor->atualizar($_POST)) {
    echo 'Atualizado!';
  }
  return;

}
// Remover vendedor
if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['idVendedor'])) {
  $vendedor = new vendedor();
  if($vendedor->deletar($_GET['idVendedor'])) {
    echo 'Vendedor excluído!';
  }
  return;
}

