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

        $data = [];

        while ($row = $query->fetch_object()) {
            $data[] = $row;
        }

        return $data;
    }

    public function get($id)
    {
        $id = $this->mysql->scape($id);

        return [];
    }

    public function update($id)
    {
        $id = $this->mysql->scape($id);
    }

    public function delete($id)
    {
        $id = $this->mysql->scape($id);
    }
}
