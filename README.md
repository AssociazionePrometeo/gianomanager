# Giano

[![Build Status](https://travis-ci.org/AssociazionePrometeo/gianomanager.svg?branch=master)](https://travis-ci.org/AssociazionePrometeo/gianomanager)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AssociazionePrometeo/gianomanager/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AssociazionePrometeo/gianomanager/?branch=master)

Giano Manager is a web application to manage devices and reservations in shared spaces such as hackerspace, coworking, fablab.

**⚠️️ Under heavy development!**

### Local installation

Clone the repository.

```sh
git clone https://github.com/AssociazionePrometeo/gianomanager.git && cd gianomanager
```

Then install the dependencies. You will need composer (the PHP dependency manager), follow the instructions on https://getcomposer.org/ to install it, then run:

```sh
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
php artisan db:seed
```

You have to compile the assets (css, js, etc.)
```sh
npm install
npm run dev
```

Start the development server, and you’re done!

```sh
php artisan serve
```

***
Released under GPL 2.0 by Associazione Prometeo
