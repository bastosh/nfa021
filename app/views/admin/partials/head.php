<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $page; ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>

<div class="app-dashboard shrink-medium">
  <!-- TOPBAR -->
  <div class="row expanded app-dashboard-top-nav-bar">
    <div class="columns medium-2">
      <a href="/" class="app-dashboard-logo">Cat Clinic</a>
    </div>
    <div class="columns show-for-medium">
      <div class="app-dashboard-search-bar-container">
        <input class="app-dashboard-search" type="search" placeholder="Rechercher">
        <i class="app-dashboard-search-icon fa fa-search"></i>
      </div>
    </div>
    <div class="columns shrink app-dashboard-top-bar-actions">
      <a href="/logout" class="button hollow">Déconnexion</a>
      <button data-tooltip tabindex="1" title="Never trust user input." data-position="bottom" data-alignment="center"><i class="fas fa-info-circle"></i></button>
    </div>
  </div>

  <div class="app-dashboard-body off-canvas-wrapper">

    <!-- SIDEBAR -->
    <div id="app-dashboard-sidebar" class="app-dashboard-sidebar position-left off-canvas off-canvas-absolute reveal-for-medium" data-off-canvas>
      <div class="app-dashboard-sidebar-title-area">
        <div class="app-dashboard-close-sidebar">
          <h3 class="app-dashboard-sidebar-block-title">Menu</h3>
          <!-- Close button -->
          <button id="close-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-sidebar-close-button show-for-medium" aria-label="Close menu" type="button">
            <span aria-hidden="true"><a href="#"><i class="large fas fa-angle-double-left"></i></a></span>
          </button>
        </div>
        <div class="app-dashboard-open-sidebar">
          <button id="open-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-open-sidebar-button show-for-medium" aria-label="open menu" type="button">
            <span aria-hidden="true"><a href="#"><i class="large fas fa-angle-double-right"></i></a></span>
          </button>
        </div>
      </div>
      <div class="app-dashboard-sidebar-inner">
        <ul class="vertical menu">
          <li>
            <a href="/admin">
              <i class="large fas fa-cog"></i>
              <span class="app-dashboard-sidebar-text">Vue d’ensemble</span>
            </a>
          </li>
          <li>
            <a href="/admin-features">
              <i class="large fas fa-list"></i>
              <span class="app-dashboard-sidebar-text">Spécialités</span>
            </a>
          </li>
          <li>
            <a href="/admin-guides">
              <i class="large fas fa-sticky-note"></i>
              <span class="app-dashboard-sidebar-text">Fiches conseils</span>
            </a>
          </li>
        </ul>
      </div>
    </div>




