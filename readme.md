# Proyecto Vacantes Grupo ASD

El proyecto consiste en un sistema de registro de usuario para aplicar a una vacante de Grupo ASD, donde se pueden realizar operaciones CRUD y inicio de sesión.

### Caracteristicas:

1. Registro de Usuarios: Permite a los usuarios registrarse proporcionando información básica, como nombre completo, tipo de documento, número de documento, correo electrónico y cargo aspirado.

2. Inicio de Sesión: Los usuarios registrados pueden iniciar sesión en el sistema utilizando su correo electrónico y contraseña.

3. Operaciones CRUD: Los usuarios pueden realizar operaciones de Crear, Leer, Actualizar y Eliminar en sus perfiles y vacantes asociadas.

4. Mensajes de Confirmación y Error: Utiliza la arquitectura MVVM para gestionar y mostrar mensajes de confirmación y error mediante eventos de notificación de cambio.

5. Panel de Control: Los usuarios autenticados tienen acceso a un panel de control donde pueden ver y modificar sus datos personales y gestionar las vacantes.

6. Interfaz de Usuario: Diseño de la interfaz utilizando HTML, CSS y Bootstrap para una experiencia de usuario moderna y responsiva.

### Estrucura

1. assets: Archivos de estilo CSS, imágenes y código JavaScript para mensajes.

2. models: Contiene la conexión a la base de datos, consultas y validaciones.

3. views: Archivos PHP para las vistas, incluyendo el panel y el registro.

4. Index: Página de inicio y login.

#### Muestra:

![alt text](/imagenes/estructura.png)

### Uso

#### Instalación:

1. Requisitos:

- IDE: Visual Studio Code, PHPStorm, Sublime Text, etc.
- Servidor Local: XAMPP, MAMP, Docker.
- Control de Versiones: Git y GitHub.
- Base de Datos: MySQL.

2. Pasos de configuración:

- Clona el repositorio y guardalo en la carpeta htdocs o similar en tu servidor web.

- Corre el archivo `gasd.sql` en un gastor de base de datos.

- Configura la conexión a la base de datos en models/conexion.php.

```
<?php 
//Conexion php basica a base de datos 
$mysqliconnect = mysqli_connect("localhost", "root", "", "gasd");
if ($mysqliconnect->connect_errno) {
    echo "Error al conectar la base de datos: " . $mysqliconnect->connect_error;
    exit();
} 
?>
```

- Abre la aplicativo desde un navegador usando el siguiente enlace "localhost/(nombre de la carpeta)".

![alt text](/imagenes/login.png)

#### Inciar sesión y crear cuenta

1. Acceso a la Página de Registro: Navega a views/registro.php para registrarte como nuevo usuario.

![alt text](/imagenes/formulario.png)

2. Completa el Formulario: Introduce tu nombre completo, tipo de documento, número de documento, correo electrónico y cargo aspirado. Luego, envía el formulario.

![alt text](/imagenes/registro.png)

3. Inicio de Sesión: Acceso a la Página de Login: Navega a index.php.

4. Introduce Credenciales: Proporciona tu correo electrónico y contraseña para iniciar sesión.

![alt text](/imagenes/ingreso.png)

#### Acceso al Panel de Control:

Después del Inicio de Sesión: Una vez autenticado, serás redirigido a views/panel.php donde podrás ver y actualizar tus datos personales y eliminar tu usuario.

![alt text](/imagenes/panel.png)

#### Mensajes de Confirmación y Error:

1. Visualización de Mensajes: Los mensajes de confirmación y error se muestran en la página después de realizar acciones como registro, inicio de sesión, o modificación de datos.

2. Duración: Los mensajes visibles desaparecen automáticamente después de 3 segundos.
   Ejecución de Operaciones CRUD:

3. Modificar Datos: Usa el panel de control para modificar tus datos personales.

4. Eliminar tu Vacante: Puedes eliminar tu vacante desde el panel de control usando el botón correspondiente que abre un modal de confirmación.

![alt text](/imagenes/mensaje.png)

Notas Adicionales:

Arquitectura MVVM: La aplicación sigue el patrón MVVM para manejar la lógica de negocio y la interfaz de usuario, lo que facilita la separación de responsabilidades y la gestión de estados.

### Contacto

Corre Electronico: teosuarezpilo@gmail.com

Telefono: 3224452892

linkedin: www.linkedin.com/in/daniel-suarez-2a717a31a
