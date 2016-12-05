# Agenda

Luan Einhardt (<ldseinhardt@gmail.com>)

Disponível em: [http://agenda.moodleanalytics.org](http://agenda.moodleanalytics.org)

## Requisitos

### Backend

* [PHP 7](http://php.net)

```bash
# apt-get install php7.0 php7.0-mysql
```

* [MySQL](http://mysql.com)

```bash
# apt-get install mysql-server
```

### Frontend

* [NPM](http://www.npmjs.com)

```bash
# apt-get install nodejs npm
```

* [BOWER](http://bower.io)

```bash
# npm install --global bower
```

## Criar o banco de dados

```bash
$ mysql -u root -p < docs/database/agenda.sql
```

Nota: root deve ser substituído pelo seu usuário.

## Configurar acesso ao banco de dados

Modifique o arquivo `app/app.php` na linha 25:

```php
$app->set('database', [
  'host' => 'localhost',
  'username' => 'root',
  'password' => 'test123',
  'database' => 'agenda',
  'charset' => 'utf8'
]);
```
## Instalar os components do frontend

```bash
$ bower install
```

Nota: o bower irá instalar todas as dependências em `bower_components`.

## Executar com o servidor do próprio php

```bash
$ ./run
```

ou

```bash
$ php -S localhost:8080 public/index.php
```

## Verificar sua versão do php

```bash
$ php -v
```

## Testado em

- Sistema Operacional: Linux (Ubuntu 14:04 e 16:04)
- Servidor: Apache2
- Navegador: Google Chrome

Licença: [MIT](LICENSE)
