<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#API de Gestión de Órdenes de Compra

Esta es una API desarrollada en Laravel para la gestión de órdenes de compra. Permite a los usuarios autenticados realizar pedidos, gestionar productos, administrar carritos de compras, consultar órdenes, actualizar su estado y manejar los métodos de pago y direcciones de envío.
## 🚀 Instalación
## 1. Clonar el repositorio
```
git clone https://github.com/deivish/SQ1_Academy_Api_Store
cd nombre-del-proyecto
```
## 2. Instalar dependencias
```
composer install
```
## 3. Configurar el archivo .env
Copia el archivo de ejemplo y edítalo según tu configuración local:
```
cp .env.example .env
```
## 4. Ejecutar las migraciones
```
php artisan migrate
```
## 5. Iniciar el servidor
```
php artisan serve
```
#📌 Rutas Principales de la API

##🔹 Autenticación
*POST /api/login - Iniciar sesión

*POST /api/register - Registrar un usuario

*POST /api/logout - Cerrar sesión

##Órdenes

*GET /api/orders - Obtener todas las órdenes del usuario autenticado

*POST /api/orders - Crear una nueva orden

*GET /api/orders/{id} - Obtener detalles de una orden específica

*PUT /api/orders/{id} - Actualizar una orden

*DELETE /api/orders/{id} - Eliminar una orden

#🔹 Productos

*GET /api/products - Obtener todos los productos

*POST /api/products - Crear un nuevo producto

*GET /api/products/{id} - Obtener detalles de un producto específico

*PUT /api/products/{id} - Actualizar un producto

*DELETE /api/products/{id} - Eliminar un producto

##🔹 Carrito de Compras

*GET /api/shoppingcart - Obtener el carrito del usuario autenticado

*POST /api/shoppingcart - Crear un carrito (opcional, si no se genera automáticamente)

*DELETE /api/shoppingcart - Vaciar el carrito

##🔹 Elementos del Carrito

*POST /api/cartitems - Agregar un producto al carrito

*PUT /api/cartitems/{id} - Actualizar la cantidad de un producto en el carrito

*DELETE /api/cartitems/{id} - Eliminar un producto del carrito
##🔐 Middleware y Seguridad

*Uso de auth:sanctum para proteger rutas

*Políticas de acceso con Gate para restringir acciones a los dueños de las órdenes

##🛠 Herramientas Utilizadas

*Framework: Laravel 10

*Base de Datos: SQLite

*Autenticación: Laravel Sanctum
