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

    public static function clienteLogado()
    {
        # Check if there is a client with a session = logged in client
        return isset($_SESSION['cliente']);   
    }
}



/*
$structures é esses ficheiros à baixo
html_header.php 
inicio.php
html_footer.php

*/