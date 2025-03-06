<?php
require_once '../Controller/UserController.php';  

// Instanciation du contrôleur des utilisateurs
$userController = new UserController();  

// Récupération de la liste des utilisateurs
$utilisateurs = $userController->getUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
        :root {
            --bg-color: #2c2c2c; /* Gris foncé */
            --text-color: #ffffff; /* Blanc */
            --table-bg: #1e1e2f; /* Bleu nuit */
            --primary-color: #FFA726; /* Orange */
            --danger-color: #E53935; /* Rouge vif */
            --hover-color: #33334d; /* Bleu nuit clair */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: var(--table-bg);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        th {
            background-color: #FFD700; /* Or */
            color: black;
            font-size: 16px;
        }

        tr:hover {
            background-color: var(--hover-color);
        }

        .btn {
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 14px;
        }

        .btn-update {
            background-color: var(--primary-color);
        }
        .btn-update:hover {
            background-color: #EF6C00; /* Orange foncé */
        }

        .btn-delete {
            background-color: var(--danger-color);
        }
        .btn-delete:hover {
            background-color: #B71C1C; /* Rouge foncé */
        }

        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($utilisateur['email']); ?></td>
                        <td><?php echo htmlspecialchars($utilisateur['pwd']); ?></td>
                        <td>
                            <a href="deleteUser.php?id=<?php echo $utilisateur['id']; ?>" class="btn btn-delete">Supprimer</a>
                            <a href="updateUser.php?id=<?php echo $utilisateur['id']; ?>" class="btn btn-update">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
