<!DOCTYPE html>
<html lang="en-US">

<?php
  define("SITE_URL", "http://localhost/AboutMe/");
?>

<head>
  <meta charset="utf-8" />
  <meta content="IE=edge" http-equiv="X-UA-Compatible" />
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
  <title>AboutMe - Personal Portfolio Resume Template</title>
  <meta name="description" content="Add your business website description here" />
  <meta name="keywords" content="Add your business website keywords here" />
  
  <link rel="shortcut icon" href="<?php echo SITE_URL; ?>assets/images/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/fontawesome/all.min.css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/lightbox.min.css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/parallax.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/swiper-bundle.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/responsive.css" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header id="header" class="header fixed-top headerbg-darkcolor nav-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <nav class="navbar navbar-expand-lg navbar-light mgsb4navbar">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation" onclick="mgsChangeMenubar(this)">
              <span class="menubar1"></span> <span class="menubar2"></span>
              <span class="menubar3"></span>
            </button>
            <a class="navbar-brand d-md-block d-lg-none" href="/">
              <img class="logo logo-white" src="assets/images/logo.png" alt="logo" />
              <img class="logo logo-color" src="assets/images/logo-color.png" alt="logo" />
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <a class="navbar-brand d-none d-sm-none d-md-none d-lg-block" href="/">
                <img class="logo logo-white" src="assets/images/logo.png" alt="logo" />
                <img class="logo logo-color" src="assets/images/logo-color.png" alt="logo" />
              </a>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#service">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#portfolio">Portfolio</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#blog">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>