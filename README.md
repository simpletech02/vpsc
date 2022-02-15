### Deployment

The Laravel framework has a few system requirements. You should ensure that your web server has the following minimum PHP version and extensions:

*  PHP >= 7.3
*  BCMath PHP Extension
*  Ctype PHP Extension
*  Fileinfo PHP Extension
*  JSON PHP Extension
*  Mbstring PHP Extension
*  OpenSSL PHP Extension
*  PDO PHP Extension
*  Tokenizer PHP Extension
*  XML PHP Extension

Clone full repository in root Web-server folder and make sure that your Web-server configuration points only to public folder.

### .env file
Laravel comes with a file called .env.example, with all typical configuration values.

1. Copy that example file as our main .env file with this command:
`cp .env.example .env`
2. Generate app key with this command: `php artisan key:generate`
3. Edit that new .env file. You can change a lot of variables, but the main ones are these:

	```
	APP_URL=

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=laravel
	DB_USERNAME=root
	DB_PASSWORD=
	```

### Laravel packages
Make sure composer ([https://getcomposer.org/][composer]) is installed on server
To install all dependencies run `composer install`

### Database
Make sure your database is empty and run migrations: `php artisan migrate`

[composer]: https://getcomposer.org/

### Admin
To create admin user run: `php artisan user:create`. Set name, e-mail and password. Open url: `/login` 

### For production
Edit .env file:
```
APP_ENV=production
APP_DEBUG=false
```
