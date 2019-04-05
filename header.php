<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use App\CharacterRepository;
use App\Character;

$base = new PDO('mysql:host=localhost;dbname=project3il', 'projetAnto', '123456789');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

if (isset($_SESSION['id'])) {
  $characterRepository = new CharacterRepository($base);
  $character = $characterRepository->find($_SESSION['id']);

  if ($character->getState() === Character::DEAD) {
        echo "Vous êtes mort mais rien n'est fini pour vous !";
        $character->setHp($character->getHpMax());
        $characterRepository->update($character);
    }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Mon jeu</title>

  <link rel="stylesheet" href="style.css">

</head>
<body>
  <?php
  include("menu.php");
  ?>
