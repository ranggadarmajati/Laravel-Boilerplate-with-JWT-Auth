# Laravel Boilerplate with JWTAuth

Laravel Boilerplate with JWTAuth is a Laravel Framework for Restfull API include function Register, Authenticate, Activated Email, and Reset Password.

## Installation

Use CMD or Terminal and clone this repo:

1. Clone or Download This Repo:
```bash
$ git clone https://github.com/ranggadarmajati/Laravel-Boilerplate-with-JWT-Auth
```

2. After Cloning this Repo, you must to install package depencies use composer on terminal

```composer_install
$ composer install
```
3. Publish the Config JWT-Auth:

```python
$ php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
4. Create Your Database on mysql or pgsql
5. Create your Environment file, copy .env.example and edit the parts listed below, after that save as .env
```python
ACTIVATIONS_URL="http://localhost:8000/api/v1/eks/activation/"
TITLE_EMAIL=verification
EMAIL_SUPPORT=support@apps.com
PROJECT_NAME=Apps

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username_database
DB_PASSWORD=your_password_database

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=your_host_email_server_like_smtp.gmail.com
MAIL_PORT=your_mail_port
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
```

6. Open your CMD or terminal for migrate Schema database and Seed your dummy data for role user: 
```code
$ php artisan migrate

$ php artisan db:seed
```
7.Check Routes
```code
$ php artisan route:list

```
8. if the route appears, run the application 
```code
$ php artisan serve

```
## Usage
To try this application you can use API Tester such as Post Man or Insomnia

* Register

![alt text](https://i.ibb.co/NZpL8nj/Screenshot-from-2019-05-11-21-49-22.png)

* Login / Authtenticate

![alt text](https://i.ibb.co/h13rHpd/Screenshot-from-2019-05-11-21-54-53.png)

* Reset Password

![alt text](https://i.ibb.co/2Zmyvky/Screenshot-from-2019-05-11-21-57-15.png)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
