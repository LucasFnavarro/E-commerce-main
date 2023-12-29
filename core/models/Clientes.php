<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Clientes
{

    public function verificar_email_existe($email)
    {

        // verifica se já existe um email igual cadastrado no BD
        $bd = new Database();
        $parametros = [
            ':e' => strtolower(trim($email))
        ];

        $resultados = $bd->select("SELECT email FROM clientes WHERE email = :e", $parametros);

        # Verifica se o cliente já existe!
        if (count($resultados) != 0) {
            return true;
        } else {
            return false;
        }
    }

    
    public function registrar_cliente()
    {
        # Parte do registro dos novos clientes no Banco de Dados

        $bd = new Database();

        # Cria uma hash para a senha na hora do registro de novos clientes  
        $purl = Store::gerarHash();

        $params = [
            ':email' => strtolower(trim($_POST['text_email'])),
            ':senha' => password_hash($_POST['text_senha_1'], PASSWORD_DEFAULT),
            ':nome_completo' => trim($_POST['text_nome_completo']),
            ':endereco' => trim($_POST['text_endereco']),
            ':cidade' => trim($_POST['text_cidade']),
            ':contato' => trim($_POST['text_contato']),
            ':purl' => $purl,
            'ativo' => 0
        ];

        $bd->insert("INSERT INTO clientes VALUES(0, :email, :senha, :nome_completo, :endereco, :cidade, :contato, :purl, :ativo, NOW(), NOW(), NULL)", $params);

        # Retorna o PURL criado
        return $purl;
    }
}
