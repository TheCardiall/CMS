<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title><?php echo $srvnom; echo ' | '; echo $title; ?></title>
  <meta name="keywords" content="made with bootstrap, wrap bootstrap themes, bootstrap agency themes, creative bootstrap sites, Lava theme, responsive bootstrap theme, mobile website themes, bootstrap portfolio, theme armada">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <!-- Styles -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/custom-styles.css">

  <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../../../../apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="http://themearmada.com/favicon.png">
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand img-responsive" href="index.php"><img src="<?php echo $urllogo; ?>" alt="<?php echo $srvnom; ?>"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Accueil</a></li>
            <li><a href="news.php">News</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Le Serveur<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="pres.php">Présentation</a></li>
                  <li><a href="pratique.php">Informations pratiques</a></li>
                  <li><a href="staff.php">Le staff</a></li>
                </ul>
              </li>
            <li><a href="boutique.php">Boutique</a></li>
            <?php 
        if (isset($_SESSION['pseudo']))
             {  ?>
<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Compte<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="compte.php">Acceuil</a></li>
                  <li><a href="credit.php">Ajouter crédits</a></li>
                  <li><a href="include/deco.php">Déconnexion</a></li>
                </ul>
              </li>
             <?php 
           }
        else {
            echo '<li><a href="login.php">Connexion</a></li>';
            echo '<li><a href="register.php">Inscription</a></li>'; 
             }  
          ?> 
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>