<?php
include_once '../../Controller/jobPostC.php';
include_once '../../controller/jobFieldC.php';

$jobPostC = new jobPostC();
$jobFieldC = new jobFieldC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_GET['id']; // Get the id from the POST data

  $jobPost = new JobPost(
    $id,
    $_POST['title'],
    $_POST['company_name'],
    $_POST['location'],
    null, // Pass null for the date
    $_POST['salary'],
    $_POST['status'],
    $_POST['field_id'],
    $_POST['level_id'],
    $_POST['employment_type_id'],
    $_POST['description']
  );
  $jobPostC->updateJobPost($id, $jobPost);
  header('Location: job-posts.php');
  exit;
} elseif (isset($_GET['id'])) {
  $job_post = $jobPostC->getJobPostById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>5ademni Admin Panel</title>
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block">5ademni-Admin</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </button>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
          <button type="submit" title="Search">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
    </div>
  </header>

  <aside id="sidebar" class="sidebar">
    <!-- Your sidebar content here -->
  </aside>

  <main id="main" class="main">
    <div class="container">
      <div class="pagetitle">
        <h1>Users</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="job-posts.php">posts d'emploi</a></li>
            <li class="breadcrumb-item active">modification post demploi <?php echo $job_post['JobID']; ?></li>
          </ol>
        </nav>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit job <?php echo $job_post['JobID']; ?></h5>
          <!-- Your form content here -->
        </div>
      </div>
    </div>
  </main>

  <footer id="footer" class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Designed by DevForce | &copy; 5ademni All Rights Reserved</span>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>
