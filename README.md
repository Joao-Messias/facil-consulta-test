## Teste para Desenvolvedor Backend Pleno ##
### Laravel version 8.0 ###

## Instalação ##
- Clone o repositório
- `cd backend`
- Execute o comando `composer install`

## Start ##
- sail up -d
- sail artisan migrate
- sail artisan db:seed

### -------- ###
- sail artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
- sail artisan jwt:secret

