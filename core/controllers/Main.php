<?php

namespace core\controllers;

use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\Clientes;

class Main
{
  // ========================================================================== 
  public function index()
  {

    # teste de envios de email
    //$email = new EnviarEmail();
    //$email->enviar_email_confirmacao_novo_cliente();
    //die('OK');

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

      # as passwords são diferentes e não podemos avançar
      
      $_SESSION['erro'] = "As senhas não correspondem";
      $this->novo_cliente();
      return;
    }

    # Verifica se já existe um e-mail igual no BD na hora do cadastro
    $cliente = new Clientes();
    if ($cliente->verificar_email_existe($_POST['text_email'])) {

      $_SESSION['erro'] = "Já existe um mesmo e-mail cadastrado";
      $this->novo_cliente();
      return;
    }

    $purl = $cliente->registrar_cliente();

    // criar link PURL para envio de emails
    $link_purl = "http://localhost/E-commerce-main/public/?a=confirmar_email&purl=$purl";
  }
}
