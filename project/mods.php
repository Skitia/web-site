<?php 
require_once('../database.php');
ini_set('display_errors', 1);
$query = "SELECT Mod_Name,Mod_Type,Mod_Header,Mod_Support_Link,Mod_Subtitle,Mod_Image_Link,Character_Name,Alignment,Race,Class,Mod_Description,GROUP_CONCAT(CONCAT(Game, ': ', Download_Link) SEPARATOR ', ') AS Game_And_Downloads,GROUP_CONCAT(CONCAT(Audio_Type, ': ', Audio_Link) SEPARATOR ', ') AS Audio_And_Type FROM Mods LEFT JOIN `Character` as c on c.Mod_ID = Mods.Mod_ID LEFT JOIN Audio as a on a.Mod_ID = Mods.Mod_ID JOIN Downloads as d on d.Mod_ID = Mods.Mod_ID group by Mods.MOD_ID";
$results = $db->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Emily Helga Isaac Kale Nalia At Last Recorder Vienxay Wings  are all NPC mods you can download for Baldur's Gate.">
 <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Lato&display=swap" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/main.css"> 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Mods</title>
</head>
<body>
  <div id="header-container"></div>
  <div id = "mods-container">
   <h1>
 Skiita's Mods
  </h1>
  <div class = "dots">
    <?php $i = 1; foreach($results as $r){
   echo '<span class="dot" onclick="currentSlide(' . $i . ')"></span>';
  $i++;
    } ?>
  </div> 
  <?php foreach($results as $r){ ?>
    <div class = "slide-container">
  <div class = "container-wrapper">
  <?php if($r['Mod_Type'] == 'npc'){ ?>

<div class = "image-container">
<?php } else { ?>
  <div class = "image-container-solo">
  <?php } ?>
  <img src = "img/<?php echo $r['Mod_Image_Link']?>">
    <div class = "overlay">
      <?php if($r['Mod_Type'] == 'npc'){ ?>
    <div class = "top-text"><p><?php echo $r['Character_Name'];?></p></div>
  <div class = "bot-text"><p><?php echo $r['Race'] . ' ' . $r['Class'];?></p></div>
  <?php } else { ?>
    <div class = "top-text"><p><?php echo $r['Mod_Name'];?></p></div>
  <div class = "bot-text"><p><?php echo $r['Mod_Subtitle'];?></p></div>
    <?php } ?>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
</div>
<?php if($r['Mod_Type'] == 'npc'){ ?>
<div class = "chart-container">
  <h2><?php echo $r['Alignment'];?></h2>


<div class = "mod-chart" id = "<?php echo strtolower($r['Character_Name']) . '-chart';?>" data-character-name="<?php echo $r['Character_Name']; ?>">

</div>
</div>
<?php } ?>
</div>
<div class = "text-container">
<h2><?php echo $r['Mod_Header'];?></h2>
 
  <pre class = "mod-info"><?php echo $r['Mod_Description'];?>    
</pre>
<div class = "audio-container">
<?php if($r['Mod_Type'] == 'npc'){ 
  $gameAudios = explode(', ', $r['Audio_And_Type']);
  $music = [];
  $voice = [];
  foreach ($gameAudios as $gameAudio) {
  list($sound, $link) = explode(': ', $gameAudio, 2);
    if ($sound == 'voice') {
        $voice[] = $link; // Add to the voice array
    } elseif ($sound == 'music') {
        $music[] = $link; // Add to the music array
    }
  }
 ?>
  <div class = "voice-container">
  <h2>Voice Sample</h2>
<audio controls="">
  <source src="<?php echo "audio/" . $voice[0] . ".mp3"; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</div>


<div class = "music-container">
<h2>Music Sample</h2>
<audio controls="">
  <source src="<?php echo "audio/" . $music[0] . ".mp3"; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</div>
<?php } ?>
</div>
<div class = "mod-action">
<a href="<?php echo $r['Mod_Support_Link']; ?>">
  <button class = "quick-button">
    More Info
  </button>
</a>
<?php

    $gameDownloads = explode(', ', $r['Game_And_Downloads']);
    $downloadedBGEE = false;
    $downloadedBG2EE = false;
    
    foreach ($gameDownloads as $gameDownload) {
        list($game, $link) = explode(': ', $gameDownload, 2);
    
        if ($game == 'BGEE' || $game == 'BGEE|SoD' || $game == 'SoD') {
            if (!$downloadedBGEE) {
                $downloadedBGEE = true;
                ?>
                <a href="<?php echo $link; ?>" download>
                    <button class="quick-button">
                        Download for BG:EE & SoD
                    </button>
                </a>
                <?php
            }
        }
    
        if ($game == 'BG2EE' && !$downloadedBG2EE) {
            $downloadedBG2EE = true;
            ?>
            <a href="<?php echo $link; ?>" download>
                <button class="quick-button">
                    Download For BG:2EE
                </button>
            </a>
            <?php
        }
    }
    ?>
</div>
</div>
</div>
<?php } ?> 
  </div>
  <div id="footer-container"></div>
</body>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src = "js/mods.js"></script>
</html>