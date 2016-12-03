<?php

namespace App;

/**
 * Classe com métodos básicos para uma aplicação MVC
 */
class App
{
    private $options;

    /**
     * Adiciona as rotas e seta as configurações padrões
     */
    function __construct($classes)
    {
        foreach ($classes as $class) {
            $class::addRoutes(Router::class);
        }
        $this->options = [
            'views' => '',
            'database' => [
                'host' => 'localhost',
                'username' => '',
                'password' => '',
                'database' => '',
                'charset' => 'utf8'
            ],
            'mimetypes' => []
        ];
    }

    /**
     * Seta alguma configuração da aplicação
     */
    public function set($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * Retorna alguma configuração da aplicação
     */
    public function get($key)
    {
        return $this->options[$key];
    }

    /**
     * Verifica qual controller deve ser executado
     */
    public function router()
    {
        Router::dispatch($this);
    }

    /**
     * Adiciona uma rota estática
     */
    public function on($route, $bases)
    {
        Router::get($route, function($prefix, $filename, $app) use($bases) {
            try {
                preg_match('/\.(.+)\/?$/', $filename, $matches);
                if (count($matches) === 2) {
                    foreach ($this->options['mimetypes'] as $ext => $mime_type) {
                        if ($ext === $matches[1]) {
                            header("Content-Type: {$mime_type}; charset=utf-8");
                            break;
                        }
                    }
                }
                readfile($bases[$prefix] . $filename);
            } catch (Exception $e) {
                $app->view();
            }
        });
    }

    /**
     * Renderiza textos (imprime na saída)
     */
    public function render($text)
    {
        echo $text;
        exit();
    }

    /**
     * Renderiza uma view
     */
    public function view($view = 'error', $args = [])
    {
        try {
            preg_match('/\.(.+)\/?$/', $view, $matches);
            if (count($matches) !== 2) {
                $view .= '.php';
            }
            (new View($args))->load($this->options['views'] . $view);
            exit();
        } catch (Exception $e) {
            $app->view();
        }
    }


    /**
     * Renderiza um json
     */
    public function json($data)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit();
    }

    /**
     * Redireciona para alguma rota ou url
     */
    public function redirect($uri)
    {
        header('Location: ' . $uri);
        exit();
    }
}
