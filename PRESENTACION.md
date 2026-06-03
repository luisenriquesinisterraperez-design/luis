# DAVIRAPID — Sistema de Gestión de Pedidos y Ventas

## 📋 Descripción General

**DAVIRAPID** es un sistema web integral para la administración de pedidos, ventas, inventario y operaciones de un negocio de comidas/domicilios. Permite gestionar el flujo completo: desde la recepción del pedido hasta la entrega, pasando por cocina, control de inventario, cierres de caja y gestión de clientes.

---

## 🛠️ Stack Tecnológico

| Componente | Tecnología |
|---|---|
| **Backend** | CakePHP 5.3 (PHP 8.2+) |
| **Base de Datos** | MySQL |
| **Frontend** | Tailwind CSS + Font Awesome |
| **Autenticación** | cakephp/authentication v4 (sesión + formulario) |
| **Motor de Plantillas** | PHP nativo (sin Twig) |
| **Dev Server** | PHP built-in o Docker |

---

## 🧩 Módulos del Sistema

### 1. Dashboard (`/dashboard`)
Panel principal con métricas en tiempo real: total de pedidos, ingresos brutos, ingresos netos, gastos, abonos, pedidos pendientes por repartidor. Gráfico de ventas por día. Ranking de repartidores y productos más vendidos. Alertas de stock crítico.

### 2. Pedidos / Ventas (`/orders`)
Gestión completa del ciclo de vida del pedido:
- Creación con autocompletado de datos del cliente al seleccionar repartidor
- Flujo de estados: `recibido → en cocina → en camino → entregado`
- Pedidos locales saltan el estado "en camino"
- Agrupación de pedidos por `order_group_id` para transacciones multi-item
- Impresión de tickets individuales y por grupo
- Historial de cambios (OrderLogs)

### 3. Productos (`/products`)
Catálogo de productos del menú con gestión de precios, imágenes y recetas asociadas.

### 4. Recetas (`/product-ingredients/recipe/:id`)
Vinculación de ingredientes a productos con cantidades requeridas. Cálculo automático de costo de producción, utilidad bruta y margen de rentabilidad.

### 5. Insumos / Inventario (`/ingredients`)
Control de materia prima con gestión de stock, costos unitarios y unidades de medida. Alerta visual de stock crítico (≤ 5 unidades).

### 6. Clientes (`/clients`)
Registro de clientes con datos de contacto y dirección para facturación y domicilios.

### 7. Repartidores (`/delivery-drivers`)
Gestión de repartidores con información de contacto y seguimiento de pedidos asignados.

### 8. Cuentas por Cobrar (`/accounts-receivable`)
Control de ventas a crédito con registro de abonos y estado de deudas por cliente.

### 9. Gastos (`/expenses`)
Registro de gastos operativos del día a día.

### 10. Cierre de Caja (`/daily-closures`)
Cierre diario de caja con cálculo automático del total esperado (ventas directas + abonos - gastos). Incluye conteo ciego para vendedores staff (no ven el esperado ni la diferencia).

### 11. Ajustes de Inventario (`/inventory-adjustments`)
Registro de entradas y salidas de inventario no asociadas a ventas (altas, bajas, mermas).

### 12. Adicionales (`/adicionales`)
Ítems adicionales configurables que pueden agregarse a los pedidos (ej: salsas, porciones extra).

### 13. Solicitudes (`/requests`)
Módulo de solicitudes o requerimientos internos.

### 14. Usuarios (`/users`)
Gestión de usuarios del sistema con asignación de roles. El usuario ID 1 (admin principal) es el único que puede crear usuarios y es invisible para los demás administradores.

---

## 👥 Roles y Permisos

| Rol | Acceso |
|---|---|
| **admin** / **super_admin** | Acceso total a todos los módulos |
| **staff** / **vendedor** | Pedidos (creación + últimos 20 registrados), Productos, Insumos (solo lectura, sin costos), Clientes, Repartidores, Caja (cierre ciego), Gastos, Cuentas por Cobrar, Adicionales, Ajustes de Inventario, Solicitudes. Sin datos financieros en Dashboard. |
| **repartidor** | Dashboard propio (pedidos entregados, ganancias por envío, pendientes) + Pedidos asignados |
| **cliente** | Dashboard + Cuentas por Cobrar (consulta de estado) |

El control de acceso se centraliza en `AppController::beforeFilter()` y se refuerza por controlador para acciones sensibles.

---

## 🔐 Seguridad

- **Autenticación**: Basada en sesión con formulario de login
- **Bloqueo de cuenta**: Tras 5 intentos fallidos, la cuenta se bloquea 15 minutos
- **RBAC**: Roles y permisos evaluados en cada petición
- **Protección Host Header**: `APP_FULL_BASE_URL` obligatorio en producción
- **Auditoría**: Log de cambios en pedidos (`OrderLogs`) y log de auditoría en eliminaciones
- **PostLink CSRF**: Eliminaciones protegidas con tokens CSRF

---

## 📐 Arquitectura

```
src/
├── Controller/       # 19 controladores
│   ├── AppController # Lógica de roles y restricciones globales
│   ├── DashboardController
│   ├── OrdersController
│   ├── ProductsController
│   ├── IngredientsController
│   ├── ClientsController
│   └── ...
├── Model/
│   ├── Table/        # 13 clases Table
│   └── Entity/       # Entidades
├── View/
│   └── AppView.php
templates/
├── layout/           # Layout principal (sidebar + header)
├── Dashboard/        # 1 template
├── Orders/           # 5 templates
├── Products/         # 4 templates
└── ...               # 1 subdirectorio por controlador
config/
├── routes.php        # DashedRoute, raíz → Dashboard
├── app.php           # Configuración de la app
└── app_local.php     # Configuración local/entorno
webroot/              # DocumentRoot (Apache apunta aquí)
```

---

## 🚀 Funcionalidades Destacadas

1. **Flujo de pedidos inteligente**: Los pedidos locales saltan el estado "en camino", agilizando la operación.
2. **Autocompletado de repartidor**: Al seleccionar un repartidor, se autocompletan los datos del cliente desde la cadena usuario→cliente.
3. **Cierre de caja ciego**: El personal staff registra el conteo real sin conocer el esperado, evitando riesgos de cuadre.
4. **Dashboard diferenciado por rol**: Cada rol ve métricas relevantes; staff no ve montos financieros.
5. **Control de inventario**: Descuento automático de ingredientes al registrar ventas, con alertas de stock crítico.
6. **Análisis de rentabilidad**: Cálculo automático de costo de producción, utilidad y margen por producto.
7. **Ocultamiento del superadmin**: El usuario ID 1 es invisible para los demás administradores y es el único que puede crear usuarios.

---

## 🐳 Despliegue

### Local (PHP built-in server)
```sh
php -S 0.0.0.0:8080 -t webroot index.php
```

### Docker
```sh
docker compose up -d
# http://localhost:8080
```

### Requisitos
- PHP 8.2+
- MySQL
- Apache con mod_rewrite (o nginx)
- Extensiones: intl, mbstring, pdo_mysql
