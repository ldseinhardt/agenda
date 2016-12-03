<?php

namespace App;

/**
 * Classe para criar uma conexão MySQL
 */
class MySQL
{
    private $mysqli;

    /**
     * Conecta ao banco de dados
     */
    function __construct($db)
    {
        $this->mysqli = new \MySQLi(
            $db['host'], $db['username'], $db['password'], $db['database']
        );
        if (mysqli_connect_errno()) {
            exit();
        }
        $this->mysqli->set_charset($db['charset']);
    }

    /**
     * Desconecta do banco de dados
     */
    function __destruct()
    {
        $this->mysqli->close();
    }

    /**
     * Executa uma consulta
     */
    public function query($sql)
    {
        return $this->mysqli->query($sql);
    }

    /**
     * Remove possíveis valores que resultariam em um mysql injection
     */
    public function scape($value)
    {
        return $this->mysqli->escape_string($value);
    }
}
