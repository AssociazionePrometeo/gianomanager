# Giano

[![Build Status](https://travis-ci.org/AssociazionePrometeo/gianomanager.svg?branch=master)](https://travis-ci.org/AssociazionePrometeo/gianomanager)

Giano Manager is a web application to manage devices and reservations in shared spaces such as hackerspace, coworking, fablab.

**⚠️️ Under heavy development!**

### Local installation

Clone the repository and install the dependencies.
You will need composer (the PHP dependency manager), follow the instructions on https://getcomposer.org/ to install it.

```sh
git clone https://github.com/AssociazionePrometeo/gianomanager.git
cd gianomanager
composer install
```

Copy the `.env.example` file into `.env` and edit the database configuration:

```sh
cp .env.example .env
vi .env
```

Generate the app key and create the database schema:

```sh
php artisan key:generate
php artisan migrate
```

Start the development server, and you’re done!

```sh
php artisan serve
```

***
Released under GPL 2.0 by Associazione Prometeo
