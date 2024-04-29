<?php
session_start();
include_once '../../controller/jobFieldC.php';
include_once '../../model/jobField.php';

$jobFieldC = new jobFieldC();
$fieldlist = $jobFieldC->listJobFields();

if (isset($_GET['see-more'])) {
  $fieldId = $_GET['see-more'];
  $fieldCrud = $jobFieldC->getFieldById($fieldId);
}

if (isset($_GET['edit'])) {
  $fieldId = $_GET['edit'];
  $fieldCrud = $jobFieldC->getFieldById($fieldId);
}

$idPattern = "/^[0-9]{1,3}$/";
$fieldNamePattern = "/^[a-zA-Z]{1,20}$/";
$descriptionPattern = "/^.{1,60}$/";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
  $id = $_POST['edit']; // Get the id from the POST data

  $editId = $_POST['edit-id'];
  $editName = $_POST['edit-name'];
  $descriptionName = $_POST['description-name'];

  $_SESSION['edit-id'] = $editId;
  $_SESSION['edit-name'] = $editName;
  $_SESSION['description-name'] = $descriptionName;

  if (!preg_match($idPattern, $editId)) {
    $_SESSION['error-id'] = "Invalid ID";
  }
  if (!preg_match($fieldNamePattern, $editName)) {
    $_SESSION['error-name'] = "Invalid field name";
  }
  if (!preg_match($descriptionPattern, $descriptionName)) {
    $_SESSION['error-description'] = "Invalid description";
  }

  if (isset($_SESSION['error-id']) || isset($_SESSION['error-name']) || isset($_SESSION['error-description'])) {
    header('Location: fields.php');
    exit;
  }

  $editedField = new jobField($editId, $editName, $descriptionName);
  $jobFieldC->updateField($id, $editedField);
  header('Location: fields.php');
  exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $createId = $_POST['create-id'];
  $createName = $_POST['create-name'];
  $createDescription = $_POST['create-description'];

  $_SESSION['create-id'] = $createId;
  $_SESSION['create-name'] = $createName;
  $_SESSION['create-description'] = $createDescription;

  if (!preg_match($idPattern, $createId)) {
    $_SESSION['error-id'] = "Invalid ID";
  }
  if (!preg_match($fieldNamePattern, $createName)) {
    $_SESSION['error-name'] = "Invalid field name";
  }
  if (!preg_match($descriptionPattern, $createDescription)) {
    $_SESSION['error-description'] = "Invalid description";
  }

  if (isset($_SESSION['error-id']) || isset($_SESSION['error-name']) || isset($_SESSION['error-description'])) {
    header('Location: fields.php');
    exit;
  }

  $newField = new jobField($createId, $createName, $createDescription);
  $jobFieldC->addField($newField);
  header('Location: fields.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>5ademni Admin Panel</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block">5ademni-Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
        <button type="submit" title="Search">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span> </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
          <!-- End Notification Dropdown Items -->
        </li>
        <!-- End Notification Nav -->

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span> </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle" />
                <div>
                  <h4>Maria Hudson</h4>
                  <p>
                    Velit asperiores et ducimus soluta repudiandae labore
                    officia est ut...
                  </p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle" />
                <div>
                  <h4>Anna Nelson</h4>
                  <p>
                    Velit asperiores et ducimus soluta repudiandae labore
                    officia est ut...
                  </p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle" />
                <div>
                  <h4>David Muldon</h4>
                  <p>
                    Velit asperiores et ducimus soluta repudiandae labore
                    officia est ut...
                  </p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>
          </ul>
          <!-- End Messages Dropdown Items -->
        </li>
        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span> </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <!-- Start Users Nav -->
      <li class="nav-item">
        <a class="nav-link" href="users.html">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>
      <!-- End Users Nav -->

      <!-- Start Job Posts Nav -->
      <li class="nav-item">
        <a class="nav-link" href="job-posts.php">
          <i class="bi bi-briefcase"></i>
          <span>Job Posts</span>
        </a>
      </li>
      <!-- End Job Posts Nav -->

      <!-- Start Blog Nav -->
      <li class="nav-item">
        <a class="nav-link" href="blog.html">
          <i class="bi bi-pencil-square"></i>
          <span>Blog</span>
        </a>
      </li>
      <!-- End Blog Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>
      <!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>
      <!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>
      <!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li>
      <!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>
      <!-- End Blank Page Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">posts d'emploi</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <?php
    //MARK: main form
    ?>
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Field List</h5>
              </div>

              <table class="table table-striped datatable">
                <thead>
                  <tr>
                    <th scope="col">Field ID</th>
                    <th scope="col">Field Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($fieldlist as $field) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $field['FieldID']; ?></th>
                      <td><?php echo $field['FieldName']; ?></td>
                      <td><?php echo $field['Description'] !== null ? mb_substr($field['Description'], 0, 20) . (strlen($field['Description']) > 20 ? '...' : '') : ''; ?></td>
                      <td>
                        <a href="fields.php?see-more=<?php echo $field['FieldID']; ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="fields.php?edit=<?php echo $field['FieldID']; ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Field List</h5>
              </div>
              <!-- Default Tabs  -->
              <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 <?php echo !isset($_SESSION['error-id']) && !isset($_SESSION['error-name']) && !isset($_SESSION['error-description']) ? 'active' : ''; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="<?php echo isset($_GET['see-more']) ? 'true' : 'false'; ?>">See More</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 <?php echo isset($_SESSION['create-id']) || isset($_SESSION['create-name']) || isset($_SESSION['create-description']) ? 'active' : ''; ?>" id="create-tab" data-bs-toggle="tab" data-bs-target="#create-justified" type="button" role="tab" aria-controls="create" aria-selected="<?php echo isset($_GET['create']) ? 'true' : 'false'; ?>">Create</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 <?php echo isset($_SESSION['edit-id']) || isset($_SESSION['edit-name']) || isset($_SESSION['edit-description']) ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="<?php echo isset($_GET['edit']) ? 'true' : 'false'; ?>">Edit</button>
                </li>
              </ul>
              <!-- SEE MORE TAB -->
              <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show <?php echo isset($_GET['see-more']) ? 'active' : ''; ?>" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Multi Columns Form -->
                  <?php if (!isset($_GET['see-more']) && !isset($_GET['edit'])) : ?>
                    <div class="alert alert-warning" role="alert">
                      You must select a field first.
                    </div>
                  <?php else : ?>
                    <!-- READ ONLY FORM -->
                    <form class="row g-3">
                      <div class="col-md-6">
                        <label for="inputID" class="form-label">ID</label>
                        <input readonly type="text" class="form-control" id="inputID" name="see-more-id" value="<?php echo $fieldCrud['FieldID']; ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="inputField" class="form-label">Field Name</label>
                        <input readonly type="text" class="form-control" id="inputField" name="see-more-name" value="<?php echo $fieldCrud['FieldName']; ?>">
                      </div>
                      <div class="col-12">
                        <label for="inputDescription" class="form-label">Description</label>
                        <input readonly type="text" class="form-control" id="inputDescription" name="see-more-description" value="<?php echo $fieldCrud['Description']; ?>">
                      </div>
                    </form>
                    <!-- END READ ONLY FORM --><!-- End Multi Columns Form -->
                  <?php endif; ?>
                </div>
                <!-- End See More Tab -->
                <!-- New Tab Content -->
                <div class="tab-pane fade show <?php echo isset($_GET['create']) ? 'active' : ''; ?>" id="create-justified" role="tabpanel" aria-labelledby="create-tab">
                  <!-- Multi Columns Form -->
                  <form class="row g-3" method="POST" id="fieldform">
                    <div class="col-md-6">
                      <label for="inputID" class="form-label">ID</label>
                      <input type="text" class="form-control" id="inputID" name="create-id" value="<?php echo isset($_SESSION['create-id']) ? $_SESSION['create-id'] : '';
                                                                                                    unset($_SESSION['create-id']); ?>">
                      <?php if (isset($_SESSION['error-id'])) : ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $_SESSION['error-id'];
                          unset($_SESSION['error-id']); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                      <label for="inputField" class="form-label">Field Name</label>
                      <input type="text" class="form-control" id="inputField" name="create-name" value="<?php echo isset($_SESSION['create-name']) ? $_SESSION['create-name'] : '';
                                                                                                        unset($_SESSION['create-name']); ?>">
                      <?php if (isset($_SESSION['error-name'])) : ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $_SESSION['error-name'];
                          unset($_SESSION['error-name']); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-12">
                      <label for="inputDescription" class="form-label">Description</label>
                      <input type="text" class="form-control" id="inputDescription" name="create-description" value="<?php echo isset($_SESSION['create-description']) ? $_SESSION['create-description'] : '';
                                                                                                                      unset($_SESSION['create-description']); ?>">
                      <?php if (isset($_SESSION['error-description'])) : ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $_SESSION['error-description'];
                          unset($_SESSION['error-description']); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form><!-- End Multi Columns Form -->
                </div>
                <!-- End New Tab Content -->
                <!--EDIT TAB-->
                <div class="tab-pane fade show <?php echo isset($_GET['edit']) ? 'active' : ''; ?>" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                  <!-- Multi Columns Form -->
                  <?php if (!isset($_GET['see-more']) && !isset($_GET['edit'])) : ?>
                    <div class="alert alert-warning" role="alert">
                      You must select a field first.
                    </div>
                  <?php else : ?>
                    <form class="row g-3" method="POST" id="editFieldForm">
                      <div class="col-md-6">
                        <label for="editInputID" class="form-label">ID</label>
                        <input type="text" class="form-control" id="editInputID" name="edit-id" value="<?php echo isset($_SESSION['edit-id']) ? $_SESSION['edit-id'] : $fieldCrud['FieldID'];
                                                                                                        unset($_SESSION['edit-id']); ?>">
                        <?php if (isset($_SESSION['error-id'])) : ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error-id'];
                            unset($_SESSION['error-id']); ?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-md-6">
                        <label for="editInputField" class="form-label">Field Name</label>
                        <input type="text" class="form-control" id="editInputField" name="edit-name" value="<?php echo isset($_SESSION['edit-name']) ? $_SESSION['edit-name'] : $fieldCrud['FieldName'];
                                                                                                            unset($_SESSION['edit-name']); ?>">
                        <?php if (isset($_SESSION['error-name'])) : ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error-name'];
                            unset($_SESSION['error-name']); ?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-12">
                        <label for="editInputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="editInputDescription" name="description-name" value="<?php echo isset($_SESSION['description-name']) ? $_SESSION['description-name'] : $fieldCrud['Description'];
                                                                                                                          unset($_SESSION['description-name']); ?>">
                        <?php if (isset($_SESSION['error-description'])) : ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error-description'];
                            unset($_SESSION['error-description']); ?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- End Multi Columns Form -->
                  <?php endif; ?>
                </div>
                <!-- End Edit Tab -->
              </div><!-- End Default Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>5ademni</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by DevForce</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>