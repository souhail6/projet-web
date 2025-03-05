<?php
require_once '../Controller/UserController.php';

$userController = new UserController();
$messageErreur = "";
$messageSucces = "";

// Vérification de la présence d'un ID utilisateur valide dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idUtilisateur = $_GET['id'];

    // Récupération de l'utilisateur pour vérifier son existence
    $utilisateur = $userController->getUserById($idUtilisateur);

    if ($utilisateur) {
        // Gestion de la suppression
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['supprimer_utilisateur'])) {
            // Suppression de l'utilisateur
            $statutSuppression = $userController->deleteUser($idUtilisateur);

            if ($statutSuppression) {
                $messageSucces = "✅ Utilisateur supprimé avec succès !";
                header("Location: listUsers.php"); // Redirection après suppression
                exit();
            } else {
                $messageErreur = "❌ La suppression a échoué.";
            }
        }
    } else {
        $messageErreur = "❌ Utilisateur introuvable.";
    }
} else {
    $messageErreur = "❌ ID utilisateur manquant ou invalide.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un utilisateur</title>
    <style>
        /* Ajoutez vos styles ici */
    </style>
</head>
<body>
    <div class="container">
        <h1>Suppression d'un utilisateur</h1>

        <?php if (!empty($messageErreur)): ?>
            <p class="message erreur"><?php echo $messageErreur; ?></p>
        <?php elseif (!empty($messageSucces)): ?>
            <p class="message succes"><?php echo $messageSucces; ?></p>
        <?php endif; ?>

        <?php if (isset($utilisateur)): ?>
            <form action="deleteUser.php?id=<?php echo htmlspecialchars($idUtilisateur); ?>" method="POST">
                <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                <button type="submit" name="supprimer_utilisateur">Supprimer</button>
            </form>
        <?php else: ?>
            <p>Utilisateur introuvable.</p>
        <?php endif; ?>
    </div>
</body>
</html>
