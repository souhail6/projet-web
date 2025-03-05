<?php
require_once '../Controller/UserController.php';

// Activation de l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userController = new UserController();
$utilisateur = null; // Initialisation de la variable utilisateur

// Récupération des détails de l'utilisateur à modifier
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $utilisateur = $userController->getUserById($_GET['id']);

    if (!$utilisateur) {
        die("❌ Utilisateur non trouvé !");
    }
} else {
    die("❌ ID utilisateur invalide !");
}

// Traitement de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $motDePasse = $_POST['pwd']; // Hachage du mot de passe

    if (!empty($id) && !empty($email) && !empty($motDePasse)) {
        $userController->updateUser($id, $email, $motDePasse);
        header("Location: ListUsers.php");
        exit();
    } else {
        echo "<p style='color:red;'>❌ Tous les champs sont obligatoires !</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
        form {
            display: inline-block;
            text-align: left;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h2>Modifier un utilisateur</h2>
    
    <form action="updateUser.php?id=<?php echo htmlspecialchars($utilisateur['id']); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($utilisateur['id']); ?>">
        
        <label>Email :</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($utilisateur['email']); ?>" required>
        
        <label>Mot de passe :</label>
        <input type="password" name="pwd" value="<?php echo htmlspecialchars($utilisateur['pwd']); ?>" required>
        
        <button type="submit" name="update">Mettre à jour</button>
    </form>

</body>
</html>