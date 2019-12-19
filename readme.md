<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Blog Laravel :newspaper:
En este repositorio encontraras un blog armado con Laravel entre otros componentes y/o lenguajes, el mismo contiene:
- Login / Registro
- Perfiles administrativos y de sesión
- ABM de publicaciones (solo usuarios registrados)
- Caja de comentarios (solo usuarios registrados)
- Listado de publicaciones

Para correr este blog en el ordenador se debe utilizar ciertos comandos de consola (**Se requiere composer**)  
Para iniciar el servidor `php artisan serv`  
Para ejectuar las migraciones y los seeders `php artisan migrate --seed`

Una vez levantado el servidor puede usar de prueba los siguientes usuarios:  
**Administrador:**  
Email -> admin@test.com  
Pass -> 123456  

**Usuario normal** o podes registrarte y probar :smile:  
Email -> test@test.com  
Pass -> 123456  

## Lenguajes usados:
- Laravel 5.8
- HTML y CSS (Blade)
- JavaScript
- PHP 7
- MySQL
- Git (Para la manipulación de composer)

## Framework usado:
Laravel (PHP)

## Módulos utilizados: https://laravel.com/docs
- Composer -> https://getcomposer.org/
- Modelos
- Controladores (Donde está armado el CRUD de publicaciones)
- Migraciones (Para crear las tablas de la base de datos)
- Model Factories (Donde colocamos que tipo de datos falsos queremos almacenar)
- Seeders (Para el llenado de la base de datos utilizando Faker)
- Middlewares
- Policies

## Paquetes Utilizados:
- Faker (Componente que inserta “datos de prueba” en la base de datos) -> https://github.com/fzaninotto/Faker
- LaravelCollective (Creación optima de formularios) -> https://github.com/laravelcollective/html
- Bootstrap 4 (Para el diseño estético de ciertas áreas) -> https://getbootstrap.com/

Gracias y saludos :hand:
