<?php 
// Inclusion du contrôleur utilisateur
require_once '../Controller/UserController.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage et validation des entrées utilisateur
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pwd = $_POST['pwd'];

    if ($email && $pwd) {
        // Hachage du mot de passe pour la sécurité
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Création d'un tableau contenant les informations de l'utilisateur
        $user = [
            'email' => $email,
            'pwd' => $hashedPwd
        ];

        // Ajout de l'utilisateur à la base de données via le contrôleur
        $controller = new UserController();
        $controller->addUser($user);

        // Message de confirmation en cas de succès
        $message = "<p class='success-message'>Utilisateur ajouté avec succès !</p>";
    } else {
        // Message d'erreur si les entrées sont invalides
        $message = "<p class='error-message'>Entrée invalide. Veuillez vérifier vos données.</p>";
    }
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        /* Réinitialisation des styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style général du corps */
        body {
            font-family: 'Arial', sans-serif;
            background: #0d1117;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur du formulaire */
        .form-container {
            background-color: #161b22;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Titre */
        h2 {
            color: #58a6ff;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        /* Labels des champs */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #8b949e;
            text-align: left;
        }

        /* Champs de saisie */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #30363d;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            background-color: #21262d;
            color: #c9d1d9;
        }

        /* Effet focus sur les champs de saisie */
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #58a6ff;
            outline: none;
            background-color: #0d1117;
        }

        /* Bouton de soumission */
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #238636;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Effet hover sur le bouton */
        button[type="submit"]:hover {
            background-color: #2ea043;
        }

        /* Messages d'erreur et de succès */
        .message {
            margin-top: 20px;
            font-size: 16px;
        }

        .success-message {
            color: #2ea043;
        }

        .error-message {
            color: #f85149;
        }

        /* Responsive pour les petits écrans */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            input[type="email"],
            input[type="password"] {
                padding: 10px;
                font-size: 14px;
            }

            button[type="submit"] {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Ajouter un nouvel utilisateur</h2>
        
        <!-- Affichage du message d'erreur ou de succès -->
        <?php if (!empty($message)) echo $message; ?>
        
        <!-- Formulaire d'ajout d'utilisateur -->
        <form action="AddUser.php" method="post">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="pwd">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
