<?php
require __DIR__.'/header.php';

if (isset($_SESSION['id'])) {

    $characterRepository = new CharacterRepository($base);
    $myCharacter = $characterRepository->find($_SESSION['id']);
    $enemy = $characterRepository->find($_GET['id']);

    echo $myCharacter->getName() . " attaque ". $enemy->getName();
}

require __DIR__.'/footer.php';
?>
