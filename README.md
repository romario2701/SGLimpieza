
# Sistema de Gestión de Residuos del Mercado Municipal
Este proyecto es una aplicación web completa desarrollada con Laravel 11 y Docker (Sail), diseñada para digitalizar y optimizar el proceso de gestión de limpieza en un mercado municipal.

Responde a la problemática de la acumulación de basura, la falta de horarios definidos y la inexistente trazabilidad de las tareas de limpieza, proponiendo una solución "TO-BE" basada en una arquitectura de software moderna (MVC) con control de acceso por roles.

## Funcionalidades Clave
El sistema implementa una arquitectura basada en roles (RBAC) con tres niveles de acceso:

### Administrador:

* Acceso a un dashboard principal con vistas de gestión.

* CRUD completo de Tareas: Crear, asignar, editar y eliminar tareas de limpieza.

* CRUD completo de Usuarios: Gestionar cuentas y asignar roles (admin, personal, ciudadano).

* CRUD completo de Incidencias: Ver, gestionar y resolver los reportes enviados por los ciudadanos.

### Personal de Limpieza:

* Vista filtrada que muestra solo las tareas asignadas a él.

* Permiso para actualizar el estado de sus tareas (ej. "pendiente" -> "completada").

### Ciudadano (Comerciante/Cliente):

* Acceso a un portal simplificado.

* Permiso para crear/reportar nuevas incidencias.

## Stack Tecnológico
Este proyecto utiliza un entorno de desarrollo 100% contenerizado con Docker.

* Backend: PHP 8.3 / Laravel 11

* Frontend: Blade / Tailwind CSS (vía Laravel Breeze)

* Base de Datos: MySQL

* Contenerización: Docker (con Laravel Sail)

* Servicios Adicionales: Redis, phpMyAdmin

* Testing: Behat (para BDD) y Pest (para pruebas unitarias/feature)

## Prerrequisitos
* Para ejecutar este proyecto, solo necesitas tener instalado Docker Desktop en tu sistema.

* (En Windows) Se recomienda usar WSL 2 (Windows Subsystem for Linux 2) como backend de Docker.

## Instrucciones de Instalación
El proyecto está configurado con Laravel Sail y se puede levantar con un solo comando. Todos los comandos deben ejecutarse desde un terminal de Linux (o WSL 2 en Windows).

    1. Clonar el Repositorio

        git clone https://github.com/romario2701/SGLimpieza.git

        cd SGLimpieza


    2. Levantar los Contenedores de Docker Este comando iniciará el servidor web, la base de datos (MySQL), Redis y phpMyAdmin.


        ./vendor/bin/sail up -d

    (La primera vez, esto puede tardar unos minutos mientras Docker descarga las imágenes).

    3. Instalar Dependencias de Composer (PHP)

        ./vendor/bin/sail composer install

    4. Generar la Clave de la Aplicación

        ./vendor/bin/sail artisan key:generate

    5. Ejecutar las Migraciones Esto creará todas las tablas en tu base de datos (users, tarea_limpiezas, incidencias).

        ./vendor/bin/sail artisan migrate

    6. Instalar Dependencias de NPM (Frontend)

        ./vendor/bin/sail npm install

    7. Compilar los Archivos de Frontend

        ./vendor/bin/sail npm run dev


### Acceso a la Aplicación


    1. Aplicación Web:

        URL: http://localhost

    2. Base de Datos (phpMyAdmin):

        URL: http://localhost:8081

        Servidor: mysql

        Usuario: sail

        Contraseña: password

### Primeros Pasos
* Accede a http://localhost/register para crear tu primera cuenta de usuario.

* Por defecto, esta cuenta tendrá el rol de ciudadano.

* Ve a phpMyAdmin (http://localhost:8081), entra a la base de datos (GestionLimpieza o la que definiste) y, en la tabla users, cambia manualmente el role de tu usuario a admin.

* Vuelve a la aplicación. Ahora tendrás acceso a los CRUDs de Tareas y Usuarios para crear más cuentas con los roles personal y ciudadano.
