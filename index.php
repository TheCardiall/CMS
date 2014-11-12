<?php
$title = 'Accueil';
include 'include/header.php'; 
?>
    <!-- Carousel
    Change your images in the main.css file.
    ================================================== -->
    <div id="header" class="carousel slide animated fadeIn" data-ride="carousel">
      
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#header" data-slide-to="0" class="active"></li>
        <li data-target="#header" data-slide-to="1"></li>
      </ol>
      
      <div class="carousel-inner">
        <div class="item one active">
          <div class="container animated fadeInUp">
            <div class="carousel-caption">
              <h1>Un serveur différent</h1><!-- Pour changer l'image rendez vous dans css/main.css ligne 363 -->
              <p class="lead margin-40"><em>Une histoire pas comme les autres</em></p>
            </div>
          </div>
        </div>
        <div class="item two">
          <div class="container">
            <div class="carousel-caption">
              <h1>Boutique ouverte !</h1><!-- Pour changer l'image rendez vous dans css/main.css ligne 368 -->
              <p class="lead margin-40"><em>La nouvelle boutique est arrivée</em></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control hidden-xs" href="index.php#header" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right carousel-control hidden-xs" href="index.php#header" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div><!-- /.carousel -->
    
    
    <!--Services-->
    <section id="services" class="section">
      <div class="container">
        <div class="row text-center">
          
          <!--Seciton 1-->
          <div class="col-sm-4 service margin-30">
            <a href="index.html#">
              <i class="fa fa-thumbs-up fa-4x light-black"></i>
              <h3>Un serveur polivalant</h3>
              <p>Nous essayons de jour en jour de vous ajouter du contenu de jeux pour encore plus de fun :)</p>
            </a>
          </div>
          
          <!--Seciton 2-->
          <div class="col-sm-4 service margin-30">
            <a href="index.html#">
              <i class="fa fa-bar-chart-o fa-4x light-black"></i>
              <h3>Un serveur toujours là</h3>
              <p>Notre hébergeur hostmyservers nous donne un service qualité avec un uptime de 99%</p>
            </a>

          </div>
          
          <!--Seciton 3-->
          <div class="col-sm-4 service margin-30">
            <a href="index.html#">
              <i class="fa fa-flag fa-4x light-black"></i>
              <h3>Une équipe à votre service</h3>
              <p>Notre staff vous permet une qualité de jeux exceptionnel tout en restant ferme avec les cheaters</p>
            </a>

          </div>
          
        </div>
      </div>
    </section>
    
    
    <!--Message Section-->
    <section id="message" class="section">
      <div class="container">
        <div class="row margin-40">
          <div class="col-sm-12 text-center">
            <h3>Adresse de connexion :</h3></br>
            <h2><?php echo $ip; echo ":"; echo $port; ?></h2></br>
            <h4><?php if( ( $Players = $Query->GetPlayers( ) ) !== false ): ?>
<?php foreach( $Players as $Player ): ?>
            <tr>
              <td>Il y a actuellement <?php echo htmlspecialchars( $Player ); ?> de connectés</td>
            </tr>
<?php endforeach; ?>
<?php else: ?>
            <tr>
              <td>Aucune personne de connectée</td>
            </tr>
<?php endif; ?>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-12 text-center">
            <a class="more" href="pratique.php"><i class="fa fa-chevron-circle-right fa-2x white"></i></a>
          </div>
        </div>
      </div>
    </section>
    

    <!--Latest News-->
    <section id="latest-news" class="section">
      <div class="container">
        <div class="row margin-40">
          <div class="col-sm-12 text-center dark-gray">
            <h3>Dernières News</h3>
          </div>
        </div>
        
        <div class="row">
          
          <!--News Article-->
          <div class="col-sm-3 text-center">
            <div class="latest-article">
            <img src="img/latest-news1.jpg" class="img-responsive" alt="Title">
            <p>C'est les vacances profitez en pour venir jouez sur notre serveur :)</p><br />
            <a class="more" href="http://themearmada.com/demos/lava/bootstrap3/multipage/individual-blog.html"><i class="fa fa-chevron-circle-right fa-2x gray margin-20"></i></a>
            </div>
          </div>
          
          <!--News Article-->
          <div class="col-sm-3 text-center">
            <div class="latest-article">
            <img src="img/latest-news2.jpg" class="img-responsive" alt="Title">
            <p>Et si il était leur d'une révolution passons du pvp au rp</p><br />
            <a class="more" href="http://themearmada.com/demos/lava/bootstrap3/multipage/individual-blog.html"><i class="fa fa-chevron-circle-right fa-2x gray margin-20"></i></a>
            </div>
          </div>
          
          <!--News Article-->
          <div class="col-sm-3 text-center">
            <div class="latest-article">
            <img src="img/latest-news3.jpg" class="img-responsive" alt="Title">
            <p>De plus en plus de joueur pour vous remerciez .</p><br />
            <a class="more" href="http://themearmada.com/demos/lava/bootstrap3/multipage/individual-blog.html"><i class="fa fa-chevron-circle-right fa-2x gray margin-20"></i></a>
            </div>
          </div>
          
          <!--News Article-->
          <div class="col-sm-3 text-center">
            <div class="latest-article">
            <img src="img/latest-news4.jpg" class="img-responsive" alt="Title">
            <p>OUverture prochaine du serveur ! Bientot on arrive au but !</p><br />
            <a class="more" href="http://themearmada.com/demos/lava/bootstrap3/multipage/individual-blog.html"><i class="fa fa-chevron-circle-right fa-2x gray margin-20"></i></a>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <!--Testimonial Section-->
    <section id="testimonial" class="section">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 margin-30">
            <img src="img/testimonial-img.png" alt="Title">
          </div>
          
          <div class="col-sm-9">
            <h2>“J'adore ce serveur rejoignez nous dessus :) ”</h2>
            <div class="testimonial-source pull-right">Thomas L'explorateur</div>
          </div>
        </div>
      </div>
    </section>

<script>
      !function ($) {
        $(function(){
          $('#header').carousel()
        })
      }(window.jQuery)
    </script>
<?php
include 'include/footer.php';
?>    
