# Configuração do projeto!

Este projeto foi feito para ser utilizado com docker, usando o https://github.com/fireworkweb/fwd como um facilitador. Necessario seguir os passos de instalação do FWD.

Porém no caso de não usar docker. Pode ser rodado localmente também.

# Requerimentos

PHP >= 7.2.5

MYSQL

Para mais duvidas: https://laravel.com/docs/7.x/installation

# Commandos Para Rodar o Projeto

Clonar o repositorio

## Instale as dependencias do projeto
```bash
composer install
```

## Inicie o Projeto
```bash
php artisan serve
```

## Rode as Migrations e Seeders do banco
```bash
php artisan migrate:fresh --seed
```

## O usuario pré-configurado é
email: contato@otaku-tech.com

senha: qwe123

## O projeto deve estar rodando em
http://localhost/
