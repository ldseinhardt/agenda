<?php

namespace Agenda\Controllers;

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
        $organization = new OrganizationModel($app);

        $organizations = $organization->all();

        if ($request->isJson()) {
            $app->json($organizations);
        }

        $app->view('Organization/list', [
            'organizations' => $organizations,
            'error' => $request->getParam('error', 0)
        ]);
    }

    /**
     * Controller da rota: /organization/{id} (Página de uma organização)
     */
    public static function view($id, $app, $request)
    {
        $organization = new OrganizationModel($app);

        $organization = $organization->get($id);

        if ($request->isJson()) {
            $app->json($organization);
        }

        if (!$organization) {
            $app->redirect('/organization');
        }

        $app->view('Organization/view', [
            'id' => $id,
            'organization' => $organization,
            'error' => $request->getParam('error', 0)
        ]);
    }

    /**
     * Controller da rota: /organization/add (Página para adicionar uma organização)
     */
    public static function add($app, $request)
    {
        if ($request->isPost()) {
            $organization = new OrganizationModel($app);

            $data = $request->getData();

            $id = $organization->add(
                $data['name'] ?? '',
                $data['phone'] ?? ''
            );

            if ($request->isJson()) {
                $app->json($id);
            }

            if (!$id) {
                $app->redirect($request->getOrigin() . '?error=1');
            }

            $app->redirect('/organization/' . $id);
        }

        $app->view('Organization/add');
    }

    /**
     * Controller da rota: /organization/{id}/edit (Página para editar uma organização)
     */
    public static function edit($id, $app, $request)
    {
        if ($request->isPost()) {
            $organization = new OrganizationModel($app);

            $data = $request->getData();

             $organization->add(
                $id,
                $data['name'] ?? '',
                $data['phone'] ?? ''
            );

            if ($request->isJson()) {
                $app->json(true);
            }

            $app->redirect('/organization/' . $id);
        }

        $app->view('Organization/edit', [
            'id' => $id
        ]);
    }

    /**
     * Controller da rota: /organization/{id}/delete (Página para apagar uma organização)
     */
    public static function delete($id, $app, $request)
    {
        $organization = new OrganizationModel($app);

        $status = $organization->delete($id);

        if ($request->isJson()) {
            $app->json($status);
        }

        if (!$status) {
            $app->redirect($request->getOrigin() . '?error=1');
        }

        $app->redirect('/organization');
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

        $router::add('/^\/organization\/(\d{1,8})\/delete\/?$/', [new self(), 'delete'], 'GET | POST');
    }
}
