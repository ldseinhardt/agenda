<?php
    $this->content = "
        <h1>Adicionar contato</h1>

        <div class=\"row\">
            <div style=\"padding: 0 15px\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-body\">

                        <form action=\"/contact/add\" method=\"POST\" class=\"form-horizontal\">
                          <fieldset>
                            <legend>Cadastro</legend>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"first_name\" class=\"col-md-2 control-label\">Nome</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"first_name\" name=\"first_name\" placeholder=\"Nome\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"last_name\" class=\"col-md-2 control-label\">Sobrenome</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"last_name\" name=\"last_name\" placeholder=\"Sobrenome\">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"address\" class=\"col-md-2 control-label\">Endereço</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"address\" name=\"address\" placeholder=\"Endereço\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"zip_code\" class=\"col-md-2 control-label\">CEP</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"zip_code\" name=\"zip_code\" placeholder=\"CEP\">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"district\" class=\"col-md-2 control-label\">Bairro</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"district\" name=\"district\" placeholder=\"Bairro\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"city\" class=\"col-md-2 control-label\">Cidade</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"city\" name=\"city\" placeholder=\"Cidade\">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"phone_1\" class=\"col-md-2 control-label\">Telefone</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"tel\" class=\"form-control\" id=\"phone_1\" name=\"phone[]\" placeholder=\"Telefone\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                  <div class=\"radio radio-primary\">
                                    <label>
                                      <input type=\"radio\" name=\"primary_phone_id\" value=\"1\" checked=\"\"> Definir como principal
                                    </label>
                                  </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"phone_2\" class=\"col-md-2 control-label\">Telefone</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"tel\" class=\"form-control\" id=\"phone_2\" name=\"phone[]\" placeholder=\"Telefone\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                  <div class=\"radio radio-primary\">
                                    <label>
                                      <input type=\"radio\" name=\"primary_phone_id\" value=\"2\"> Definir como principal
                                    </label>
                                  </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"email_1\" class=\"col-md-2 control-label\">Email</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"email_1\" name=\"email[]\" placeholder=\"Email\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                  <div class=\"radio radio-primary\">
                                    <label>
                                      <input type=\"radio\" name=\"primary_email_id\" value=\"1\" checked=\"\"> Definir como principal
                                    </label>
                                  </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                      <label for=\"email_2\" class=\"col-md-2 control-label\">Email</label>
                                      <div class=\"col-md-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"email_2\" name=\"email[]\" placeholder=\"Email\">
                                      </div>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                  <div class=\"radio radio-primary\">
                                    <label>
                                      <input type=\"radio\" name=\"primary_email_id\" value=\"2\"> Definir como principal
                                    </label>
                                  </div>
                                </div>
                            </div>

                            <div class=\"form-group\">
                              <label for=\"organization\" class=\"col-md-1 control-label\">Organização</label>
                              <div class=\"col-md-11\">
                                <input type=\"text\" class=\"form-control\" id=\"organization\" name=\"organization\" placeholder=\"Informe o nome ou telefone da organização\">
                              </div>
                            </div>

                            <div class=\"form-group\">
                              <div class=\"col-md-11 col-md-offset-1\">
                                <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                                <a href=\"/contact\" class=\"btn btn-default\">Cancelar</a>
                              </div>
                            </div>
                          </fieldset>
                        </form>

                    </div>
               </div>
            </div>
        </div>
    ";

    $this->include('Layout/base');
