# CRUD de Usuários com Laravel e Guzzle

![Badge Laravel](https://img.shields.io/badge/Laravel-11-red) ![Badge PHP](https://img.shields.io/badge/PHP-8.1-blue) ![Badge JSON%20Server](https://img.shields.io/badge/JSON%20Server-0.17.3-green)

Este projeto é um CRUD de usuários desenvolvido em **Laravel 11** utilizando a biblioteca **Guzzle** para consumir uma API fake hospedada no **JSON Server API**. O sistema permite criar, listar, atualizar e deletar usuários.

## 📌 Funcionalidades

✅ Cadastro de usuários com os seguintes campos:
  - Nome
  - Data de nascimento
  - E-mail
  - CPF
  - Telefone
  - Endereço (Rua, CEP, Bairro, Número, Cidade, Estado)

✅ Listagem de usuários cadastrados
✅ Atualização de dados do usuário
✅ Exclusão de usuários do sistema

## 🛠️ Tecnologias Utilizadas

- **Laravel 11** - Framework PHP
- **Guzzle** - Cliente HTTP para interação com APIs
- **JSON Server** - API fake para armazenamento local
- **Bootstrap** - Para estilização e responsividade

## 🚀 Como Executar o Projeto

### 1️⃣ Clonar o Repositório
```sh
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2️⃣ Instalar Dependências do Laravel
```sh
composer install
```

### 3️⃣ Criar o Arquivo `.env`

Copie o arquivo de exemplo e configure conforme sua necessidade:
```sh
cp .env.example .env
```

Gere a chave do Laravel:
```sh
php artisan key:generate
```

### 4️⃣ Iniciar o JSON Server

Instale o JSON Server (caso não tenha):
```sh
npm install -g json-server
```

Inicie a API fake:
```sh
json-server --watch db.json --port 3000
```

### 5️⃣ Executar o Servidor Laravel
```sh
php artisan serve
```

Acesse o sistema em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 📝 Estrutura do Projeto
```
user-crud/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
│   ├── web.php
├── storage/
├── tests/
├── .env.example
├── composer.json
├── package.json
├── README.md
```

## 📚 Sobre a Disciplina

Projeto desenvolvido por **Marcela Bezerra de Medeiros**, para a disciplina **Tópicos Especiais em Desenvolvimento Web**, implementando um CRUD de usuário utilizando Laravel e Guzzle.


