<?php
$title = 'Inscription';
include 'include/header.php'; 

if(isset($_POST) && isset($_POST['pseudo']) && isset($_POST['email'])
 && isset($_POST['pass'])){

  if(get_magic_quotes_gpc()){
    $_POST['pseudo'] = stripslashes(trim($_POST['nom']));
    $_POST['email'] = stripslashes(trim($_POST['prenom']));
    $_POST['pass'] = stripslashes(trim($_POST['email']));
                           }
     if(!empty($_POST['pseudo'])){
     if(!empty($_POST['email'])){
     if(!empty($_POST['pass'])){}} 
     if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

    $id_membre = '';
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

    $req = $connexion->query("SELECT pseudo FROM membre WHERE pseudo='$pseudo'");
    $chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo > '1')
    {
        $erreur4 = 'Ce pseudo existe déjà !';
    }else{ 
    $req = $connexion->query("SELECT email FROM membre WHERE email='$email'");
    $chk_email = $req->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST) && $chk_email == '1' || $chk_email > '1')
    {
        $erreur3 = 'Cet email existe déjà !';
    }else{   

    if($i = $connexion->prepare("
      INSERT INTO membre (id_membre,pseudo,email,pass)
      VALUES (:id_membre,:pseudo,:email,:pass)")
    )

    $i->bindParam(':id_membre', $id_membre);
    $i->bindParam(':pseudo', $pseudo);
    $i->bindParam(':email', $email);
    $i->bindParam(':pass', $pass);
    $i->execute();

    $ok = 'Inscription réussi';
        }
        }
  }else{

    $erreur1 = 'Veuillez entrer une adresse électronique valide';

       }
  }else{

    $erreur2 = 'Veuillez remplir tous les champs';  
      
       } 
}
?>
    <!--Content-->
    <section id="signup">
      <div class="container">
        <div class="row margin-40">
          
            <div class="col-sm-6 col-sm-offset-3 text-center signup">
             <?php
             if (isset($ok)) {
             echo '<div class="alert alert-success" role="alert"><strong>Succès !</strong> ';
             echo $ok;
             echo ' Redirection en cours';
             echo '<meta http-equiv="refresh" content="3; URL=login.php">';
             echo '</div>';
           } 
            ?>
             <?php
             if (isset($erreur1)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreur1;
             echo '</div>';
           } 
            ?>
            <?php
             if (isset($erreur2)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreur2;
             echo '</div>';
           } 
            ?>
            <?php
             if (isset($erreur3)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreur3;
             echo '</div>';
           } 
            ?>
            <?php
             if (isset($erreur4)) {
             echo '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> ';
             echo $erreur4;
             echo '</div>';
           } 
            ?>
              <h3>Inscription</h3><br />
              
              <form id="signup-form" class="form-horizontal" method="post" action="register.php">
          		<div class="control-group">
          			<div class="controls">
          			    <div class="input-prepend">
          			     <span class="add-on"><i class="fa fa-user"></i></span>
          					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant">
          				</div>
          			</div>
          		</div>
          		          		
          		<div class="control-group">
          			<div class="controls">
          			    <div class="input-prepend">
          				<span class="add-on"><i class="fa fa-envelope"></i></span>
          					<input type="text" id="email" name="email" placeholder="Email">
          				</div>
          			</div>
          		</div>
          		
          		<div class="control-group">
          			<div class="controls">
          			    <div class="input-prepend">
          				<span class="add-on"><i class="fa fa-lock"></i></span>
          					<input type="Password" id="pass" name="pass" placeholder="Mot de passe">
          				</div>
          			</div>
          		</div>
          
          		<div class="control-group">
          	      <div class="controls">
          	       <button type="submit" class="btn-main"><i class="fa fa-user"></i> Créer mon compte</button>
          	      </div>
          	      <a class="small-message" href="login.php"><small>Déjà enregistré ?</small></a>
          	  </div>
      
          	  </form>

      	  
          </div><!--End Col 6-->
          
        </div><!--End Row-->
      </div><!--End Container-->
    </section>
<?php
include 'include/footer.php';
?>