<?php
// Include necessary files
include_once '../../Model/admin.php';
include_once '../../Controller/adminC.php';
include_once '../../connexion.php';

// Start session
session_start();

// Redirect to login page if session variable is empty
if (empty($_SESSION['e'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$adminC = new adminC();
$error = "";

try {
    $count = $pdo->prepare("SELECT COUNT(id) AS cpt FROM admin");
    $count->execute();
    $tcount = $count->fetch(PDO::FETCH_ASSOC);
    
    // Debugging: Display the structure of $tcount
    var_dump($tcount);

    // Check if $tcount contains the key "cpt"
    if(isset($tcount["cpt"])) {
        // Pagination
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $nbr_elements_par_page = 5;
        $nbr_de_pages = ceil($tcount["cpt"] / $nbr_elements_par_page);
        $debut = ($page - 1) * $nbr_elements_par_page;

        // Retrieve the records
        $sel = $pdo->prepare("SELECT id, nom, email, adresse, numtel, mdp FROM admin ORDER BY id LIMIT $debut, $nbr_elements_par_page");
        $sel->execute();
        $listeC = $sel->fetchAll(PDO::FETCH_ASSOC);

        // Check if $listeC is null or empty
        if (!$listeC) {
            $listeC = []; // Initialize $listeC as an empty array
        }
    } else {
        // Handle the case where "cpt" key is not present in $tcount
        echo "Error: 'cpt' key not found in the result set.";
    }
} catch (PDOException $e) {
    // Handle any PDO exceptions (database errors)
    echo "PDO Exception: " . $e->getMessage();
    // You may want to log the error or handle it differently based on your application's requirements
    exit();
}


// Handle form submissions
if (isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["adresse"]) && isset($_POST["numtel"]) && isset($_POST["mdp"])) {
    if (!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["adresse"]) && !empty($_POST["numtel"]) && !empty($_POST["mdp"])) {
        $admin = new admin(
            $_POST['nom'],
            $_POST['email'],
            $_POST['adresse'],
            $_POST['numtel'],
            $_POST['mdp']
        );
        $adminC->ajouterAdmin($admin);

        header('Location: affichageAdmin.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

// Handle search submissions
if (isset($_POST["rech"]) && isset($_POST["search"])) {
    if (!empty($_POST["rech"])) {
        $listeC = $adminC->afficherAdminRech($_POST['rech'], $_POST['selon']);
    }
}

// Handle reset button
if (isset($_POST['reset'])) {
    $listeC = $adminC->afficherAdminDetail();
}

// Handle sorting
if (isset($_POST['tri'])) {
    $tri = $_POST['tri'];
    $listeC = $adminC->afficherAdminTrie($tri);
}

 /*    include('../../connexion.php'); // Include the file that establishes the database connection

    // Check if $pdo is null or not
    // Check if $pdo is null or not
    if ($pdo !== null) {
        try {
            // Retrieve the number of records
            $count = $pdo->prepare("select count(id) as id from admin");
            $count->setFetchMode(PDO::FETCH_ASSOC);
            $count->execute();
            $tcount = $count->fetchAll();

            // Pagination
            $page = isset($_GET["page"]) ? $_GET["page"] : 1; // Use isset() to check if $_GET["page"] is set
            $nbr_elements_par_page = 5;
            $nbr_de_pages = ceil($tcount[0]["id"] / $nbr_elements_par_page);
            $debut = ($page - 1) * $nbr_elements_par_page;

            // Retrieve the records themselves
            $sel = $pdo->prepare("select admin from admin order by admin limit $debut, $nbr_elements_par_page");
            $sel->setFetchMode(PDO::FETCH_ASSOC);
            $sel->execute();
            $tab = $sel->fetchAll();
        } catch (PDOException $e) {
            // Handle any PDO exceptions (database errors)
            echo "PDO Exception: " . $e->getMessage();
            // You may want to log the error or handle it differently based on your application's requirements
        }
    } else {
        // Handle the case where $pdo is null
        echo "PDO is not initialized. Check the database connection.";
        // Assign an empty array to $tcount to prevent undefined variable error
        $tcount = [];
    }
     */


    ?>




    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css?ts=<?php echo time()?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage Projet - 5ademni Admin Panel</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            /* Additional CSS styles for better design */
            body {
                font-family: 'Open Sans', sans-serif;
                background-color: #f8f9fc;
            }

            .wrapper {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .content-wrapper {
                flex-grow: 1;
                padding-top: 20px;
            }

            .page-header {
                margin-bottom: 20px;
                text-align: center;
            }

            .card-body {
                margin-bottom: 20px;
            }

            .table {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .table table {
                width: 100%;
                border-collapse: collapse;
            }

            .table table th,
            .table table td {
                padding: 10px;
                border-bottom: 1px solid #e0e0e0;
            }

            .table table th {
                background-color: #f5f5f5;
                font-weight: bold;
                text-align: left;
            }

            .table table tbody tr:hover {
                background-color: #f9f9f9;
            }

            .sort {
                margin-top: 20px;
                padding: 10px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .sort form {
                display: flex;
                align-items: center;
            }

            .sort label {
                margin-right: 10px;
            }

            .sort select {
                margin-right: 10px;
            }

            .button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                cursor: pointer;
            }

            .button:hover {
                background-color: #0056b3;
            }
            
    .pagination{
        text-align: center;
    }
    .pagination a{
        color: black;
        text-decoration: none;
        padding: 8px 15px;
        display: inline-block;
    }
    .pagination a.active{
        background-color: hsl(120, 100%, 70%);
        font-weight: bold;
        border-radius: 5px;
    }
    .pagination a:hover:not(.active){
        background-color: hsl(0, 0%, 77%);
        border-radius: 5px;
    }
        </style>
    </head>
    <body>
    <header class="header fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="Logo">
                <span class="d-none d-lg-block">5ademni-Admin</span>
            </a>
            <button class="bi bi-list toggle-sidebar-btn"></button>
        </div>
    </header>

    
        
        
        
        <!-- Page Content -->
            <div class="content-wrapper">
                <!-- Page Header -->
                <div class="page-header">
                </div>
                <!-- End Page Header -->
                <div class="content-wrapper">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="m-0 font-weight-bold text-primary">USER TABLE  </h1>
                </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                        <thead>
                <form method="POST" action="affichageAdmin.php">
                <input type="submit" value="reset"class = "btn btn-primary" >
            
                <input type="text" class="field small-field" name="rech"/>
                <select name="selon" class="field small-field" >

                
                
                <option value="nom">nom</option>
                <option value="email">email</option>
                <option value="numtel">numtel</option>
                
                </select>
                <input type="submit" class="button" value="search" name="search" /></form>
                
                </div>
            
            <div id="sidebar">
            <!-- Box -->  <div class="sort">
                <form method="POST"><label>SELECT</label>
                <select name="tri" class="field" >
                

                    <option value="nom">nom</option>
                    <option value="email">email</option>
                    <option value="numtel">numtel</option>
                    
                </select><input type="submit"  value="trier"class = "btn btn-primary"style = "background-color: #90D26D "></form>
                
                </div>
            <!-- End Box Head -->
            <!-- Table -->
            <div class="table">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <!-- Add your table headers here -->
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>         
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Numtel</th>
                            <th>Mot de passe</th>
                            <!-- Add more headers if needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Display records from $listeC -->
                        <?php foreach($listeC as $admin): ?>
                            <tr>
                                <td><?php echo $admin['id']; ?></td>
                                <td><?php echo $admin['nom']; ?></td>
                                <td><?php echo $admin['email']; ?></td> 
                                <td><?php echo $admin['adresse']; ?></td>
                                <td><?php echo $admin['numtel']; ?></td>
                                <td><?php echo $admin['mdp']; ?></td>
                                <td><a href="supprimerAdmin.php?id=<?php echo $admin['id']; ?>" class="btn btn-primary" style="background-color: #90D26D;">Delete</a></td>
                                <td><a href="modifierAdmin.php?id=<?php echo $admin['id']; ?>" class="btn btn-primary" style="background-color: red;">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                                </div>
                            </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <!-- <span>Copyright &copy; Your Website 2020</span> -->
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <nav>
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $nbr_de_pages; $i++) : ?>
                            <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>




    </html>

    

