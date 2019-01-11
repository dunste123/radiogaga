<?php 
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //Get the current url
$url = parse_url($url)['path']; //extract the path from the url
$inFolder = count(explode('/', $_SERVER['REQUEST_URI'])) > 2; //Check if we are in a sub dir
$folderName = substr($url, 0, strrpos( $url, '/')); //If we are in a sub dir, remove everything after the last / and feed it into our code

$page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : "home";
$title = ucfirst($page);

include_once("templates/header.php");

if(file_exists("pages/{$page}.php")) {
  require("pages/{$page}.php");
} else {
  echo '<div class="container"><h1>404 Not Found</h1></div>';
}

include_once("templates/footer.php");
