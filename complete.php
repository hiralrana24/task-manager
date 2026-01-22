<?php
require_once "db.php";

// Vérifie que l'ID est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mettre la tâche comme terminée
    $sql = "UPDATE tasks SET completed = TRUE WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Retour à la liste
        header("Location: list.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
} else {
    echo "ID manquant.";
}
?>
