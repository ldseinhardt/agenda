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
        $app->view('home', ['name' => 'Luan']);
    }

    /**
     * Adiciona as rotas da aplicação
     */
    public static function addRoutes($router)
    {
        $router::get('/^\/?$/', [new self(), 'home']);

        Contact::addRoutes($router);

        Organization::addRoutes($router);
    }
}
