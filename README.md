<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

Projeto Agendamento de serviços em um Salao de Beleza

Feito com a Linguagem PHP e o framework web Laravel

Instruções para Execução

1 - Possuir o servidor Apache  e o MySQL instalados localmente, além do composer para as dependências. Para facilitar pode ser utilizado o Xampp ou Wamp que possui Mysql e Apache integrados.

2 - executar os seguintes comandos no diretório do projeto:

composer install - para instalar todas as dependências 

php artisan key:generate - para gerar a chave de acesso (no caso da linha APP_KEY= no arquivo .env esteja vazia, caso contrario nao é necessario)

php artisan serve - para subir o servidor local 

3 - Executar o arquivo SQL salao_de_beleza.sql (na raiz da aplicação) no banco de dados MySQL para criar as tabelas;

nome do banco de dados: salao_de_beleza

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
