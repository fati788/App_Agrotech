
## Sobre mi App DE GESTIÓN DE FINCAS AGRÍCOLAS
Este proyecto es un **Sistema de Gestión de Fincas Agrícolas**
desarrollado con **Laravel**, que permite gestionar fincas, parcelas y
tipos de cultivo. Incluye autenticación, CRUD completo, API RESTful con
Sanctum y vistas Blade.

## Enlace de app en mi github
https://github.com/fati788/App_Agrotech.git

## Instrucciones de instalación y configuración en AWS

``` bash
git clone https://github.com/fati788/App_Agrotech.git
cd App_Agrotech
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash
\. "$HOME/.nvm/nvm.sh"
 nvm install 24
node -v # Should print "v24.11.0".
 npm -v # Should print "11.6.1".
source ~/.bashrc
composer update
 npm install
 npm run build
 podman run -d --name=mariadb_agrotech -p 3308:3306 -e MARIADB_USER=usuario -e MARIADB_PASSWORD=usuario1234 -e MARIADB_ROOT_PASSWORD=toor -e MARIADB_DATABASE=laravel docker.io/mariadb:latest
php artisan migrate
php artisan migrate:fresh --seed
php artisan key:generate
php artisan serve --host=0.0.0.0 --port 8000

```
## Acceder de mi app en EC2
1. Enlace: https://us-east-1.console.aws.amazon.com/ec2-instance-connect/ssh/home?region=us-east-1&connType=standard&instanceId=i-0ac11b9d43b3db2ae&osUser=ubuntu&sshPort=22&addressFamily=ipv4
2. Comandos:
``` bash
podman start mariadb_agrotech
cd App_Agrotech/
php artisan serve --host=0.0.0.0 --port 8000
```
3. En el navigador:

    http://IP_Publica:800

## Usuarios y contraseña de prueba
 | Email | Contraseña |
|-----|------------|
 | fatimaa@gmail.com | 12345678   |
 | anaa@gmail.com | 12345678   |
 | fatii@gmail.com | 12345678   |
 | haja@gmail.com | 12345678   |
 | yayi@gmail.com | 12345678   |
 | mami@gmail.com | 12345678   |

## Descripción de funcionalidades principales

El Sistema de Gestión de Fincas Agrícolas permite a los usuarios gestionar de manera integral sus fincas, parcelas y cultivos. Las funcionalidades principales son:

### 1. Autenticación de Usuarios
- Registro y login de agricultores o gestores de fincas mediante Laravel Breeze.
- Acceso restringido a funcionalidades principales solo para usuarios autenticados.

### 2. Gestión de Fincas
- Crear, editar y eliminar fincas asociadas al usuario.
- Visualizar listado de fincas con información básica: nombre, ubicación, hectáreas totales y descripción.
- Acceder al detalle de cada finca y sus parcelas.

### 3. Gestión de Parcelas
- Crear, editar y eliminar parcelas de una finca específica.
- Asignar tipo de cultivo a cada parcela.
- Cambiar el estado de la parcela: en cultivo, en descanso o en preparación.
- Filtrar parcelas por tipo de cultivo o estado.

### 4. Gestión de Tipos de Cultivo
- Consultar el catálogo completo de tipos de cultivo disponibles con información detallada (nombre, nombre científico, familia, ciclo y descripción).
- Buscar y filtrar por familia o ciclo.

### 5. Dashboard Principal
- Resumen de fincas del usuario con estadísticas clave:
    - Número total de fincas.
    - Número total de parcelas.
    - Hectáreas totales gestionadas.
    - Distribución de cultivos mediante gráficos o tablas.

### 6. API RESTful con Sanctum
- Acceso a datos de fincas, parcelas y tipos de cultivo mediante endpoints seguros.
- Permite operaciones CRUD sobre fincas y parcelas, y consulta de tipos de cultivo.




