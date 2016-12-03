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
        $query = $this->mysql->query("
            SELECT
                `id`,
                `name`,
                `phone`
            FROM
                `organizations`
            ORDER BY `id` DESC
        ");

        $data = [];

        while ($row = $query->fetch_object()) {
            $data[] = $row;
        }

        return $data;
    }

    public function get($id)
    {
        $id = $this->mysql->scape($id);

        $query = $this->mysql->query("
            SELECT
                `id`,
                `name`,
                `phone`
            FROM
                `organizations`
            WHERE
                `id` = {$id};
        ");

        return $query->num_rows
            ? $query->fetch_object()
            : null;
    }

    public function add($name, $phone)
    {
        $name = $this->mysql->scape($name);
        $phone = $this->mysql->scape($phone);

        $this->mysql->query("
            INSERT INTO `organizations` (`name`, `phone`) VALUE
              ('{$name}', '$phone')
        ");

        return $this->mysql->insert_id();
    }

    public function update($id)
    {
        $id = $this->mysql->scape($id);



        return $this->mysql->affected_rows() !== -1;
    }

    public function delete($id)
    {
        $id = $this->mysql->scape($id);

        $query = $this->mysql->query("
            DELETE FROM
                `organizations`
            WHERE
                `id` = {$id};
        ");

        return $this->mysql->affected_rows() !== -1;
    }
}
