# Escola Digital
Esse é um projeto simples feito em Laravel com inertiaJs, 
com o objetivo de realizar simples CRUD de User e Cursos.


## Instalação
Para instalar o projeto, siga os passos abaixo:

1. Clone o repositório
```bash
git clone https://github.com/Dankdev021/MVC_laravel_vue_inertiajs.git
```
2. Acesse a pasta do projeto
```bash
cd MVC_laravel_vue_inertiajs
```
Após fazer o clone do projeto, você pode começar a configurar o seu ambiente de desenvolvimento:

3. Após acessar a pasta do projeto, você deve rodar os comandos abaixo para instalar as dependências do projeto:
```bash
composer update
```
Após o carregamento das dependências você precisará rodar outro comando para instalar as depêndencias do inertiaJs
```bash
npm install
```
Pronto, após a instalação das dependências você precisa configurar o seu arquivo .env, para isso você pode copiar o arquivo .env.example e renomear para .env 
e rodar o comando abaixo para gerar a chave do projeto:
```bash
php artisan key:generate
```
Após isso, configure o seu .env para conectar o banco de sua preferência, e rode as migrations com o comando:
```bash
php artisan migrate
```

Pronto, agora seu ambiente já está configurado para ser utilizado.


## Utilização

Rode os comandos para subir o servidor local:
```bash
php artisan serve
```
e rode o npm:
```bash
npm run dev
```
Após rodar esses comandos você pode acessar 
o projeto em seu navegador no endereço http://localhost:8000. Você será redirecionado para a tela principal de login.


Como você não possuirá um usuário cadastrado, você deve clicar em "Register" e criar um usuário, 
após isso você será redirecionado para a tela de listagem de cursos, nela você pode criar e editar cursos. 
