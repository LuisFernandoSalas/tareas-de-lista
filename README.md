# tareas-de-lista:

Objetivo de la Práctica

Desarrollar una aplicación web básica para la gestión de una lista de tareas (To-Do List) utilizando PHP y MySQL en el entorno de hosting gratuito de 000webhost.

Requerimientos
Cuenta en 000webhost:
Registrarse y crear una cuenta en https://www.000webhost.com/.
Herramientas Necesarias:
Un editor de texto (VS Code, Sublime Text, etc.).
FileZilla o cualquier cliente FTP.
Navegador web moderno.
Tecnologías:
PHP
MySQL
Crear la Base de Datos
Acceder a phpMyAdmin:
Desde el panel de control de 000webhost, accede a phpMyAdmin.
Crea una nueva base de datos llamada todo_list.

Crear la Tabla:
En phpMyAdmin, ejecuta el siguiente script SQL para crear la tabla tasks:
sql

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status BOOLEAN DEFAULT FALSE
);

Crear los Archivos PHP
Archivo de Conexión (conexion.php):
php

<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "todo_list";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

Formulario de Inserción (index.php):


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <form action="insertar.php" method="post">
        <input type="text" name="task" placeholder="Nueva tarea" required>
        <button type="submit">Agregar</button>
    </form>
    <h2>Tareas</h2>
    <ul>
        <?php
        include 'conexion.php';
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["task"] . "</li>";
            }
        } else {
            echo "No hay tareas.";
        }
        $conn->close();
        ?>
    </ul>
</body>
</html>

Archivo para Insertar Tareas (insertar.php):

<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva tarea agregada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location: index.php");
exit();
?>

Subir Archivos a 000webhost
Conectar con FileZilla:
Abre FileZilla y conéctate utilizando los datos de acceso FTP de 000webhost.
Subir Archivos:
Sube los archivos index.php, insertar.php, conexion.php y style.css al directorio public_html de tu cuenta 000webhost.
Paso 5: Probar la Aplicación
Acceder a la Aplicación:
Abre tu navegador y accede a la URL de tu sitio web en 000webhost (por ejemplo, https://mi-sitio.000webhostapp.com/).
Añadir Tareas:
Usa el formulario para añadir nuevas tareas y verifica que se muestran correctamente en la lista.
Archivo CSS (style.css)

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin: 20px 0;
}

form {
    text-align: center;
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}

ul {
    list-style-type: none;
    padding: 0;
    width: 50%;
    margin: auto;
}

li {
    background-color: white;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}



Ejemplo de un README.md

# Sistema de Gestión de Calificaciones

## Descripción
Una aplicación web para gestionar información personal y calificaciones de alumnos, desarrollada con PHP, MySQL y XAMPP.

## Características
- Registro de alumnos con foto
- Gestión de calificaciones
- Funcionalidades CRUD
- Interfaz amigable y responsiva

## Requisitos
- XAMPP instalado
- Navegador web moderno

## Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/gestion-calificaciones.git


