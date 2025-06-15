
# 🚀 Portfólio Pessoal em Laravel 11

Este é um projeto de portfólio pessoal criado com Laravel 11, MySQL, Blade e Tailwind CSS. O sistema permite autenticação de usuários, gerenciamento de projetos com upload de imagem e link para o GitHub e exibição pública dos projetos.

---

## ✅ Tecnologias utilizadas
- PHP 8.2
- Laravel 11
- Laravel Breeze (autenticação)
- MySQL
- Blade (views)
- Tailwind CSS
- Vite
- NPM

---

## 📌 Passo a passo de desenvolvimento

### 1. Criar o projeto Laravel
```bash
composer create-project laravel/laravel portfolio
cd portfolio
```

### 2. Instalar Breeze (autenticação)
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run dev
```

### 3. Configurar o banco de dados (.env)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```
Criar o banco no phpMyAdmin e rodar as migrations:
```bash
php artisan migrate
```

### 4. Criar Model, Controller e Migration para Projects
```bash
php artisan make:model Project -m
php artisan make:controller ProjectController --resource
```

Migration:
```php
$table->id();
$table->string('title');
$table->text('description');
$table->string('image')->nullable();
$table->string('url')->nullable();
$table->string('github_url')->nullable();
$table->timestamps();
```

Rodar novamente:
```bash
php artisan migrate
```

### 5. Criar as rotas no web.php
```php
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

use App\Models\Project;
Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('home', compact('projects'));
});
```

### 6. Implementar os métodos do ProjectController
Incluindo store, update, destroy, show (CRUD completo), com upload de imagem e link para GitHub e URL externa.

### 7. Criar as views Blade
- home.blade.php (página pública)
- projects/index.blade.php (listar projetos)
- projects/create.blade.php (criar projeto)
- projects/edit.blade.php (editar projeto)
- projects/show.blade.php (detalhes do projeto)

### 8. Ajustes adicionais
- Criar link para voltar à home a partir da área administrativa
- Adicionar botão “Acessar Projeto” e “Ver Repositório” na home e na página de detalhes
- Limitar tamanho das imagens na área administrativa
- Limpar cache com:
```bash
php artisan view:clear
```

### 9. Melhorias na Dashboard
Personalizamos a dashboard para exibir links úteis para o admin (Cadastro, Listagem e Voltar à Home).

### 10. Build de Produção
Antes do deploy, rodar:
```bash
npm run build
```

### 11. Publicar no GitHub
Etapas básicas:
```bash
git init
git add .
git commit -m "Projeto Portfólio Laravel Finalizado"
git branch -M main
git remote add origin https://github.com/SEU_USUARIO/portfolio-laravel.git
git push -u origin main
```

---

## ✅ Status final do projeto

✅ CRUD completo  
✅ Upload de imagens  
✅ Área pública e administrativa  
✅ Links externos (URL do projeto e GitHub)  
✅ Pronto para apresentação

---

**Desenvolvido por:** Jeferson Gabriel

---
