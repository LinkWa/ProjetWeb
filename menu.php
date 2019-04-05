<nav class="menu">
  <a href="index.php">Index</a>
  <?php
  if (isset($_SESSION['id'])) :?>
  <a href="journal.php">Journal</a>
  <a href="deconnection.php">Déconnection</a>
  <div>
    HP : <?= $character->getHp(); ?>, AP : <?= $character->getAp(); ?>
  </div>
<?php else: ?>
  <a href="inscription.php">Inscription</a>
  <a href="connexion.php">Connexion</a>
<?php endif ?>

</nav>
