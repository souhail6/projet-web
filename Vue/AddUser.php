<?php
require_once '../Controller/UserController.php';  

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage et validation des entrées utilisateur
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pwd = $_POST['pwd'];

    if ($email && $pwd) {
        // Hachage du mot de passe
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Création d'un tableau utilisateur
        $user = [
            'email' => $email,
            'pwd' => $hashedPwd
        ];

        // Ajout de l'utilisateur à la base de données
        $controller = new UserController();
        $controller->addUser($user);

        // Message de succès
        $message = "<p class='success-message'>Utilisateur ajouté avec succès !</p>";
    } else {
        // Message d'erreur en cas de saisie invalide
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            background-color: #fafafa;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #fff;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
        }

        .success-message {
            color: #4CAF50;
        }

        .error-message {
            color: #f44336;
        }

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
        
        <?php if (!empty($message)) echo $message; ?>

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