# 🚀 Portfólio Pessoal em Laravel 12

Projeto de portfólio pessoal. Inclui autenticação, CRUD com upload de imagem, link externo e GitHub.

---

## 🚀 Tecnologias Utilizadas

- Laravel 12
- PHP 8.2
- Tailwind CSS
- Blade (sistema de templates do Laravel)
- Laravel Breeze (autenticação)
- MySQL ou SQLite
- Vite (build frontend)

---

## 🎯 Objetivo

Desenvolver um portfólio pessoal em **Laravel** com autenticação segura e painel administrativo para gerenciar projetos, permitindo cadastro, edição, exclusão e exibição pública, com layout moderno em **tema escuro** e suporte a upload de imagens e links externos.

---

## ⚙️ Instalação e Execução

1. Clone o repositório:

```bash
git clone https://github.com/JefersonGabriel1208/Portfolio4.git
cd Portfolio4
```

2. Instale as dependências PHP e JavaScript:

```bash
composer install
npm install
```

3. Copie o arquivo `.env`:

```bash
cp .env.example .env
```

4. Gere a chave da aplicação:

```bash
php artisan key:generate
```

5. Configure o banco de dados no `.env` e execute as migrações:

```bash
php artisan migrate
```

6. Rode o servidor e o build frontend:

```bash
php artisan serve
npm run dev
```

7. Acesse no navegador: `http://localhost:8000`

---

## 📸 Telas do Projeto


### Página Inicial
![Home](prints/home.png)

### Página de Detalhes (Show)
![Show](prints/show.png)

### Listagem de Projetos (Admin)
![Admin List](prints/admin-list.png)

### Cadastro de Projeto
![Create](prints/create.png)

### Dashboard após Login
![Dashboard](prints/dashboard.png)
---

---

## 📧 Configuração de Envio de E-mails

No arquivo `.env`, configure:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seuemail@gmail.com
MAIL_PASSWORD=suasenhasecreta
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seuemail@gmail.com
MAIL_FROM_NAME="Seu Nome"
```

Lembre-se de ativar "acesso a apps menos seguros" no Gmail ou usar uma senha de app.

## ##
