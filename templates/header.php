<?php
$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
if($inFolder){
    $url = $url . $folderName;
}

function navbar($links) {
    foreach ($links as $slug => $name) {
        $li = "li";
        if ($GLOBALS['title'] == $name) {
            $li .= ' class="active"';
        }
        echo "<$li><a href=\"{$GLOBALS['url']}/$slug\">$name</a></li>\n";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Radio GaGa - Enjoy The Greatest Hits" />
    <meta name="author" content="Duncan Sterken" />
    <title><?php echo !empty($title) ? htmlentities($title)." | Radio Gaga" : "Radio Gaga - Enjoy The Greatest Hits"; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/style/style.css" />
  </head>
  <body>
    <header id="header">
      <div id="logo">
        <a href="<?php echo $url; ?>/home">Radio GaGa.</a>
      </div>
      <nav id="main-nav">
        <ul>
          <?php navbar(array(
            "home"    => "Home",
            "playlist" => "Playlist",
          ));?>
        </ul>
      </nav>
    </header>
