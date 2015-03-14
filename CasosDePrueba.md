# Instalación #

Vamos a usar PHPUnit:
  1. bajamos [phpunit.phar](https://phar.phpunit.de/phpunit.phar) y lo colocamos en una nueva carpeta en c:\php\phar
  1. ahí agregarmos phpunit.bat con el siguiente contenido `@php "%~dp0phpunit.phar" %* `
  1. en c:\php (que debe estar en el path) ponemos otro phpunit.bat con
```
path c:\php\phar;%path%
@c:\php\phar\phpunit.bat %* 
```

Ya estamos en condiciones de invocar phpunit en cualquier carpeta.