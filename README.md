# Sistema de Gestión de Inventario

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Sistema completo para gestión de inventario con interfaz web y API REST.

## 🚀 Tecnologías Principales

### Backend
- **Laravel 12** 
- **PHP 8.2+**  
- **MySQL 8.0** 
- **Sanctum** 

### Testing
- **PestPHP** 
- **PHPUnit 11** 
- **Paratest** 

## 🛠 Instalación y Configuración

### Requisitos previos
- PHP 8.2+
- Composer 2.5+
- MySQL 8.0+
- Node.js 18+ 
- Servidor web xampp

### Pasos de instalación

1. **Clonar el repositorio**:
     https://github.com/davy2333/Sistema_de_gestion_de_inventario.git
2. Instalar dependencias PHP
     composer install --optimize-autoloader --no-dev
3.Instalar dependencias JavaScript
    npm install
    npm run build
4. Configurar el entorno
   cp .env.example .env
    php artisan key:generate
5. configurar el archivo env.

   como se deberia ver
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_de_gestion_de_inventario
DB_USERNAME=root
DB_PASSWORD=

6. correr migraciones
   php artisan migrate --seed
7. Configurar Sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
8. por ultimo correr proyecto con el comando
   php artisan serve
