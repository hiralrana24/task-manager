<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
</head>
<body>

    <h1>Ajouter une nouvelle tâche</h1>

    <form action="save.php" method="POST">
        <label>Titre :</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description :</label><br>
        <textarea name="description" rows="4" cols="40"></textarea><br><br>

        <label>Date d'échéance :</label><br>
        <input type="date" name="due_date"><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <br>
    <a href="index.php">Retour à l'accueil</a>

</body>
</html>
