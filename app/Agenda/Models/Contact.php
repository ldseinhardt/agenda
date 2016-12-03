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
        $query = $this->mysql->query("
            SELECT
              `contacts`.`id`,
              `contacts`.`first_name`,
              `contacts`.`last_name`,
              `emails`.`email` AS `email`,
              `phones`.`phone` AS `phone`,
              `organizations`.`name` AS `organization`,
              `contacts`.`created`,
              `contacts`.`modified`
            FROM
              `contacts`
              LEFT JOIN `emails` ON (`contacts`.`id` = `emails`.`contact_id` AND `contacts`.`primary_email_id` = `emails`.`id`)
              LEFT JOIN `phones` ON (`contacts`.`id` = `phones`.`contact_id` AND `contacts`.`primary_phone_id` = `phones`.`id`)
              LEFT JOIN `organizations` ON (`contacts`.`organization_id` = `organizations`.`id`)
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

        return [];
    }

    public function add()
    {

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
