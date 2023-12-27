<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\Store;

class Main
{
  // ========================================================================== 
  public function index()
  {
    # Displays the store page
    Store::Layout([
      'layout/html_header',
      'layout/header',
      'inicio',
      'layout/footer',
      'layout/html_footer',
    ]);
  }

  // ========================================================================== 

  public function loja()
  {
    Store::Layout([
      'layout/html_header',
      'layout/header',
      'loja',
      'layout/footer',
      'layout/html_footer',
    ]);
  }

  public function carrinho()
  {
    Store::Layout([
      'layout/html_header',
      'layout/header',
      'carrinho',
      'layout/footer',
      'layout/html_footer',
    ]);
  }

  public function novo_cliente()
  {
    if (Store::clienteLogado()) {
      $this->index();
      return;
    }
    Store::Layout([
      'layout/html_header',
      'layout/header',
      'criar_cliente',
      'layout/footer',
      'layout/html_footer',
    ]);
  }

  public function criar_client_submit()
  {

    # Verifica se já existe uma sessão
    if (Store::clienteLogado()) {
      $this->index();
      return;
    }

    # Verifica se ouve submit de um formulario
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->index();
      return;
    }

    # Verifica se a senha 1 é igual senha 2 
    if ($_POST['text_senha_1'] != $_POST['text_senha_2']) {

      # as passwords são diferentes e não podemos avançae
      $_SESSION['erro'] = "As senhas não correspondem";
      $this->novo_cliente();
      return;
    }

    # Verifica se já existe um e-mail igual no BD na hora do cadastro
    $bd = new Database();
    $parametros = [
      ':email' => strtolower(trim($_POST['text_email'])),
    ];
    
    $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $parametros);

    # Verifica se o cliente já existe!
    if (count($resultados) != 0) {
      $_SESSION['erro'] = "Já existe um mesmo e-mail cadastrado";
      $this->novo_cliente();
      return;
    }

    # Parte do registro dos clientes no Banco de Dados
      


    
  }
}
