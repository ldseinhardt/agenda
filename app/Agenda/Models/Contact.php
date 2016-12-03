<?php

namespace Agenda\Models;

use App\MySQL;

/**
 * Classe Model de Contatos
 */
class Contact
{
    private $mysql;

    /**
     * Cria a conexão com o banco de dados
     */
    function __construct($app)
    {
        $this->mysql = new MySQL($app->get('database'));
    }

    /**
     * Retorna todos os contatos
     */
    public function all()
    {
        $query = $this->mysql->query('SELECT * FROM contacts');
        return $query->fetch_all();
    }
}
