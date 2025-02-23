<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Elevage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>public/assets/img/logo2.webp" rel="icon">
  <link href="<?= BASE_URL ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <!-- Template Main CSS File -->
  <link href="<?= BASE_URL ?>public/assets/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="<?= BASE_URL ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/Bootstrap/css/bootstrap.min.css">
  <script src="<?= BASE_URL ?>public/assets/Bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/Bootstrap/js/jquery.min.js"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= BASE_URL ?>public/assets/img/logo2.webp" alt="">
        <span class="d-none d-lg-block">FarmFrenzy</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="d-flex align-items-center justify-content-between flex-grow-1">
          <h1 class="text-center my-3 my-lg-0 mx-auto" style="font-size: 3rem; font-weight: bold; color: #333;">
            Site de suivi d'élevage
          </h1>
      </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <button id="btn-reset" type="button" class="btn btn-outline-primary btn-lg" style="margin-right: 20px;">
          <i class="bi bi-arrow-repeat"></i> Reset
        </button>
        
      </ul>
    </nav>
    <!-- End Reset button -->

  </header>
  <!-- End Header -->
<script>
    $(document).ready(function(){
      $("#btn-reset").click(function(){
        if(confirm("Voulez-vous vraiment réinitialiser ?")){
          $.ajax({
            url: '/accueil/reset', // Assurez-vous que cette URL correspond à la route configurée
            type: 'POST',
            dataType: 'json',
            success: function(response){
              alert(response.message);
              // Optionnel : recharger la page pour refléter les modifications
              location.reload();
            },
            error: function(){
              alert("Erreur lors de la réinitialisation.");
            }
          });
        }
      });
    });
  </script>
  

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-house-door"></i>
          <span>Accueil</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <!-- Components -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-speedometer2"></i><span>Tableau de bord</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
         <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav"> 
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Saisir date de jour</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-heart-pulse"></i><span>Biby</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Acheter animaux</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Mes animaux</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Nourrir animaux</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-basket"></i><span>Alimentation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Acheter aliments</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Mes aliments</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-check"></i><span>Prevision</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Prevision 1</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Prevision 2</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>Prevision 3</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Parametre type</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Animal</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Alimentation</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  <!-- End Sidebar-->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
        <p>&copy; 
        Designed by ETU003107 - ETU003122 - ETU003144
        </p>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= BASE_URL ?>public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/quill/quill.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/php-email-form/validate.js"></script>

  
  <!-- Template Main JS File -->
  <script src="<?= BASE_URL ?>public/assets/js/main.js"></script>

</body>

</html>