<?php
require __DIR__.'/header.php';
use App\Character;
use App\CharacterRepository;
use App\CharacterLogRepository;

if (isset($_SESSION['id'])) {

    $characterRepository = new CharacterRepository($base);
    $myCharacter = $characterRepository->find($_SESSION['id']);
    $enemy = $characterRepository->find($_GET['id']);

    if ($enemy->getState() === Character::DEAD) {
        echo "Vous venez de découvrir un corp sans vie ...";
    } else {
        if ($myCharacter->getAp() >= Character::ATTAQUE_COST) {

            // Point d'action
            $myCharacter->setAp($myCharacter->getAp() - Character::ATTAQUE_COST);
            $myCharacter->addExperience(100);

            // Attaque
            $damage = rand(1,100);
            $hp = $enemy->getHp() - $damage;
            $enemy->setHp($hp);

            $message = $myCharacter->getName() . " attaque ". $enemy->getName(). " pour " . $damage ." de dommage <br>";
            // J'enregistre les logs dans chaques journal
            $characterLogRepository = new CharacterLogRepository($base);
            $characterLogRepository->add($myCharacter, $message);
            $characterLogRepository->add($enemy, $message);

            echo $message;

            if ($enemy->getState() === Character::DEAD) {
                echo $enemy->getName(). " est mort";
                $myCharacter->addExperience(500);
            }

            // Enregistrement des données
            $characterRepository->update($myCharacter);
            $characterRepository->update($enemy);

        } else {
            echo "Vous n'avez pas assez de point d'action";
        }
    }
  }

require __DIR__.'/footer.php';
?>
