<?php
#pseudocódigo
namespace core\classes;

use Exception;

class Store
{
    // ========================================================================== 
    public static function Layout($structures, $dados = null)
    {

        # Check if structures is an array
        if (!is_array($structures)) {
            throw new Exception("Coleção de estrutura inválida");
        }

        # Variables
        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }
        
        # Presentation of store views
        foreach ($structures as $structure) {
            include("../core/views/$structure.php");
        }
    }

    // ========================================================================== 

    # Check if there is a client with a session = logged in client
    public static function clienteLogado()
    {
        return isset($_SESSION['cliente']);   
    }

    public static function gerarHash($num_caracteres = 12)
    {   
        // criar hashes para senhas.
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZABCDEFGHIJKLMNOPQRSTUWXYZ";
        return substr(str_shuffle($chars),  0, $num_caracteres);
    }

    
}



/*
$structures é esses ficheiros à baixo
html_header.php 
inicio.php
html_footer.php

*/