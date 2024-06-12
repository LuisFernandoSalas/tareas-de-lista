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
