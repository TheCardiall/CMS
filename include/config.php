<?php

// Config Générale

$srvnom = 'MCPE CMS'; // Nom de votre serveur
$urllogo = 'img/logo.png'; // Adresse du logo (si adresse web ne pas oublier http://)
$fb = 'http://facebook.com/votrepage'; // Adresse de votre page facebook
$tw = 'http://twitter.com/antoinecardiall'; // Adresse de votre compte twitter
$ip = '62.210.48.57'; // Adresse publique de votre serveur
$port = '19164'; // Port publique de votre serveur
$queryport = '19164'; // Port du Query (peut être similaire au port de connexion , ce port ne sera pas divulgué)
$rconport = '19131'; // Port du rcon pour l'échange de donnée entre le serveur et le site web (peut être similaire au port de connexion)
$rconpass = 'thisismdp'; // Mot de passe de connexion au Rcon

// Config Base de donnée

try {
  $dns = 'mysql:host=localhost;dbname=mcpe'; // Host = Adresse de la base de donnée Dbname = Nom de la base de donnée
  $utilisateur = 'root'; // Utilisateur ayant accès à la base de donnée
  $motDePasse = ''; // Mot de passe de ce même utilisateur
  $connexion = new PDO( $dns, $utilisateur, $motDePasse ); // Requète SQl ne pas toucher
} catch ( Exception $e ) {
  echo "Connexion à MySQL impossible : ", $e->getMessage();
  die();
}

// Connexion Query ne pas toucher

	// Ne pas toucher
	define( 'MQ_SERVER_ADDR', $ip );
	define( 'MQ_SERVER_PORT', $queryport );
	define( 'MQ_TIMEOUT', 1 );
	
	// Ne pas toucher
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );
	
	require __DIR__ . '/query/MinecraftQuery.class.php';
	
	$Timer = MicroTime( true );
	
	$Query = new MinecraftQuery( );
	
	try
	{
		$Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
	}
	catch( MinecraftQueryException $e )
	{
		$Exception = $e;
	}
	
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );