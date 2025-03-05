<?php
require '../Config.php';

class UserController
{
    public function getUsers()
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM user");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage());
        }
    }

    public function addUser($user)
    {
        try {
            $db = config::getConnexion();
            $sql = "INSERT INTO user (email, pwd) VALUES (:email, :pwd)";
            $query = $db->prepare($sql);

            $query->bindValue(':email', $user['email'], PDO::PARAM_STR);
            $query->bindValue(':pwd', password_hash($user['pwd'], PASSWORD_BCRYPT), PDO::PARAM_STR);

            $query->execute();

            return $query->rowCount() > 0 ? "Utilisateur ajouté avec succès !" : "Échec de l'insertion.";
        } catch (PDOException $e) {
            return 'Erreur lors de l’ajout de l’utilisateur : ' . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("DELETE FROM user WHERE id = ?");
            $query->execute([$id]);

            return $query->rowCount() > 0; // Retourne vrai si suppression réussie
        } catch (PDOException $e) {
            return false; // Retourne faux en cas d’erreur
        }
    }

    public function updateUser($id, $email, $password)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE user SET email = ?, pwd = ? WHERE id = ?";
            $query = $db->prepare($sql);

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query->execute([$email, $hashedPassword, $id]);

            return $query->rowCount() > 0 ? "Utilisateur mis à jour avec succès !" : "Aucune modification apportée.";
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
        }
    }

    public function getUserById($id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM user WHERE id = ?");
            $query->execute([$id]);

            return $query->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            return "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
        }
    }
}
