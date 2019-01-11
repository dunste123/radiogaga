<?php
$albums = [
  'Andrew Huang - Cosmic' => [
    'artist' => 'Andrew Huang',
    'image' => 'Folder.jpg',
    'poster' => 'cover.jpg',
    'tracks' => [
      'Betelgeuse' => [
        'file' => 'Andrew Huang - Cosmic - 01 Betelgeuse.mp3',
        'length' => '03:12',
      ],
      'Big Box' => [
        'file' => 'Andrew Huang - Cosmic - 02 Big Box.mp3',
        'length' => '03:48',
      ],
      'Touch Down' => [
        'file' => 'Andrew Huang - Cosmic - 03 Touch Down.mp3',
        'length' => '03:08',
      ],
    ],
  ],

  'Andrew Huang - Cosmos' => [
    'artist' => 'Andrew Huang',
    'image' => 'Folder.jpg',
    'poster' => 'cover.jpg',
    'tracks' => [
      'Go Wild' => [
        'file' => 'Andrew Huang - Cosmos - 01 Go Wild.mp3',
        'length' => '03:42',
      ],
      'Shadow 1' => [
        'file' => 'Andrew Huang - Cosmos - 02 Shadow 1.mp3',
        'length' => '03:33',
      ],
      'Know U' => [
        'file' => 'Andrew Huang - Cosmos - 03 Know U.mp3',
        'length' => '03:53',
      ],
    ],
  ],

  'Andrew Huang - Galaxy' => [
    'artist' => 'Andrew Huang',
    'image' => 'Folder.jpg',
    'poster' => 'cover.jpg',
    'tracks' => [
      'Mercury Suit' => [
        'file' => 'Andrew Huang - Galaxy - 01 Mercury Suit.mp3',
        'length' => '01:19',
      ],
      'Ragworm' => [
        'file' => 'Andrew Huang - Galaxy - 02 Ragworm.mp3',
        'length' => '02:36',
      ],
      'Orbit' => [
        'file' => 'Andrew Huang - Galaxy - 03 Orbit.mp3',
        'length' => '02:24',
      ],
    ],
  ],

];
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/style/customPlayer.css" />
<div class="media">
  <div class="playerBox">
  <?php
    $index = 0;
    foreach ($albums as $album => $data) {
    ?>
      <div id="<?php echo $album; ?>_data" <?php if($index>0){echo 'style="display: none;"';} ?> >
        <h2 class="title"><?php echo $album; ?></h2>
        <div class="videoPlayer">
          <video controls autoload="true" poster="<?php echo $url;?>/album/<?php echo $album; ?>/<?php echo $data['poster']; ?>">
            <source src="<?php echo $url;?>/album/<?php echo $album; ?>_vid.mp4" type="video/mp4">
          </video>
        </div>
        <div class="playlist">
          <div class="list">
            <table>
              <thead>
                <tr>
                  <th>Track</th>
                  <th>Title</th>
                  <th>Length</th>
                  <th>Play</th>
                </tr>
              </thead>
              <?php  $i=1;
                foreach ($data['tracks'] as $track => $trackData) {
                  echo '<tr>';
                    echo "<td>$i</td>";
                    echo "<td>$track</td>";
                    echo "<td>{$trackData['length']}</td>";
                    echo '<td style="cursor: pointer;" onclick="loadNewTrack(\''.$url.'/album/'.$album.'/'.$trackData['file'].'\', \''.$url.'/album/'.$album.'/'.$data['image'].'\', \''.$track.'\');">» play</td>';
                  echo "</tr>";
                  $i++;
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    <?php
    $index++;
    }
	  $firstAlbum = current(array_keys($albums));
    ?>
	 <div class="audioPlayer">
      <div class="audio-player">
          <h1 id="title"><?php echo array_keys($albums[$firstAlbum]['tracks'])[0]; ?></h1>
          <img class="cover" id="player_cover" src="<?php echo $url;?>/album/<?php echo $firstAlbum; ?>/<?php echo $albums[$firstAlbum]['image']; ?>" alt="">
          <audio id="audio_player" src="<?php echo $url;?>/album/<?php echo $firstAlbum; ?>/<?php echo array_column($albums[$firstAlbum]['tracks'], 'file')[0]; ?>" type="audio/mp3" controls="controls" preload="auto"></audio>
      </div>
     </div>
  </div>
  <div class="albums">
    <ul>
    <?php
    foreach ($albums as $album => $albumData) {
    ?>
    <li>
      <a onclick=
      "<?php
      foreach($albums as $albumCheck => $albumDataCheck){
        if($album == $albumCheck){
            echo '_(\''.$albumCheck.'_data\').style.display=\'block\';';
        }else{
          echo '_(\''.$albumCheck.'_data\').style.display=\'none\';';
        }
      }
      ?>">
        <img src="<?php echo $url;?>/album/<?php echo $album; ?>/<?php echo $albumData['image']; ?>"  alt="<?php echo $album; ?>" title="<?php echo $album; ?>" />
      </a>
    </li>
    <?php
    }
    ?>
    </ul>
  </div>
  <div class="clearfix"></div>
</div>
<script>
  function loadNewTrack(trackUrl, imgUrl, newTitle){
    var audioName = "audio_player";
    _(audioName).pause(); 
    _(audioName).src= trackUrl; 
    _('title').innerHTML = newTitle;
    _('player_cover').src = imgUrl;
    _(audioName).play();
  }
  window.addEventListener("load", function(){
			$("#audio_player").mediaelementplayer({
        classPrefix: "mejs-",
        setDimensions: false,
        startVolume: 0.2,
				alwaysShowControls: false,
				features: ['playpause','volume','progress'],
				audioVolume: 'horizontal',
        audioWidth: 630,
				audioHeight: 120
      });
  });
</script>