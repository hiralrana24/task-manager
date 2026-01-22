<?php
// On inclut la connexion à la base
require_once "db.php";

// On récupère les données envoyées par le formulaire
$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];

// On prépare la requête SQL
$sql = "INSERT INTO tasks (title, description, due_date) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $description, $due_date);

// On exécute
if ($stmt->execute()) {
    // Si tout va bien → on retourne à la liste des tâches
    header("Location: list.php");
    exit();
} else {
    echo "Erreur lors de l'enregistrement : " . $conn->error;
}
?>
