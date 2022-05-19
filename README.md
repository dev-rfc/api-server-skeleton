# therfc/api-server-skeleton
This repository is a skeleton application for developing powerful APIs using PHP 8.1.

## Usage

```shell
git clone https://github.com/dev-rfc/api-server-skeleton
docker-compose up
docker-compose run --rm phpfpm composer install
code .
```

It's highly recommended to install the suggested extensions on project workspace.

## Features

- Containerized development environment with **docker-compose**
- Nginx with php 8.1 (fpm) and MySQL (using Bitnami images)
- composer, phpunit, phpstan and xdebug already installed and configured
- Minimal and clean environment using Slim Framework 4, PHP-DI, and Symfony/Console
