<?php

namespace App;

/**
 * Classe com métodos básicos para renderizar uma view em seu próprio contexto
 */
class View
{
    private $views_path;
    /**
     * Adiciona ao contexto da view seus parâmetros
     */
    function __construct($path, $args)
    {
        $this->views_path = $path;
        foreach ($args as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Carrega a view (arquivo)
     */
    public function include($filename)
    {
        $matches = explode('.', $filename);
        if (count($matches) === 1) {
            $filename .= '.php';
        }
        require_once $this->views_path . $filename;
    }
}
