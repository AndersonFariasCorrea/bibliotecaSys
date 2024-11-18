<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

## Languages
- [English](README.md)
- [Português Brasil](README.pt.md)

## Requirements
- Composer
- PHP >= 8.1
- Mysql 8.x
- Debian based system (recommended)

## Requirements
- __Composer__
- __PHP >= 8.1__
- __Debian based system (recommended)__

_This project was developed on a Debian-based operating system (OS) (such as Ubuntu or Linux Mint), so some file paths and configurations may differ if you're using a different OS (e.g., macOS or Windows) and may cause a **RUNTIME ERROR**._

## Tip
If you have multiple php version installed, you may append the version you want to use, like php8.1 ... (be sure to match version requirement)

# Setting up the project
## 1. Install the dependencies
After the download or git clone, with CLI (command line interface -> terminal) on root directory run `composer install`

## 2. Set database
### 1. Manually create the database biblioteca
Here you may run the process as you want, CLI, o a interface you like such as PhpMyAdmin
### 2. Run the migrate scripts
On CLI (command line interface -> terminal) run `php8.1 artisan migrate`

## 3. Run the project
### 1. With php artisan
On root directory run `php artisan serve --port=8000`

(Optional) `--port=portNum`, this parameter allows to run the project on a specific port

(Optional) `--host=127.0.0.1`, this parameter allow you to set the host ip, useful in case where you use wls or want to make your application accessble from others machines in your network

### 2. With php cli
Go to `public/` diretory and run php(optional: version) -S hostNameOrIp:port
example `php8.1 -S localhost:8000`

### 3. With apache or nginx
Add the `public/` directory to you avaliable sites and set required settings


