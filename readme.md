## 0ez. Laravel Lightweight Blogging CMS

[![Built on Laravel 5.1](https://img.shields.io/badge/laravel-5.1-orange.svg?style=flat)](http://laravel.com)
[![TravisCI](https://img.shields.io/travis/gaaarfild/0ez.svg?style=flat)](https://travis-ci.org/gaaarfild/0ez)
[![StyleCI](https://styleci.io/repos/39617364/shield)](https://styleci.io/repos/39617364)

Wordpress is old and slow? Too much functions for easy stuff? 

Try 0ez. It's soo ez!

## Installation

Currently, 0ez is under development. There are no Installer. You have to use [Composer](https://getcomposer.org/), to install 0ez.

**1.** Clone or download repository to your web-folder.

**2.** In the root directory, type:

``` bash
composer install
```

**3.** Then, you have to set up your DB.

**4.** Rename `.env.example` file to `.env` in root folder.

**5.** Open it with your favorite text editor and set up your database credentials.


Database host

```
    DB_HOST=localhost
```

Database name

```
    DB_DATABASE=0ez
```

Database user

```
    DB_USERNAME=0ez
```

Database password

```
    DB_PASSWORD=123456
```

**6.** In command line, type 

``` bash
php artisan migrate
```


**7.** Point your webserver (Apache ot NGINX) to `/public` folder.


Done!

Now, you can login to administrative area. 

### Default Authorization Credentials

http://your.host/root

**Login:** 0ez@example.com

**Password:** 123456

## Demo 

http://demo.0ez.ru/root

**Login:** 0ez@example.com

**Password:** 123456

## Contributing

Contributions are highly appreciated! Send your pull requests to `master` branch.


### License

0ez is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
