## Teste para Desenvolvedor Backend Pleno ##
### Laravel version 8.0 ###

## Instalação ##
- Clone o repositório
- `cd backend`
- Execute o comando `composer install`

## Configurar e Iniciar ##
- `cp .env.example .env`
- php artisan sail:install
- execute o comando `./vendor/bin/sail up`
- binde executando o comando `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
- sail up -d
- Configurar o arquivo .env com as informações do banco de dados
- sail artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
- sail artisan jwt:secret
- sail artisan migrate
- sail artisan db:seed
- sail artisan key:generate

