<?php
	
	// Reporte toutes les erreurs PHP (Voir l'historique des modifications)
	$va_params = parse_ini_file("users.conf",true);

	$pafi_ext_db_params = $va_params["pafi_ext_db_params"];
	$vs_joomla_path = $pafi_ext_db_params["joomla_path"];

	define( '_JEXEC', 1 );
	define('JPATH_BASE', $vs_joomla_path);
	define( 'DS', DIRECTORY_SEPARATOR );
	require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
	
	//print JPATH_BASE .DS.'includes'.DS.'defines.php';
	/* Create the Application */
	$app = JFactory::getApplication('site');
	// JFactory
	require_once (JPATH_BASE .'/libraries/joomla/factory.php');
	$user = JFactory::getUser();

	if ($user->id == 0) {
		print json_encode(array("result"=>"ko"));
	} else {
		print json_encode(array("result"=>"ok", "username"=>$user->username, "name"=>$user->name, "email"=>$user->email));
	}
