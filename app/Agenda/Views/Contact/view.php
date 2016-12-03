<?php
    $this->content = '<h1>Luan Einhardt</h1>';

    $this->content .= "
        <div class=\"row\">
            <div style=\"padding: 0 15px\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                        <strong>Telefone:</strong> +5553984010101<br>
                        <strong>Email:</strong> ldseinhardt@gmail.com<br>
                        <strong>Organização:</strong> XXX-YYY-ZZZ<br>
                        <strong>Endereço:</strong> Rua XXX (96040-001) Fragata - Pelotas<br>
                        <strong>Data de criação:</strong> 2015-01-01<br>
                        <strong>Últimas alterações:</strong> 2015-01-01<br>
                        <a href=\"/contact/1/edit\" class=\"btn btn-raised btn-primary\">
                            <i class=\"material-icons\">&#xE254;</i> Editar
                        </a>
                        <a href=\"/contact/1/delete\" onclick=\"return confirm('Certeza que quer remover este contato?')\" class=\"btn btn-raised btn-danger\">
                            <i class=\"material-icons\">&#xE872;</i> Apagar
                        </a>
                    </div>
               </div>
            </div>
        </div>
    ";

    $this->include('Layout/base');
