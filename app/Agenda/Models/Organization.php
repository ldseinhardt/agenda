<?php

namespace Agenda\Models;

use App\MySQL;

/**
 * Classe Model de Organizações/Empresas
 */
class Organization
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
     * Retorna todos as organizações
     */
    public function all()
    {
        $query = $this->mysql->query('SELECT * FROM organizations');
        return $query->fetch_all();
    }
}
