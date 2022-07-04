<?php
@session_start();
require_once("verificar.php");
require_once("../conexao-radius-db.php");

$id_usuario = $_SESSION['id'];

if (@$_GET['pag'] == "") {
  $pag = 'home';
} else {
  $pag = $_GET['pag'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>RADIUS</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <script src="js/bootstrap.js"> </script>
  <link rel="shorcut icon" type="image/x-icon" href="images/claro.gif" />
  <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-1.11.1.min.js"></script>
  <!-- font-awesome icons CSS -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-lg has-bg-image">
      <div class="image-wrapper">
        <img src="https://user-images.githubusercontent.com/25878302/144499035-2911184c-76d3-4611-86e7-bc4e8ff84ff5.jpg" alt="sidebar background" />
      </div>
      <div class="sidebar-layout" >
        <div class="sidebar-header">
          <span style="
                margin: 0 auto;
                text-transform: uppercase;
                font-size: 30px;
                letter-spacing: 3px;
                font-weight: bold;
                color: antiquewhite;;
              ">VOC</span>
        </div>
        <div class="sidebar-content">
          <nav class="menu open-current-submenu">
            <ul>
              <li class="menu-item">
                <a href="index.php?pag=home" id="um">
                  <span class="menu-icon">
                    <i class="ri-book-2-fill"></i>
                  </span>
                  <span class="menu-title" >Home</span>
                </a>
              </li>
              <li class="menu-item sub-menu">
                <a href="#" id="dois">
                  <span class="menu-icon">
                    <i class="ri-vip-diamond-fill"></i>
                  </span>
                  <span class="menu-title">Radius</span>
                </a>
                <div class="sub-menu-list">
                  <ul>
                    <li class="menu-item">
                      <a href="index.php?pag=cadastro-radius"  id="tres">
                        <span class="menu-title">CADASTRO USUARIOS</span>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="index.php?pag=cadastro-hosts"  id="tres">
                        <span class="menu-title">CADASTRO HOSTS</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="menu-item sub-menu">
                <a href="#" id="quatro">
                  <span class="menu-icon">
                    <i class="ri-bar-chart-2-fill"></i>
                  </span>
                  <span class="menu-title">Discovery</span>
                </a>
                <div class="sub-menu-list">
                  <ul>
                    <li class="menu-item">
                      <a href="index.php?pag=allip-contribution"  id="cinco">
                        <span class="menu-title">APLICAR DISCOVERY</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="menu-item sub-menu">
                <a href="#" id="oito">
                  <span class="menu-icon">
                    <i class="ri-shopping-cart-fill"></i>
                  </span>
                  <span class="menu-title">Scripts</span>
                </a>
                <div class="sub-menu-list">
                  <ul>
                    <li class="menu-item">
                      <a href="index.php?pag=scripts-python" id="nove">
                        <span class="menu-title">PYTHON</span>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="index.php?pag=scripts-shell" id="dez">
                        <span class="menu-title">SHELL</span>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="index.php?pag=scripts-php" id="onze">
                        <span class="menu-title">PHP</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="menu-item">
                <a href="logout.php"  id="doze">
                  <span class="menu-icon">
                    <i class="ri-book-2-fill"></i>
                  </span>
                  <span class="menu-title">Sair</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- <div class="sidebar-footer"><span>Sidebar footer</span></div> -->
      </div>
    </aside>
    <div id="overlay" class="overlay"></div>
    <div class="layout">
      <header class="header">
        <a id="btn-collapse" >
          <i class="ri-menu-line ri-xl" style="cursor: pointer;"></i>
        </a>
        <a id="btn-toggle" style="cursor: pointer;"  class="sidebar-toggler break-point-lg">
          <i class="ri-menu-line ri-xl"></i>
        </a>
      </header>
      <main class="content">

        <?php require_once("paginas/" . $pag . '.php') ?>

      </main>
      <div class="overlay"></div>
    </div>
  </div>
  <!-- partial -->
  <script src='https://unpkg.com/@popperjs/core@2'></script>
  <script src="js/script.js"></script>

  <!-- Bootstrap Core CSS -->

  <!-- Bootstrap Core JavaScript -->

</body>

</html>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/bootstrap.js"> </script>