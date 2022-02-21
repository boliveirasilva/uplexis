<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto upLexis - Quest Multimarcas

Esta aplicação recupera dados de uma loja virtual e armazena no banco de dados local.  
Abaixo encontra-se descrito os requisitos da aplicação, bem como todo o processo de instalação da mesma.

Para auxiliar na instalação, as instruções mais comumente utilizadas via linha de comando são expostas como sugestão de uso. 
Vale lembrar que cabe ao usuário adquirir um conhecimento mais aprofundado dos comandos envolvendo processos de terceiros e que há uma extensa documentação a respeito de todos esses comandos na internet. 

### Requisitos Mínimos
- PHP 8
- Laravel 9
- MySQL

### Instalação

- Clone o repositório e acesse a pasta do projeto
```bash
$ git clone https://github.com/boliveirasilva/uplexis.git uplexis
```
- Renomeie uma cópia do arquivo .env.example para .env, e configure os dados de conexão com o banco. Aproveite para conferir se a URL da loja Quest Multimarcas está correta;
```bash
$ cp .env.example .env
```

- Execute a instalação das dependências do projeto;
```bash
$ composer install
```
- Gere a chave de segurança da aplicação;
```bash
$ php artisan key:generate
````

- Crie o database do projeto;
```mysql
create database uplexis;
```

- Gere e popule as tabelas;
```bash
$ php artisan migrate --seed
```
- Se for necessário, ative o servidor web embutido do PHP para usar a aplicação (após a execução do comando, será informado o endereço de acesso à aplicação);
```bash
$ php artisan serve
```


### Login

Segue abaixo o usuário e senha padrões da aplicação.  

**Usuário:** admin@admin.com  
**Senha:** admin


### Utilização

O processo de utilização da aplicação é bastante simples.  

Imediatamente após realizar o login, o usuário será direcionado para a tela de listagem dos veículos cadastrados no banco.
Inicialmente a tela não terá registros, bastando que o usuário siga para a tela de captura, através do link no menu superior.

Na tela de captura basta informar o termo a ser pesquisado na loja virtual.
O processo de pesquisa retornará uma tabela informando quais veículos foram importados para o banco local.

_Obs:_ veículos previamente importados são ignorados.
