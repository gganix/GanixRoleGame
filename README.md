# Proyecto Role Game

## Descripción de Componentes

### Controladores

- **authController**: Gestiona la autenticación del usuario. Incluye funciones para el inicio de sesión (login) y autenticación (authenticate), redireccionando a la vista correspondiente. La función logout cierra la sesión y redirige al formulario de inicio.
- **creatureController**: Controlador principal para la gestión de las criaturas. Incluye métodos para listar (index), mostrar (show), crear (create), almacenar (store), editar (edit), actualizar (update), y eliminar (delete) criaturas.

### Modelos

- **Creature**: Modelo que representa la entidad de una criatura en la base de datos. Incluye funciones para obtener todas las criaturas (getAll), obtener una criatura por ID (getById), crear (create), actualizar (update) y eliminar (delete) una criatura.
- **Database**: Clase singleton que administra la conexión a la base de datos usando PDO. La función getInstance devuelve una única instancia de conexión, permitiendo que todos los modelos compartan la misma conexión de base de datos.

### Helper

- **sessionHelper**: Clase de utilidad para la gestión de sesiones. Incluye métodos para iniciar sesiones (startSession), iniciar sesión (login), cerrar sesión (logout) y verificar si el usuario está autenticado (isAuthenticated).

### Vistas

- **Login View**: Contiene el formulario de inicio de sesión y muestra los errores de autenticación.
- **Creature Views**: Plantillas que muestran la lista de criaturas (index.php), detalles de una criatura (show.php), formulario de creación de criatura (create.php) y formulario de edición de criatura (edit.php).
- **Navbar**: Menú de navegación que muestra opciones de autenticación y acceso a funciones de usuario dependiendo de si el usuario está autenticado o no.

## Requisitos

Para ejecutar este proyecto, necesitas:

- PHP 7.4 o superior
- MySQL
- Composer para la gestión de dependencias

## Instalación

1. **Clonar el repositorio:**

    ```bash
    git clone https://github.com/tu_usuario/tu_repositorio.git
    cd tu_repositorio
    ```

2. **Configurar la base de datos:** Ejecuta el script SQL para crear la base de datos y la tabla de criaturas.

    ```sql
    SOURCE assets/rolegame.sql;
    ```

3. **Configurar la conexión a la base de datos:** En el archivo Database.php, actualiza las credenciales para que coincidan con tu configuración de MySQL.

4. **Iniciar el servidor PHP:** Ejecuta el siguiente comando para iniciar el servidor en localhost:8000:

    ```bash
    php -S localhost:8000 -t public
    ```

5. **Acceder a la aplicación:** Abre tu navegador y ve a `http://localhost:8000`.

## Uso de la Aplicación

- **Inicio de Sesión:** Accede a la pantalla de inicio de sesión. Introduce `admin` como usuario y `password` como contraseña (puedes personalizar estos valores en authController.php).
- **Gestión de Criaturas:** Después de iniciar sesión, puedes crear, editar, eliminar y ver detalles de criaturas.

## Estructura de Carpetas

.
├── app
│   ├── Controllers
│   │   ├── authController.php          # Controlador de autenticación
│   │   └── creatureController.php       # Controlador de criaturas
│   ├── Helpers
│   │   └── sessionHelper.php            # Helper para manejo de sesiones
│   ├── Models
│   │   ├── Creature.php                 # Modelo de la entidad Criatura
│   │   └── Database.php                 # Clase para la conexión a la base de datos
│   └── Views
│       ├── Auth
│       │   └── login.php                # Vista de inicio de sesión
│       ├── Creatures
│       │   ├── create.php               # Vista de creación de criaturas
│       │   ├── edit.php                 # Vista de edición de criaturas
│       │   ├── index.php                # Vista de listado de criaturas
│       │   └── show.php                 # Vista de detalles de una criatura
│       └── Layouts
│           └── navbar.php               # Navbar de la aplicación
├── assets
│   ├── img
│   │   ├── logo.jpg                     # Logo para el navbar
│   │   └── heroes_banner.jpg            # Banner de la aplicación
│   └── rolegame.sql                     # Script SQL para crear la base de datos y la tabla
└── public
    ├── index.php                        # Punto de entrada principal
    ├── login.php                        # Punto de entrada para inicio de sesión
    └── logout.php                       # Punto de entrada para cerrar sesión
