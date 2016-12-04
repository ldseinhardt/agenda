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
    public function all($q = null)
    {
        $search = '';

        if ($q) {
            $q = $this->mysql->scape($q);

            $q = "%{$q}%";

            $search = "
                WHERE (
                    `contacts`.`first_name` LIKE '{$q}' OR
                    `contacts`.`last_name` LIKE '{$q}' OR
                    `emails`.`email` LIKE '{$q}' OR
                    `phones`.`phone` LIKE '{$q}' OR
                    `phone_types`.`label` LIKE '{$q}' OR
                    `organizations`.`name` LIKE '{$q}'
                )
            ";
        }

        $query = $this->mysql->query("
            SELECT
              `contacts`.`id`,
              `contacts`.`first_name`,
              `contacts`.`last_name`,
              CONCAT_WS(' ', `contacts`.`first_name`, `contacts`.`last_name`) as `name`,
              `emails`.`email` AS `email`,
              `phones`.`phone` AS `phone`,
              `phone_types`.`label` AS `phone_label`,
              `organizations`.`name` AS `organization`
            FROM
              `contacts`
              LEFT JOIN `emails` ON (`contacts`.`id` = `emails`.`contact_id` AND `contacts`.`primary_email_id` = `emails`.`id`)
              LEFT JOIN `phones` ON (`contacts`.`id` = `phones`.`contact_id` AND `contacts`.`primary_phone_id` = `phones`.`id`)
              LEFT JOIN `phone_types` ON (`phones`.`type_id` = `phone_types`.`id`)
              LEFT JOIN `organizations` ON (`contacts`.`organization_id` = `organizations`.`id`)
             {$search}
            ORDER BY `id` DESC
        ");

        $data = [];

        if (!($query && $query->num_rows)) {
            return $data;
        }

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
              `contacts`.`id`,
              `contacts`.`first_name`,
              `contacts`.`last_name`,
              CONCAT_WS(' ', `contacts`.`first_name`, `contacts`.`last_name`) as `name`,
              `contacts`.`primary_email_id`,
              `emails`.`email` AS `email`,
              `contacts`.`primary_phone_id`,
              `phones`.`phone` AS `phone`,
              `phone_types`.`label` AS `phone_label`,
              `organizations`.`id` AS `organization_id`,
              `organizations`.`name` AS `organization`,
              `address`.`address` AS `address`,
              `address`.`zip_code` AS `zip_code`,
              `address`.`district` AS `district`,
              `address`.`city` AS `city`,
              `contacts`.`created`,
              `contacts`.`modified`
            FROM
              `contacts`
              LEFT JOIN `emails` ON (`contacts`.`id` = `emails`.`contact_id` AND `contacts`.`primary_email_id` = `emails`.`id`)
              LEFT JOIN `phones` ON (`contacts`.`id` = `phones`.`contact_id` AND `contacts`.`primary_phone_id` = `phones`.`id`)
              LEFT JOIN `phone_types` ON (`phones`.`type_id` = `phone_types`.`id`)
              LEFT JOIN `organizations` ON (`contacts`.`organization_id` = `organizations`.`id`)
              LEFT JOIN `address` ON (`contacts`.`id` = `address`.`contact_id`)
            WHERE
                `contacts`.`id` = '{$id}'
        ");

        if (!($query && $query->num_rows)) {
            return null;
        }

        $data = $query->fetch_object();

        $data->emails = [];
        $query = $this->mysql->query("
            SELECT
              `emails`.`id`,
              `emails`.`email`
            FROM
              `emails`
              LEFT JOIN `contacts` ON (`emails`.`contact_id` = `contacts`.`id`)
            WHERE
                `emails`.`contact_id` = '{$id}' AND (
                    `contacts`.`primary_email_id` != `emails`.`id` || `contacts`.`primary_email_id` IS NULL
                )
        ");

        if ($query && $query->num_rows) {
            while ($row = $query->fetch_object()) {
                $data->emails[] = $row;
            }
        }

        $data->phones = [];
        $query = $this->mysql->query("
            SELECT
              `phones`.`id`,
              `phones`.`phone`,
              `phones`.`type_id`,
              `phone_types`.`label` AS `phone_label`
            FROM
              `phones`
              LEFT JOIN `contacts` ON (`phones`.`contact_id` = `contacts`.`id`)
              LEFT JOIN `phone_types` ON (`phones`.`type_id` = `phone_types`.`id`)
            WHERE
                `phones`.`contact_id` = '{$id}' AND (
                    `contacts`.`primary_phone_id` != `phones`.`id` || `contacts`.`primary_phone_id` IS NULL
                )
        ");

        if ($query && $query->num_rows) {
            while ($row = $query->fetch_object()) {
                $data->phones[] = $row;
            }
        }

        return $data;
    }

    public function add()
    {

    }

    public function update($id, $entries)
    {
        $id = $this->mysql->scape($id);
    }

    public function delete($id)
    {
        $id = $this->mysql->scape($id);

        $this->mysql->multi_query("
            UPDATE `contacts` SET
              `primary_email_id` = NULL,
              `primary_phone_id` = NULL
            WHERE `id` = {$id};

            DELETE FROM
                `emails`
            WHERE
                `contact_id` = {$id};

            DELETE FROM
                `phones`
            WHERE
                `contact_id` = {$id};

            DELETE FROM
                `address`
            WHERE
                `contact_id` = {$id};

            DELETE FROM
                `contacts`
            WHERE
                `id` = {$id}
        ");

        return $this->mysql->affected_rows() !== -1;
    }
}
