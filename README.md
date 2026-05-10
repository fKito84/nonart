
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



<p align="center">
  <h1 align="center">NONART</h1>
  <p align="center"><strong>Plataforma d'art, tallers i gestió multidispositiu</strong></p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20.svg?style=flat&logo=laravel" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4.svg?style=flat&logo=php" alt="PHP 8.2">
  <img src="https://img.shields.io/badge/NativePHP-Mobile-4F5B93.svg?style=flat" alt="NativePHP">
  <img src="https://img.shields.io/badge/MySQL-Web-4479A1.svg?style=flat&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/SQLite-Android-003B57.svg?style=flat&logo=sqlite" alt="SQLite">
</p>

## 🎨 Sobre NONART

NONART és una plataforma ecommerce multiplataforma dissenyada per promocionar l'obra artística de l'artista "Nona" i gestionar els seus tallers d'Art & Wine. L'aplicació ofereix tres serveis principals:
- **Venda d'obres d'art originals** (pintures i escultures).
- **Reserva de tallers Art & Wine** per a grups (pintura, vi i aperitius).
- **Gestió interna** d'estoc, reserves, vendes i excepcions de calendari.

Aquest projecte correspon a l'**MP13 - Projecte de Desenvolupament (CFGS DAM)** del curs 2025-2026.

---

## 🏗️ Arquitectura del Sistema (3 Capes)

El projecte utilitza un nucli centralitzat en Laravel que serveix a tres entorns diferents:

1. **Capa Web:** Accés via navegador clàssic. Utilitza vistes Blade, Tailwind CSS, controladors web i base de dades **MySQL** en un servidor remot.
2. **Capa Mòbil (NativePHP):** Aplicació nativa (APK per a Android / .exe / .app) generada a partir del mateix codi base. Utilitza una base de dades **SQLite offline** integrada per evitar problemes de connexió externa.
3. **Capa API REST:** Endpoints en format JSON protegits amb **Laravel Sanctum** per a possibles integracions externes o apps natives pures (Kotlin/Flutter).

---

## 🚀 Versió 3 (V3) - NativePHP i SQLite Offline

A la Versió 3 s'ha integrat **NativePHP** per generar l'aplicació per a Android i s'han implementat solucions estructurals importants:

* **Arquitectura de Base de Dades Dividida:** MySQL per a la Web/API i SQLite integrat per a l'App Mòbil (Offline).
* **Persistència de Dades:** S'ha modificat el cicle d'arrencada a `AppServiceProvider` i `app.php` per comprovar l'existència de la base de dades SQLite, evitant el seu esborrat en actualitzar l'APK.
* **Migració Segura:** S'ha creat la comanda personalitzada `MigrateSqlite.php` (`php artisan sqlite:migrate`) per generar l'esquema local sense destruir dades prèvies de l'usuari durant la instal·lació de l'aplicació.
* **Optimització:** Mida d'imatges reduïda per minimitzar el pes de l'APK i càrrega més ràpida.

---

## 🗄️ Model de Dades i UML

La lògica de negoci inclou automatitzacions com:
* **Confirmació automàtica:** Els tallers passen a "confirmats" en arribar a 8 participants.
* **Alertes d'estoc:** Enviament d'email (via Mailtrap) quan el material baixa de 20 unitats.
* **Estoc intel·ligent:** Diferenciació entre material consumible (pintura) i reutilitzable (cavallets).
* **Disponibilitat única:** Les obres venudes es bloquegen automàticament (`disponible = false`).

### Diagrama Entitat-Relació

```mermaid
erDiagram
    USERS ||--o{ VENDAS : "realitza"
    USERS ||--o{ RESERVA_TALLERES : "fa reserva"
    VENDAS ||--|{ DETALLES_VENDA : "inclou"
    OBRAS ||--o{ DETALLES_VENDA : "és venuda en"
    TALLERS ||--o{ DETALLES_VENDA : "és comprat a"
    TALLERS ||--o{ RESERVA_TALLERES : "té assistents en"
    STOCKS ||--o{ RESERVAS_STOCKS : "es consumeix a"
    RESERVA_TALLERES ||--o{ RESERVAS_STOCKS : "utilitza material de"

    USERS {
        bigint id PK
        string name
        string email
        string password
        enum role "admin, client"
    }
    OBRAS {
        bigint id PK
        string titulo
        decimal precio
        boolean disponible
    }
    TALLERS {
        bigint id PK
        string nom
        decimal preu
        boolean actiu
    }
    VENDAS {
        bigint id PK
        decimal total_comanda
        string estat
    }
    STOCKS {
        bigint id PK
        string nom_material
        int quantitat
        boolean reutilitzable
    }
    RESERVA_TALLERES {
        bigint id PK
        date data
        string estat
    }

🛠️ Guia d'Instal·lació (Entorn Web / Servidor)
Requisits
PHP 8.2+ (Extensions: pdo_mysql, pdo_sqlite, mbstring, openssl, tokenizer)

Composer i Node.js 18+ (npm)

MySQL 8+ (Entorn web)

Passos 

# 1. Clonar el repositori
git clone [https://github.com/fKito84/nonart.git](https://github.com/fKito84/nonart.git)
cd nonart

# 2. Instal·lar dependències backend i frontend
composer install
npm install

# 3. Configurar l'entorn
cp .env.example .env
# Configurar DB_DATABASE, DB_USERNAME, DB_PASSWORD al fitxer .env

# 4. Generar la clau i preparar base de dades (MySQL)
php artisan key:generate
php artisan migrate:fresh --seed

# 5. Compilar assets i aixecar servidor web
npm run build
php artisan serve

📱 Execució NativePHP (Entorn Mòbil / Escriptori)
Per generar o testear la versió empaquetada:

# Instal·lar el mòdul NativePHP (si no està present)
php artisan native:install

# Executar la migració segura per a SQLite (NOU a la V3)
php artisan sqlite:migrate

# Executar l'app en mode desenvolupament (escriptori)
php artisan native:serve

# Compilar l'app per a distribució (generar executable/APK)
php artisan native:build

🔌 API REST Endpoints PrincipalsMètodeEndpointDescripcióAutenticacióGET/api/obrasLlistat i detall d'obresPúblicGET/api/talleresLlistat de tallers i excepcionsPúblicPOST/api/loginLogin i generació de token SanctumPúblicGET/api/carritoVeure el carretóAuth (Token)POST/api/carrito/pagarProcessar pagament i validar estocAuth (Token)POST/api/admin/obrasCrear/Modificar/Esborrar obresAdmin (Token)

Mètode,Endpoint,Descripció,Autenticació
GET,/api/obras,Llistat i detall d'obres,Públic
GET,/api/talleres,Llistat de tallers i excepcions,Públic
POST,/api/login,Login i generació de token Sanctum,Públic
GET,/api/carrito,Veure el carretó,Auth (Token)
POST,/api/carrito/pagar,Processar pagament i validar estoc,Auth (Token)
POST,/api/admin/obras,Crear/Modificar/Esborrar obres,Admin (Token)




👨‍💻 Autor

Francisco Muñoz González

CFGS Desenvolupament d'Aplicacions Multiplataforma (DAM)

Escola PIA Mataró

GitHub: fKito84
