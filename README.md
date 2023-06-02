# Biblioteca

> Requisitos para utilizar:

1. Composer;
2. PHP 8.1

## Configuração
Crie um arquivo .env a partir do arquivo .env.example.
configure a conexão com o banco.
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=laravel  
DB_USERNAME=root  
DB_PASSWORD=

## instalar dependências

    composer install
## Gerar key

    php artisan key:generate

## Criar tabelas e Seeder
para criar as tabelas basta rodar o comando:

    php artisan migrate
    php artisan db:seed

## Rodar servidor

    php artisan serve

## Rotas

### Usuários
POST: localhost:porta/api/users

    {
	    "nome": "nome",
	    "email": "email"
    }
GET: localhost:porta/api/users
GET: localhost:porta/api/users/{id}
PUT:localhost:porta/api/users/{id}

    {
	    "nome": "nome",
	    "email": "email"
    }
DELETE: localhost:porta/api/users/{id}

## Livros
POST: localhost:porta/api/books

     {
	    "nome": "nome",
	    "autor": "autor",
	    "situacao": "situacao",
	    "genero_id": "genero_id"
    }

> situação:
> 1 = Disponivel,
> 2 = Emprestado
>
>
> genero_id:
1	= Ficção
2	= Romance
3	= Fantasia
4	= Terror
5	= Aventura

GET: localhost:porta/api/books
GET: localhost:porta/api/books/{id}
PUT: localhost:porta/api/books/{id}

     {
	    "nome": "nome",
	    "autor": "autor",
	    "situacao": "situacao",
	    "genero_id": "genero_id"
    }
DELETE: localhost:porta/api/books/{id}

## Emprestar
POST: localhost:porta/api/loans

    {
	    "livro_id": "livro_id",
	    "usuario_id":  "usuario_id",
	    "data_devolucao": "data_devolucao"
    }
PUT: localhost:porta/api/loans/devolution

    {
	    "livro_id": "livro_id",
	    "usuario_id":  "usuario_id",
	    "data_devolucao": "data_devolucao",
	    "situacao": "situacao"
    }

> data_devolucao: opcional;
> situação:
>1 = emprestado
>2 = Devolvido
>3 = Atrasado

PUT: localhost:porta/api/loans/delayed

    {
	    "livro_id": "livro_id",
	    "usuario_id":  "usuario_id",
	    "data_devolucao": "data_devolucao",
	    "situacao": "situacao"
    }

> data_devolucao: opcional;
> situação:
>3 = Atrasado
