<?php

namespace core\controllers;

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
    if(Store::clienteLogado()){
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

  public function criar_client_submit() {
    echo '<pre>';
    print_r($_POST);
  }

}
