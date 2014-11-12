<?php
$title = 'Mon Compte';
include 'include/header.php';
if($_SESSION['pseudo'])
{
if(isset($_POST) && isset($_POST['pass1']) AND isset($_POST['pass2'])){
 if($_POST['pass1'] == $_POST['pass2']){
   $pass = sha1($_POST['pass1']);
   $req = $connexion->prepare('UPDATE membre SET pass=:pass WHERE pseudo=:pseudo');
   $req->execute(array('pass' => $pass, 'pseudo' => $_SESSION['pseudo']));
   $okm = 'Le mot de passe à bien été changé';
}
}
if(isset($_POST) && isset($_POST['pseudog']) AND !empty($_POST['pseudog'])){
   $req1 = $connexion->prepare('UPDATE membre SET pseudog=:pseudog WHERE pseudo=:pseudo');
   $req1->execute(array('pseudog' => $_POST['pseudog'], 'pseudo' => $_SESSION['pseudo']));
   $okp = 'Modification effectuée';
}
$req = $connexion->prepare('SELECT credit, pseudog FROM membre WHERE pseudo = :pseudo');
$req->execute(array('pseudo' => $_SESSION['pseudo']));
while ($donnees = $req->fetch()){

?>
    <!--Content-->
    <section id="content1" class="section">
      <div class="container">
        <div class="row margin-40">
          <div class="col-sm-12">
            <h3>Bonjour <?php echo $_SESSION['pseudo'];?></h3>
            <p class="lead">Vous voici sur votre espace membre</p>
            <?php
             if (isset($okm)) {
             echo '<div class="alert alert-success" role="alert"><strong>Succès !</strong> ';
             echo $okm;
             echo '</div>';
           } 
            ?>
            <?php
             if (isset($okp)) {
             echo '<div class="alert alert-success" role="alert"><strong>Succès !</strong> ';
             echo $okp;
             echo '</div>';
           } 
            ?>
           </div>
        </div>
        
        <div class="row margin-40">
          <div class="col-sm-4">
            <h3>Boutique</h3>
            <p>Vous avez actuellement <b><?php echo $donnees['credit'];?></b> points boutique à utiliser</p>
            <form action="credit.php" method='post'>
            <button type="submit" class="btn-main"><i class="fa fa-tags"></i> Acheter </button>
            </form>
          </div>
          
          <div class="col-sm-4">
            <h3>Pseudo InGame</h3>
            <?php if(!empty($donnees['pseudog'])){ ?>
            <p>Votre pseudo en jeu est <b><?php echo $donnees['pseudog'];?></b> pour le changer cliquez sur changer.</p>
            <button type="submit" class="btn-main" data-toggle="modal" data-target="#changepg"><i class="fa fa-rocket"></i> Changer </button>
            <?php }else { ?>
            <p>Vous n'avez pas encore défini votre pseudo en jeu cliquez sur définir.</p>
            <button type="submit" class="btn-main" data-toggle="modal" data-target="#changepg"><i class="fa fa-rocket"></i> Définir </button>
            <?php }?>
          </div>
          <div class="col-sm-4">
            <h3>Mot de passe</h3>
            <p>Pour changer de mot de passe cliquer sur le bouton ci dessous</p>
            <button type="submit" class="btn-main" data-toggle="modal" data-target="#changemdp"><i class="fa fa-key"></i> Changer </button>
          </div>
          <div class="col-sm-12">
          </br>
          </div>
        </div>
<!--Modal M -->    
<div class="modal fade" id="changemdp" tabindex="-1" role="dialog" aria-labelledby="chagemdp" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
        <h4 class="modal-title" id="changemdp">Chnager son mot de passe</h4>
      </div>
      <div class="modal-body">
       <form id="signup-form" class="form-horizontal" method="post" action="compte.php">
              <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                     <span class="add-on"><i class="fa fa-lock"></i></span>
                    <input type="password" class="input-xlarge" id="pass1" name="pass1" placeholder="Nouveau mot de passe">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                     <span class="add-on"><i class="fa fa-lock"></i></span>
                    <input type="password" class="input-xlarge" id="pass2" name="pass2" placeholder="Confirmation mot de passe">
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Changer</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--Modal M fin -->         </div>
<!--Modal PG-->    
<div class="modal fade" id="changepg" tabindex="-1" role="dialog" aria-labelledby="chagepg" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
        <h4 class="modal-title" id="changemdp">Modifier pseudo InGame</h4>
      </div>
      <div class="modal-body">
       <form id="signup-form" class="form-horizontal" method="post" action="compte.php">
              <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                     <span class="add-on"><i class="fa fa-rocket"></i></span>
                    <input type="text" class="input-xlarge" id="pseudog" name="pseudog" placeholder="Pseudo en jeu">
                  </div>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--Modal PG fin --> 

-
      
    </section>
<?php 
}
}
else
{
header('Location: login.php'); 
}
include 'include/footer.php';
?>