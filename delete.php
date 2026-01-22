<?php
require_once "db.php";

// On vérifie que l'ID existe dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête de suppression
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Retour à la liste
        header("Location: list.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $conn->error;
    }
} else {
    echo "ID manquant.";
}
?>
