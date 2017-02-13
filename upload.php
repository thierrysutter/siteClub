<?php

// If you want to ignore the uploaded files,
// set $demo_mode to true;

$demo_mode = false;
//$upload_dir = 'uploads/';
$upload_dir = 'images/article/tmp/';
$allowed_ext = array('jpg','jpeg','png','gif');


if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Erreur! Mauvaise méthode HTTP!');
}


if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){

	$pic = $_FILES['pic'];

	if(!in_array(get_extension($pic['name']),$allowed_ext)){
		exit_status('Seuls les formats images sont autorisés ('.implode(',',$allowed_ext).') !');
	}

	if($demo_mode){

		// File uploads are ignored. We only log them.

		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);

		exit_status('Mode démo activé.');
	}


	// Move the uploaded file from the temporary
	// directory to the uploads folder:

	if(move_uploaded_file($pic['tmp_name'], $upload_dir.$pic['name'])){
		exit_status('Fichier téléchargé avec succés !');
	}

}

exit_status('Erreur pendant le téléchargement des photos!');


// Helper functions

function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}

function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}
?>