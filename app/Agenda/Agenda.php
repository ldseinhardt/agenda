<?php

namespace Agenda;

use Agenda\Controllers\Contact;
use Agenda\Controllers\Organization;

/**
 * Classe da aplicação agenda
 */
class Agenda
{
    /**
     * Controller da rota: / (Página inicial)
     */
    public static function home($app, $request)
    {
        $app->view('home');
    }

    /**
     * Controller da rota: /search (Página de resultados de buscas)
     */
    public static function search($app, $request)
    {
        $app->view('search', [
            'search' => $request->getParam('q', '')
        ]);
    }

    /**
     * Adiciona as rotas da aplicação
     */
    public static function addRoutes($router)
    {
        $router::get('/^\/?$/', [new self(), 'home']);

        $router::get('/^\/search\/?$/', [new self(), 'search']);

        Contact::addRoutes($router);

        Organization::addRoutes($router);
    }
}
