# Sistema de Gerenciamento de Usuários e Permissões

Projeto desenvolvido como desafio técnico para a vaga de **Desenvolvedor de Sistemas Júnior  da **Santa Casa de Misericórdia de Porto Alegre**.

O objetivo da aplicação é centralizar o gerenciamento de usuários e controlar o acesso aos módulos do sistema através de perfis e permissões.

---

# Tecnologias utilizadas

- PHP 8.3
- Laravel 13
- MySQL 8
- Laravel Breeze
- Spatie Laravel Permission
- Tailwind CSS
- Vite

---

# Funcionalidades

## Autenticação

- Login
- Logout

---

## Usuários

- Listagem
- Cadastro
- Edição
- Exclusão

Cada usuário possui:

- Nome
- E-mail
- Senha criptografada
- Perfil
- Permissões

---

## Perfis

O sistema possui dois perfis:

### Administrador

Pode acessar:

- Usuários
- Permissões

Além disso possui acesso total aos módulos.

### Colaborador

Possui acesso apenas aos módulos liberados através das permissões.

---

## Permissões

Permissões disponíveis:

- Setores Hospitalares
- Especialidades Médicas
- Equipamentos
- Unidades Assistenciais

O controle é realizado tanto na interface quanto nas rotas da aplicação.

---

## Controle de acesso

O projeto utiliza o pacote **Spatie Laravel Permission** para realizar:

- Roles
- Permissions
- Middleware de autorização

O acesso direto às rotas também é protegido.

---

# Banco de Dados

O projeto utiliza:

- Migrations
- Seeders

Ao executar os seeders será criado automaticamente um usuário administrador.

---

# Credenciais

Administrador padrão

E-mail

```
admin@santacasa.org.br
```

Senha

```
password
```

---

# Instalação

Clone o repositório

```bash
git clone https://github.com/ThiagoZambelli/desafio-santa-casa.git
```

Entre na pasta

```bash
cd desafio-santa-casa
```

Instale as dependências do PHP

```bash
composer install
```

Instale as dependências do Node

```bash
npm install
```

Copie o arquivo de ambiente

```bash
cp .env.example .env
```

Configure o banco de dados no arquivo `.env`.

Gere a chave da aplicação

```bash
php artisan key:generate
```

Execute as migrations e seeders

```bash
php artisan migrate:fresh --seed
```

Compile os assets

```bash
npm run build
```

Execute a aplicação

```bash
php artisan serve
```

---

# Estrutura do projeto

```
app/
├── Http/
├── Models/
├── Providers/

database/
├── migrations/
├── seeders/

resources/
├── views/

routes/
└── web.php
```

---


# Autor

Thiago Zambelli

Projeto desenvolvido exclusivamente para avaliação técnica da Santa Casa de Misericórdia de Porto Alegre.