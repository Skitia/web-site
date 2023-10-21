<?php
if(isset($_POST['character'])){
  $character = $_POST['character'];
require_once('../database.php');
ini_set('display_errors', 1);
$query = "SELECT Strength,Dexterity,Constitution,Intelligence,Wisdom,Charisma FROM `Character` where character_name = '$character'";
$result = $db->query($query);
if ($result) {
  $characterData = mysqli_fetch_assoc($result);
  $characterData['Strength'] = (int)$characterData['Strength'];
  $characterData['Dexterity'] = (int)$characterData['Dexterity'];
  $characterData['Constitution'] = (int)$characterData['Constitution'];
  $characterData['Intelligence'] = (int)$characterData['Intelligence'];
  $characterData['Wisdom'] = (int)$characterData['Wisdom'];
  $characterData['Charisma'] = (int)$characterData['Charisma'];
  echo json_encode($characterData);
} else {
  //echo json_encode($_POST['character']);
  echo json_encode(array('error' => 'Failed to retrieve character data.'));
}
}
