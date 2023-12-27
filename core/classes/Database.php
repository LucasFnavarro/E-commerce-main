<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{
    private $ligacao;

    // ========================================================================== 

    private function ligarDatabase()
    {

        # Database connection
        $this->ligacao = new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ';' .
                'dbname=' . MYSQL_DATABASE . ';' .
                'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,

            # Mantém uma ligação na BD - estabelece a conexão de forma mais rápida
            array(PDO::ATTR_PERSISTENT => true)
        );

        # Debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ========================================================================== 

    private function desligarDatabase()
    {

        # Disconnect from the database
        $this->ligacao = null;
    }

    // ========================================================================== 

    public function select($sql, $parametros = null)
    {

        $sql = trim($sql);
        # Checks whether it is a "SELECT" statement using Regular Expressions
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception('Base de dados - não é uma instrução SELECT.');
        }

        # Performs the search function in SQL
        $this->ligarDatabase();

        $resultados = null;

        # Comunication 
        try {

            # Communication with the database
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {

            # If you have an error with communication, you will receive an error
            return false;
        }
        # Disconnect from the Data Base
        $this->desligarDatabase();

        # Return of results obtained
        return $resultados;
    }

    // ========================================================================== 

    public function insert($sql, $parametros = null)
    {

        $sql = trim($sql);

        # Check if it is an "INSERT" statement using Regular Expressions
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception('Base de dados - não é uma instrução INSERT.');
        }

        # Performs the search function in SQL
        $this->ligarDatabase();

        # Comunication 
        try {

            # Communication with the database
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {

            # Returns false when encountering an error
            return false;
        }

        # Disconnect from the Data Base
        $this->desligarDatabase();
    }

    // ========================================================================== 

    public function update($sql, $parametros = null)
    {
        $sql = trim($sql);

        # Check if it is an "UPDATE" statement using Regular Expressions
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Base de dados - não é uma instrução UPDATE.');
        }

        # Performs the search function in SQL
        $this->ligarDatabase();

        # Comunication
        try {

            # Communication with the database
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {

            # Returns false when encountering an error
            return false;
        }

        # Disconnect from the Data Base
        $this->desligarDatabase();
    }

    // ========================================================================== 

    public function delete($sql, $parametros = null)
    {
        $sql = trim($sql);

        # Check if it is an "DELETE" statement using Regular Expressions
        if (!preg_match("/^DELETE/i", $sql)) {
            throw new Exception('Base de dados - não é uma instrução DELETE.');
        }

        # Performs the search function in SQL
        $this->ligarDatabase();

        # Communication with the database
        try {

            # Communication with the database
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {

            # Returns false when encountering an error
            return false;
        }
        # Disconnect from the Data Base
        $this->desligarDatabase();
    }

    // ========================================================================== 

    public function statement($sql, $parametros = null)
    {
        $sql = trim($sql);

        # It will check if it is a different instruction than the previous ones
        if (preg_match("/SELECT|INSERT|UPDATE|DELETE/i", $sql)) {
            throw new Exception('Instrução inválida');
        }

        # Performs the search function in SQL
        $this->ligarDatabase();

        //comunicar
        try {

            # Communication with the database
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {

            # Returns false when encountering an error
            return false;
        }

        # Disconnect from the Data Base
        $this->desligarDatabase();
    }
}
