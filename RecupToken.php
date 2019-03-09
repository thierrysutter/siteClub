<?php
session_start();
//require_once("php-graph-sdk-5.x/src/Facebook/autoload.php");
require_once 'php-graph-sdk-5.x/src/Facebook/autoload.php';
/*$fb = new Facebook\Facebook([
		'app_id' => "566469467056156",
		'app_secret' => "879f6dfa85fe20704091a1035eb3849c",
		'default_graph_version' => 'v2.9',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','publish_pages','manage_pages','user_friends','public_profile']; // Optional permissions

$loginUrl = $helper->getLoginUrl('http://www.assaintjulienlesmetz.com/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
*/

$APP_ID_ENV_NAME= "566469467056156";

$facebook = new \Facebook\Facebook(array(
		'appId'  => '566469467056156',
		'secret' => '879f6dfa85fe20704091a1035eb3849c',
		'cookie' => true,
));

echo "coucou<br/>";


$helper = $facebook->getRedirectLoginHelper();

$permissions = ['email','publish_pages','manage_pages','user_friends','public_profile']; // Optional permissions

$loginUrl = $helper->getLoginUrl('http://www.assaintjulienlesmetz.com/fb-callback.php', $permissions);

echo "salut<br/>";
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
/*
$login_params = array(
		'scope' => 'manage_pages,publish_stream',
		'redirect_uri' => 'http://www.facebook.com/AsStJulien/'
);

$token = $facebook->getAccessToken();
$page_id = 522218387821223;

$args = array(
		'access_token'  =>  $token,
		'message'       =>  'message',
		'link'          =>  'link',
		'caption'       =>  'caption',
		'description'   =>  'description',
);

$post_id = $facebook->api("/".$page_id."/feed","post",$args);*/
?>