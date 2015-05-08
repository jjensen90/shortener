# Shortener

Shortener is a small app written with [Laravel](http://laravel.com/) which provides a URL shortening service (similar to bit.ly, etc).

Requirements
============
- PHP >= 5.4
- Mcrypt PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- [Composer](https://getcomposer.org/doc/00-intro.md)

Installation
============
- Clone repository into web accessible directory, with `public` directory as document root
- Run `composer install` in root app directory
- Copy `.env.example` to `.env`, replace database credentials
- Run `php artisan migrate` to set up database schema
- Edit `config/hashids.php` with desired hashing settings
- Optionally configure [pretty URLs](http://laravel.com/docs/5.0#pretty-urls)

Installation With Homestead
============
Optionally, you can run [Laravel Homestead](http://laravel.com/docs/5.0/homestead) which provides all required dependencies, and clone Shortener as an app inside Homestead.

Contributing
============
Feel free to open any pull requests with any improvements.

All URL shortening code under the namespace `Shortener` and located in `app/Shortener`
