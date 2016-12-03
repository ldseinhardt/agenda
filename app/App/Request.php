<?php

namespace App;

/**
 * Classe com métodos básicos para tratar requisições
 */
class Request
{
    private $method;
    private $uri;
    private $accept;
    private $params;
    private $data;

    /**
     * Captura os dados da requisição a partir das váriaveis globais
     */
    function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->accept = $_SERVER['HTTP_ACCEPT'];
        $this->params = $_GET;
        $this->data = $_POST;
    }

    /**
     * Retorna o método (GET, POST, ...)
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Verifica se é uma requisição do tipo GET
     */
    public function isGet()
    {
        return $this->method === 'GET';
    }

    /**
     * Verifica se é uma requisição do tipo POST
     */
    public function isPost()
    {
        return $this->method === 'POST';
    }

    /**
     * Retorna a url (path)
     */
    public function getUrl()
    {
        return $this->uri;
    }

    /**
     * Retorna os formatos aceitos pelo navegador
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Verifica se a requisição aceita json (Ajax)
     */
    public function isJson()
    {
        return preg_match('/^application\/json/', $this->accept, $matches);
    }

    /**
     * Retorna os parâmetros GET
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Retorna um parâmetro GET pelo nome ou então seu valor default
     */
    public function getParam($param, $default = null)
    {
        return isset($this->params[$param])
            ? $this->params[$param]
            : $default;
    }

    /**
     * Retorna os parâmetros POST
     */
    public function getData()
    {
        return $this->data;
    }
}
