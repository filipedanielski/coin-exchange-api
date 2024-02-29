# Coin Exchange API

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
