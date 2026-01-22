<?php
require_once "db.php";

// On récupère toutes les tâches
$sql = "SELECT * FROM tasks ORDER BY due_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
</head>
<body>

    <h1>Liste des tâches</h1>

    <a href="add.php">Ajouter une nouvelle tâche</a> |
    <a href="index.php">Accueil</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date d'échéance</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($task = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($task['title']) . "</td>";
                echo "<td>" . htmlspecialchars($task['description']) . "</td>";
                echo "<td>" . $task['due_date'] . "</td>";
                echo "<td>" . ($task['completed'] ? "Terminée" : "En cours") . "</td>";
                echo "<td>
                        <a href='complete.php?id=" . $task['id'] . "'>Terminer</a> |
                        <a href='delete.php?id=" . $task['id'] . "'>Supprimer</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucune tâche trouvée.</td></tr>";
        }
        ?>
    </table>

</body>
</html>
