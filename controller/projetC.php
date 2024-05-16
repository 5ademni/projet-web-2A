<?php
include_once("../../auth/config.php");
//require_once('C:/Users/Dorra Sioud/Downloads/TCPDF-main/TCPDF-main/tcpdf.php');

class projetC
{

    public function getDomaines()
    {
        $sql = "SELECT DISTINCT domaine FROM projet"; // Sélectionnez tous les domaines distincts de la table projet
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $domaines = [];
            while ($row = $result->fetch()) {
                $domaines[] = $row['domaine'];
            }
            return $domaines;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function afficherDomaine($domaine)
    {
        $sql = "SELECT * FROM projet WHERE domaine = :domaine"; // Utilisez une requête préparée pour éviter les injections SQL
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':domaine', $domaine);
            $stmt->execute();
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getProjetsAvecPostulations()
    {
        // Utilisez ici votre logique pour récupérer les projets avec des postulations depuis la base de données
        // Assurez-vous de retourner les résultats sous une forme appropriée, comme un tableau associatif
        // Cette méthode devrait retourner un tableau des projets avec des postulations

        // Exemple simplifié
        $projetsAvecPostulations = array(
            array('nom_projet' => 'Projet 1'),
            array('nom_projet' => 'Projet 2'),
            // Ajoutez d'autres projets si nécessaire
        );

        return $projetsAvecPostulations;
    }

    public function generate_pdf($id)
    {
        // Create a new PDF instance
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Project Details');
        $pdf->SetSubject('Project ID: ' . $id);
        $pdf->SetKeywords('Project, Details, ID');

        // Set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // Set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Add a page
        $pdf->AddPage();

        // Output project ID in PDF
        $pdf->Write(0, 'Project ID: ' . $id, '', 0, 'C', true, 0, false, false, 0);

        // Close and output PDF document
        $pdf->Output('project_details.pdf', 'I');
    }

    public function afficherProjetDetail(int $id)
    {
        $sql = "SELECT * FROM projet WHERE id=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
            $project = $query->fetch(PDO::FETCH_ASSOC); // Fetch the project details as an associative array
            return $project; // Return the project details
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function selectConn()
    {
        $sql = "select * from projet";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherProjet()
    {
        $sql = "select * from projet";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function ajouterProjet($projet)
    {
        $sql = "INSERT INTO projet(nom_projet,nom_realisateur,niveau_etudes,email,time,domaine,budget,description,AdminID) 
            VALUES (:nom_projet,:nom_realisateur,:niveau_etudes,:email,:time,:domaine,:budget,:description,:AdminID)";
        $db = config::getConnexion();
        try {
            // Vérifie si le projet existe déjà
            $allProjects = $this->getAllProjects();
            $nom_projet = $projet->getNomProjet();
            foreach ($allProjects as $existingProject) {
                if ($existingProject['nom_projet'] === $nom_projet) {
                    return "Le projet '$nom_projet' existe déjà.";
                }
            }

            // Si le projet n'existe pas, l'ajoute à la base de données
            $query = $db->prepare($sql);
            $query->execute([
                'nom_projet' => $projet->getNomProjet(),
                'nom_realisateur' => $projet->getNomRealisateur(),
                'niveau_etudes' => $projet->getNiveauEtudes(),
                'email' => $projet->getEmail(),
                'time' => $projet->getTime(),
                'domaine' => $projet->getDomaine(),
                'budget' => $projet->getBudget(),
                'description' => $projet->getDescription(),
                'AdminID' => $projet->getAdminID()
            ]);
            return "Le projet '$nom_projet' a été ajouté avec succès.";
        } catch (Exception $e) {
            return 'Erreur: ' . $e->getMessage();
        }
    }

    function modifierProjet($id, $projet)
    {
        $sql = "UPDATE projet set nom_projet=:nom_projet,nom_realisateur=:nom_realisateur,niveau_etudes=:niveau_etudes,email=:email,time=:time,domaine=:domaine,budget=:budget,description=:description where id=" . $id . "";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom_projet' => $projet->getNomProjet(),
                'nom_realisateur' => $projet->getNomRealisateur(),
                'niveau_etudes' => $projet->getNiveauEtudes(),
                'email' => $projet->getEmail(),
                'time' => $projet->getTime(),
                'domaine' => $projet->getDomaine(),
                'budget' => $projet->getBudget(),
                'description' => $projet->getDescription()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function supprimerProjet($id)
    {
        $sql = "DELETE FROM projet WHERE id=" . $id . "";
        $db = config::getConnexion();
        $query = $db->prepare($sql);

        try {
            $query->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function afficherProjetRech(string $rech1, string $selon)
    {
        $sql = "select * from projet where $selon like '" . $rech1 . "%'";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function afficherProjetTrie(string $selon)
    {
        $colonnesValides = array('nom_projet', 'nom_realisateur', 'email', 'time', 'domaine', 'budget', 'description');
        if (!in_array($selon, $colonnesValides)) {
            echo "La colonne spécifiée n'est pas valide.";
            return null;
        }
        $sql = "SELECT * FROM projet order by " . $selon . "";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return null;
        }
    }

    public function getAllProjects()
    {
        $projects = array(); // Initialisation d'un tableau vide pour stocker les projets récupérés

        // Requête SQL pour sélectionner tous les projets depuis la base de données
        $query = "SELECT * FROM projet";

        // Exécution de la requête
        $result = config::getConnexion()->query($query);

        // Vérification s'il y a des résultats
        if ($result->rowCount() > 0) {
            // Parcourir les résultats et les stocker dans le tableau $projects
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $projects[] = $row; // Ajouter le projet au tableau $projects
            }
        }

        // Retourner le tableau contenant tous les projets
        return $projects;
    }
}
