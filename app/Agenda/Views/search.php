<?php
    $this->content = "<h1>Resultados para: '{$this->search}'</h1>";

    $this->content .= '
        <div class="panel panel-default">
          <div class="panel-body">
            <strong>Ops! Não há resultados... : (</strong>
          </div>
        </div>
    ';

    $this->include('Layout/base');
