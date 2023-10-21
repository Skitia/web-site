<?php 
ini_set('display_errors', 1);
require_once('../database.php');
/* required files */
 require '../phpmailer/PHPMailerAutoload.php';
 $query = "SELECT Mod_Name From Mods order by Mod_ID;";
 $results = $db->query($query);
?>

<link rel="stylesheet" type="text/css" href="css/footer.css">
<footer>
  <h1 id = "modFootHead">
    <a href="mods.php" target = "_top">Mods</a>
</h1>
<div class =  "modFoot">
  <?php foreach($results as $key => $r){ 
    if($key == 0){ ?>
  <a href = "mods.php"><?php echo $r['Mod_Name'];?></a> |
  <?php } else if($key == mysqli_num_rows($results) -1){ ?>
    <a href = "mods.php?startSlide=<?php echo $i; ?>"><?php echo $r['Mod_Name'];?></a> 
    <?php } else{ $i = 1 + $key; ?>
    <a href = "mods.php?startSlide=<?php echo $i; ?>"><?php echo $r['Mod_Name'];?></a> |
  <?php } ?>
<?php } ?>
</div>
<br>

<h1 id = "footHead"><a href="#" target = "_top">§<span class = "logoUnderline">kitia's</span> §<span class = "logoUnderline">tories</span>   </a></h1>


<div id = "footContent">
      <a href="mods.php" target = "_top">Mods </a> |
        <a href="about.html" target = "_top">About </a> |
 <a href="https://forums.beamdog.com/profile/Skitia" target = "_top">Beamdog Forums </a> |
<a href = "contact.php" target = "_top" >Contact </a> |
<a href="https://discord.gg/KwFrmBXs8N" target = "_blank">Discord</a>
     </div>
</footer>