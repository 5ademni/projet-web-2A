<?php
include_once("../../auth/config.php");
include_once("../../model/admin.php");
class adminC
{
    function afficherAdmin()
    {
        $sql = "select * from admin";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function ajouterAdmin($admin)
    {

        $sql = "INSERT INTO admin(nom, email, adresse, numtel, mdp) VALUES(:nom, :email, :adresse, :numtel, :mdp)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            // $hashedPassword = password_hash($admin->getMdp(), PASSWORD_DEFAULT);
            $query->execute([
                'nom' => $admin->getNom(),
                'email' => $admin->getEmail(),
                'adresse' => $admin->getAdresse(),
                'numtel' => $admin->getNumtel(),
                'mdp' => $admin->getMdp()
                //'mdp' =>$hashedPassword

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }



    function modifierAdmin($id, $admin)
    {
        $sql = "UPDATE  admin set nom=:nom,email=:email,adresse=:adresse,numtel=:numtel,mdp=:mdp where id=" . $id . "";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom' => $admin->getNom(),
                'email' => $admin->getEmail(),
                'adresse' => $admin->getAdresse(),
                'numtel' => $admin->getNumtel(),
                'mdp' => $admin->getMdp()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function supprimerAdmin($id)
    {
        $sql = "DELETE FROM admin WHERE id=" . $id . "";
        $db = config::getConnexion();
        $query = $db->prepare($sql);

        try {
            $query->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function afficherAdminDetail(int $rech1)
    {
        $sql = "select * from admin where id=" . $rech1 . "";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function searchLogin($email, $mdp)
    {
        $sql = "select * from admin where email='$email' AND mdp='$mdp'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function searchUser($email, $mdp)
    {
        $sql = "select * from admin where email='$email' AND mdp='$mdp'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }



    public function afficherAdminRech(string $rech1, string $selon)
    {
        $sql = "select * from admin where $selon like '" . $rech1 . "%'";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function afficherAdminTrie(string $selon)
    {
        $sql = "select * from admin order by " . $selon . "";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function setConn($email, $mdp)
    {
        $sql = "update admin set token='ON' where email='$email' AND mdp='$mdp'";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function setDisconn()
    {
        $sql = "update admin set token='OFF' where token='ON'";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function selectConn()
    {
        $sql = "select * from admin where token='ON'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function search_id_withemail($email)
{
    $sql = "SELECT id FROM admin WHERE email= :email";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->execute([':email' => $email]);
        $result = $req->fetch();
        $id = $result['id']; // Accédez à l'élément 'id' du tableau
        return $id;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
public function existeAuteur($id)
{
    $sql = "SELECT * FROM admin WHERE id = :id";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
        if ($req->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

    
















    function admin($id)
    {
        $sql = "SELECT * FROM admin where id='$id'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $count = $query->rowCount();
            if ($count == 0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $liste = $query->fetch();
                return $liste;
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function connexionUser($email, $mdp)
    {
        $sql = "SELECT * from admin where email='" . $email . "'and mdp='" . $mdp . "'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $count = $query->rowCount();
            if ($count == 0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $x = $query->fetch();
                $message = $x['email'];
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
        return $message;
    }
    function Rechercherid($email, $mdp)
    {

        $db = config::getConnexion();

        $sql = "SELECT * FROM admin where email='$email'and mdp='$mdp'";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $count = $query->rowCount();
            if ($count == 0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $liste = $query->fetch();
                return $liste;
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function getUserByEmail($email)
    {
        try {
            $config = new Config();
            $conn = $config->getConnexion();

            $query = "SELECT * FROM admin WHERE email = :email";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function updateUserToken($id, $token)
    {
        try {
            $config = new Config();
            $conn = $config->getConnexion();

            $query = "UPDATE admin SET token = :token WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function updatePassword($id, $mdp)
    {
        try {
            $config = new Config();
            $conn = $config->getConnexion();

            // You should never store passwords in plain text in a production environment
            // This is just for demonstration purposes
            $query = "UPDATE admin SET mdp = :mdp WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':mdp', $mdp); // Store the plain text password

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function updateResetToken($email, $token)
    {
        try {
            $config = new Config();
            $conn = $config->getConnexion();

            $query = "UPDATE admin SET token = :token WHERE email = :email";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getUserByToken($token)
    {
        try {
            $config = new Config();
            $conn = $config->getConnexion();

            // Ensure that the token column exists in your user table
            $query = "SELECT * FROM admin WHERE token = :token";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if a user was found with the provided token
            if ($user) {
                return $user;
            } else {
                return false; // No user found with the provided token
            }
        } catch (PDOException $e) {
            // Log the error instead of echoing it
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}
