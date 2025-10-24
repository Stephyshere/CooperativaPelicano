# CooperativaPelicano# 🌾 Cooperativa Pelícano (Stardew Valley)

## 📖 Descripción del Proyecto

Este proyecto consiste en una aplicación web desarrollada en **PHP** y **MySQL** para gestionar el inventario, proveedores y ventas de la "Cooperativa Pelícano," inspirada en el juego Stardew Valley.

El objetivo principal es implementar un sistema de gestión de recursos humanos y productos (CRUD) y un sistema transaccional de ventas que controle el stock y los ingresos.

## ⚙️ Características Técnicas y Requisitos

El proyecto cumple rigurosamente con los siguientes requisitos de funcionalidad, usabilidad, y seguridad:

### **Base de Datos y CRUD**
* **Gestión de Agricultores:** CRUD completo (`agricultores.php`).
* **Gestión de Productos:** CRUD completo (`productos.php`).
* **Registro de Ventas:** Formulario de compra rápida que registra automáticamente la venta (`buy_product.php`).

### **Seguridad y Transacciones (Ventajas)**
* **Prepared Statements:** Implementadas en todas las consultas (INSERT, UPDATE, DELETE, SELECT) para prevenir la Inyección SQL.
* **Control de Coherencia:** Uso de **Transacciones MySQL** (`mysqli_begin_transaction`) en el proceso de venta para garantizar que la venta se registra **solo si** el stock se actualiza correctamente.
* **Validación de Stock y Dinero:** Comprobación antes de registrar la venta de que la cantidad solicitada existe en el inventario y que el saldo es suficiente.
* **Escape de Salida:** Uso de `htmlspecialchars()` en la visualización de datos para prevenir ataques de Cross-Site Scripting (XSS).

### **Mejora y Estadísticas**
* **Panel de Estadísticas (`estadisticas.php`):** Contiene consultas avanzadas con `JOIN` y `GROUP BY` para mostrar:
    1.  Ventas y Ganancias totales por agricultor.
    2.  Conteo de productos diferentes por tipo.
* **Diseño Temático:** Interfaz con estilos CSS inspirados en la paleta de colores y estética rústica de Stardew Valley.

---

## 🚀 Instalación y Despliegue

Sigue estos pasos para poner en funcionamiento la Cooperativa Pelícano en tu entorno local:

1.  **Servidor Local:** Asegúrate de tener un servidor local (XAMPP, WAMP, MAMP) con **Apache** y **MySQL** en funcionamiento.
2.  **Archivos del Proyecto:** Coloca todos los archivos PHP, CSS y el `README.md` en la carpeta raíz de tu servidor web (ej. `htdocs/CooperativaPelicano`).
3.  **Base de Datos:**
    * Crea una base de datos llamada `cooperativa_pelicano`.
    * Ejecuta el código SQL de creación de tablas (Agricultores, Productos, Ventas) y los `INSERT` de datos iniciales.
4.  **Configuración:** Abre `config.php` y verifica las credenciales de la base de datos:
    ```php
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'tu_contraseña_aqui'); // Asegúrate de que coincida con tu configuración local
    ```
5.  **Ejecución:** Abre tu navegador y navega a la URL del proyecto (ej. `http://localhost/CooperativaPelicano/index.php`).

---

## 📂 Estructura de Archivos Clave

| Archivo | Función Principal |
| :--- | :--- |
| **`index.php`** | Dashboard y navegación principal. |
| **`config.php`** | Maneja la conexión a la Base de Datos. |
| **`agricultores.php`** | Listado y acceso al CRUD de proveedores. |
| **`productos.php`** | Inventario, CRUD y formulario de Compra Rápida. |
| **`buy_product.php`** | Lógica central de Transacciones (Stock y Registro de Venta). |
| **`estadisticas.php`** | Panel de informes y consultas GROUP BY/JOIN. |
| **`style.css`** | Estilos temáticos de Stardew Valley. |

---

## 👥 Miembros del Grupo

Este proyecto fue desarrollado por el siguiente equipo:

* [Rubén Garcia Cubero]
* [Jose Garcia]
* [PAU]
* [Estefania Castellanos]

---

## PROYECTO AUN EN DESARROLLO
