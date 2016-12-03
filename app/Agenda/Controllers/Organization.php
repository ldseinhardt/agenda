<?php

namespace Agenda\Controllers;

use Agenda\Models\Contact as ContactModel;
use Agenda\Models\Organization as OrganizationModel;

/**
 * Classe Controller de Organizações/Empresas
 */
class Organization
{
    /**
     * Controller da rota: /organization (Página de organizações)
     */
    public static function all($app, $request)
    {
        $app->render('Organization/all');
    }

    /**
     * Controller da rota: /organization/{id} (Página de uma organização)
     */
    public static function view($id, $app, $request)
    {
        $app->render('Organization/view: ' . $id);
    }

    /**
     * Controller da rota: /organization/add (Página para adicionar uma organização)
     */
    public static function add($app, $request)
    {
        $app->render('Organization/add');
    }

    /**
     * Controller da rota: /organization/{id}/edit (Página para editar uma organização)
     */
    public static function edit($id, $app, $request)
    {
        $app->render('Organization/edit: ' . $id);
    }

    /**
     * Controller da rota: /organization/{id}/delete (Página para apagar uma organização)
     */
    public static function delete($id, $app, $request)
    {
        $app->render('Organization/delete: ' . $id);
    }

    /**
     * Adiciona as rotas
     */
    public static function addRoutes($router)
    {
        $router::get('/^\/organization\/?$/', [new self(), 'all']);

        $router::get('/^\/organization\/(\d{1,8})\/?$/', [new self(), 'view']);

        $router::add('/^\/organization\/add\/?$/', [new self(), 'add'], 'GET | POST');

        $router::add('/^\/organization\/(\d{1,8})\/edit\/?$/', [new self(), 'edit'], 'GET | POST');

        $router::post('/^\/organization\/(\d{1,8})\/delete\/?$/', [new self(), 'delete']);
    }
}
