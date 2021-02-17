# laravelbreezeblog

Simple Multi-user blog based off Laravel [Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze).  The package includes:
- Multiple user post support
- Full CRUD (create, read, update, delete) support for user posts.
- Automated population of the posts table through the Google News Feed RSS, via the SimplePie wrapper by [Will Vincent](https://github.com/willvincent)
- Front end that shows a random ordering of the posts and view posts.
- Email verification if enabled.

#Installation
You should first have the lastest version of composer and npm installed, along with your favorite database server.  I used MySQL for development, but the code should run without issue on other database engines.

- First clone the project to your computer.  Switch to your clone directory.
- Run ```composer install```.
- Run ```npm install```.
- Create a new .env file ```cp .env.example .env```.
- Create a new SQL database and fill out the required database parameters in .env
- Run ```php artisan key:generate```.
- Run ```php artisan migrate```.
- Finally run ```php artisan serve``` to start up a local development server.
- Optionally you can setup the laravel smtp config to enable email verification.  Out of the box, mailhog is the default.

#Discussion
Breeze uses Tailwind.css, Blade templates, and [Laravel 8 Authentication](https://laravel.com/docs/8.x/authentication) with very little Javascript.

