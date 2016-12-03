<?php
    $this->content = '<h1>Meus contatos</h1>';

    $this->content .= "
        <div class=\"row\">
            <div style=\"padding: 0 15px\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">
                        <div class=\"list-group\">
    ";

    foreach ($this->contacts as $contact) {
        $info = '';
        
        if ($contact->phone) {
            $info = $contact->phone;
        } else if ($contact->email) {
            $info = $contact->email;
        } else if ($contact->organization) {
            $info = $contact->organization;
        }

        $this->content .= "
            <div class=\"list-group-item\">
              <div class=\"row-action-primary\">
                <i class=\"material-icons\">&#xE7FD;</i>
              </div>
              <div class=\"row-content\">
                <div class=\"action-secondary\">
                    <a href=\"/contact/{$contact->id}/edit\">
                        <i class=\"material-icons\" style=\"color: #009688\">&#xE254;</i>
                    </a>
                    <a href=\"/contact/{$contact->id}/delete\" onclick=\"return confirm('Certeza que quer remover este contato?')\">
                        <i class=\"material-icons\" style=\"color: #fe6363\">&#xE872;</i>
                    </a>
                </div>
                <h4 class=\"list-group-item-heading\" style=\"text-overflow: clip; overflow: hidden; white-space: nowrap\">
                    <a href=\"/contact/{$contact->id}\" title=\"{$contact->first_name} {$contact->last_name}\">
                        {$contact->first_name} {$contact->last_name}
                    </a>
                </h4>
                <p class=\"list-group-item-text\">{$info}</p>
              </div>
            </div>
            <div class=\"list-group-separator\"></div>
        ";
    }

    $this->content .= "
                        </div>
                    </div>
               </div>
            </div>
        </div>
    ";

    $this->include('Layout/base');
