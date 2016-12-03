<?php

namespace App;

/**
 * Classe com métodos básicos para renderizar uma view em seu próprio contexto
 */
class View
{
    /**
     * Adiciona ao contexto da view seus parâmetros
     */
    function __construct($args)
    {
        foreach ($args as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Carrega a view (arquivo)
     */
    public function load($filename)
    {
        require_once $filename;
    }
}
