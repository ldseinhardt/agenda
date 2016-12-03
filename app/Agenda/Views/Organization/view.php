<?php
    $this->content = '<h1>XXX-YYY-ZZZ</h1>';

    $this->content .= "
        <div class=\"row\">
            <div style=\"padding: 0 15px\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                        <strong>Telefone:</strong> +5553984470652<br>
                        <a href=\"/organization/1/edit\" class=\"btn btn-raised btn-primary\">
                            <i class=\"material-icons\">&#xE254;</i> Editar
                        </a>
                        <a href=\"/organization/1/delete\" onclick=\"return confirm('Certeza que quer remover esta organização?')\" class=\"btn btn-raised btn-danger\">
                            <i class=\"material-icons\">&#xE872;</i> Apagar
                        </a>
                    </div>
               </div>
            </div>
        </div>
    ";

    $this->include('Layout/base');
