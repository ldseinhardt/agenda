<?php

require_once __DIR__ . '/autoload.php';

use App\App;
use Agenda\Agenda;

/**
 * Registra as aplicações para que seja adcionado as rotas da mesma
 * Nota: A aplicação Agenda poderia herdar App, porém desta forma
 * poderia ser adicionado vários apps no mesmo projeto como, por exemplo,
 * um app para envio de Email ou SMS
 */
$app = new App([
    Agenda::class
]);

/**
 * Configurações de banco de dados
 */
$app->set('database', [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'test123',
    'database' => 'agenda',
    'charset' => 'utf8'
]);

/**
 * Pasta padrão das views
 */
$app->set('views', __DIR__ . '/Agenda/Views/');

/**
 * MIME types para arquivos estáticos (assets)
 */
$app->set('mimetypes', [
    'js'   => 'application/javascript',
    'css'  => 'text/css',
    'jpg'  => 'image/jpeg',
    'png'  => 'image/png',
    'webp' => 'image/webp',
    'gif'  => 'image/gif'
]);

/**
 * Rota de arquivos estáticos (assets)
 */
$app->on('/^\/(assets|vendor)\/(.+)\/?$/', [
    'assets' => __DIR__ . '/../public/assets/',
    'vendor' => __DIR__ . '/../bower_components/'
]);

return $app;
