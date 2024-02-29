# Coin Exchange API

Aplicação teste na forma de um Sistema de Compra de Moedas, construída em [Laravel 10](https://laravel.com/docs/10.x).

Esta API pode ser usada em conjunto com o [frontend que construí em Vue.js](https://github.com/filipedanielski/coin-exchange).

Utilizei os seguintes pacotes do ecossistema Laravel:

* Laravel Fortify e Sanctum para autenticação.
* Laravel Pint para correções de estilo no código.
* [Pest](https://pestphp.com/) como framework de testes.

E a API externa utilizada para buscar as cotações de moedas foi a [awesomeapi](https://docs.awesomeapi.com.br/api-de-moedas).

## Instruções de instalação

```
git clone https://github.com/filipedanielski/coin-exchange-api.git

cd coin-exchange-api

cp .env.example .env
```

Coloque as credenciais de database no .env. Eu recomendo DB_USERNAME=sail e DB_PASSWORD=password para o desenvolvimento local.

```
docker run --rm --interactive --tty -v $(pwd):/app composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan cache:clear

./vendor/bin/sail artisan config:clear

./vendor/bin/sail artisan migrate
```

Para rodar os testes:

```
./vendor/bin/sail test
```
