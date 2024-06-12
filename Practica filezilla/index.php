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
s