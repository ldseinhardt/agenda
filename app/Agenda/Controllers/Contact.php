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
        $contact = new ContactModel($app);

        $contacts = $contact->all();

        if ($request->isJson()) {
            $app->json($contacts);
        }

        $app->view('Contact/list', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Controller da rota: /contact/{id} (Página de um contato)
     */
    public static function view($id, $app, $request)
    {
        $contact = new ContactModel($app);

        $contact = $contact->get($id);

        if ($request->isJson()) {
            $app->json($contact);
        }

        if (!$contact) {
            $app->redirect('/contact');
        }

        $app->view('Contact/view', [
            'id' => $id,
            'contact' => $contact
        ]);
    }

    /**
     * Controller da rota: /contact/add (Página para adicionar um contato)
     */
    public static function add($app, $request)
    {
        if ($request->isPost()) {
            $contact = new ContactModel($app);

            $id = $contact->add($request->getData());

            if ($request->isJson()) {
                $app->json($id);
            }

            if (!$id) {
                $app->redirect($request->getOrigin() . '?error=1');
            }

            $app->redirect('/contact/' . $id);
        }

        $app->view('Contact/add', [
            'error' => $request->getParam('error')
        ]);
    }

    /**
     * Controller da rota: /contact/{id}/edit (Página para editar um contato)
     */
    public static function edit($id, $app, $request)
    {
        $app->view('Contact/edit', [
            'id' => $id
        ]);
    }

    /**
     * Controller da rota: /contact/{id}/delete (Página para apagar um contato)
     */
    public static function delete($id, $app, $request)
    {
        $contact = new ContactModel($app);

        $status = $contact->delete($id);

        if ($request->isJson()) {
            $app->json($status);
        }

        if (!$status) {
            $app->redirect($request->getOrigin() . '?error=1');
        }

        $app->redirect('/contact');
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

        $router::add('/^\/contact\/(\d{1,8})\/delete\/?$/', [new self(), 'delete'], 'GET | POST');
    }
}
