# ITF-eLogBook-UI

A simple Laravel UI Application for consuming the [ITF-Electronic-Logbook-Webservice](https://github.com/Wilson-Emmanuel/ITF-Electronic-Logbook-Webservice) RESTful API.

## Tools Used
- PHP 7.3
- Laravel Framework 8.42.1

## Setup Instruction
Before setting up this project, ensure that the [ITF-Electronic-Logbook-Webservice](https://github.com/Wilson-Emmanuel/ITF-Electronic-Logbook-Webservice) RESTful webservice is running at `localhost:9092` by following the instructions on the project.

* Ensure that `PHP` is properly installed
* Ensure that `composer` is properly installed

After cloning this project, follow the instructions below to get the application running
* run `composer install` on the project terminal
* change `.env.example` to `.env`
* Update the `.env` file with the following credentials
```
BASE_URL=localhost:9096
API_KEY='kdnonoeno#@2lsn'
```
* run `php artisan key:generate` to generate the application key
* run `php artisan serve` to start the application.

## Admin Login Details

```
username: admin@itf.com
password: admin1234
```
