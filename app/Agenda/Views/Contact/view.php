<?php
    $this->content = "
        <h1>{$this->contact->first_name} {$this->contact->last_name}</h1>

        <div class=\"row\">
            <div style=\"padding: 0 15px\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                        <strong>Telefone:</strong> {$this->contact->phone}<br>
                        <strong>Email:</strong> {$this->contact->email}<br>
                        <strong>Organização:</strong> {$this->contact->organization}<br>
                        <strong>Endereço:</strong> Rua XXX (96040-001) Fragata - Pelotas<br>
                        <strong>Data de criação:</strong> <span class=\"datetime\">{$this->contact->created}</span><br>
                        <strong>Últimas alterações:</strong> <span class=\"datetime\">{$this->contact->modified}</span><br>
                        <a href=\"/contact/{$this->contact->id}/edit\" class=\"btn btn-raised btn-primary\">
                            <i class=\"material-icons\">&#xE254;</i> Editar
                        </a>
                        <a href=\"/contact/{$this->contact->id}/delete\" onclick=\"return confirm('Certeza que quer remover este contato?')\" class=\"btn btn-raised btn-danger\">
                            <i class=\"material-icons\">&#xE872;</i> Apagar
                        </a>
                    </div>
               </div>
            </div>
        </div>
    ";

    $this->include('Layout/base');
