<?php

namespace Agenda\Controllers;

use Agenda\Models\Contact as ContactModel;
use Agenda\Models\Organization as OrganizationModel;

/**
 * Classe Controller de Contatos
 */
class Contact
{
    /**
     * Controller da rota: /contact (Página de contatos)
     */
    public static function all($app, $request)
    {
        $app->json((new ContactModel($app))->all());
    }

    /**
     * Controller da rota: /contact/{id} (Página de um contato)
     */
    public static function view($id, $app, $request)
    {
        $app->render('Contact/view: ' . $id);
    }

    /**
     * Controller da rota: /contact/add (Página para adicionar um contato)
     */
    public static function add($app, $request)
    {
        $app->render('Contact/add');
    }

    /**
     * Controller da rota: /contact/{id}/edit (Página para editar um contato)
     */
    public static function edit($id, $app, $request)
    {
        $app->render('Contact/edit: ' . $id);
    }

    /**
     * Controller da rota: /contact/{id}/delete (Página para apagar um contato)
     */
    public static function delete($id, $app, $request)
    {
        $app->render('Contact/delete: ' . $id);
    }

    /**
     * Adiciona as rotas
     */
    public static function addRoutes($router)
    {
        $router::get('/^\/contact\/?$/', [new self(), 'all']);

        $router::get('/^\/contact\/(\d{1,8})\/?$/', [new self(), 'view']);

        $router::add('/^\/contact\/add\/?$/', [new self(), 'add'], 'GET | POST');

        $router::add('/^\/contact\/(\d{1,8})\/edit\/?$/', [new self(), 'edit'], 'GET | POST');

        $router::post('/^\/contact\/(\d{1,8})\/delete\/?$/', [new self(), 'delete']);
    }
}
