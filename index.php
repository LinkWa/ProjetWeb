<?php
require __DIR__.'/header.php';

use App\CharacterRepository;


if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
    ?>

    <?php

    $listOfCharacter = $characterRepository->findAllWithoutMe($_SESSION['id']);
    foreach ($listOfCharacter as $character):?>
      <?= $character->getName();?> : Action disponible <a href="attaque.php?id=<?= $character->getId();?>">Attaque</a> - <a href="heal.php?id=<?= $character->getId();?>">Soin</a><br>
    <?php endforeach;
}




require __DIR__.'/footer.php';

?>
