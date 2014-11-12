<?php
$title = 'Connexion';
include 'include/header.php'; 
if(isset($_POST) && isset($_POST['pseudo']) AND isset($_POST['pass'])){
  $y = $connexion->prepare('SELECT COUNT(*) FROM membre WHERE pseudo = ?');
  $y->execute(array($_POST['pseudo']));
  $x = $y->fetch();
  if ($x[0] == 0){
    $erreurp = 'Ce pseudo n\'existe pas';
  }else{
    $e = $connexion->prepare('SELECT pass FROM membre WHERE pseudo = ?');
    $e->execute(array($_POST['pseudo']));
    $rep = $e->fetch();
    $pass = sha1($_POST['pass']);

    if ($pass == $rep['pass']){
      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
      header('Location: compte.php'); 
    }else{
      $erreurm = 'Mot de passe incorrect';
    }
  }

}
?>
 <!--Content-->
    <section id="signup">
      <div class="container">
        <div class="row margin-40">
          
            <div class="col-sm-6 col-sm-offset-3 text-center signup">
            <?php
             if (isset($erreurp)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreurp;
             echo '</div>';
           } 
            ?>
            <?php
             if (isset($erreurm)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreurm;
             echo '</div>';
           } 
            ?>
              <h3>Connexion</h3><br />
              
              <form id="signup-form" class="form-horizontal" method="post" action="login.php">
          		<div class="control-group">
          			<div class="controls">
          			    <div class="input-prepend">
          			     <span class="add-on"><i class="fa fa-user"></i></span>
          					<input type="text" class="input-xlarge" id="pseudo" name="pseudo" placeholder="Utilisateur">
          				</div>
          			</div>
          		</div>
          		          		          		
          		<div class="control-group">
          			<div class="controls">
          			    <div class="input-prepend">
          				<span class="add-on"><i class="fa fa-lock"></i></span>
          					<input type="Password" id="pass" class="input-xlarge" name="pass" placeholder="Mot de passe">
          				</div>
          			</div>
          		</div>
          
          		<div class="control-group">
          	      <div class="controls">
          	       <button type="submit" class="btn-main"><i class="fa fa-sign-in"></i> Connexion </button>
          	      </div>
          	      <a class="small-message" href="register.php"><small>Besoin d'un compte ?</small></a>
          	  </div>
      
          	  </form>
      	  
          </div><!--End Span6-->
          
        </div><!--End Row-->
      </div><!--End Container-->
    </section>
<?php
include 'include/footer.php';
?>