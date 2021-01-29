<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Warrior('Cloud');
$player2 = new Magician('Vivi');
$player3 = new Archer('Fran');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Baston</title>
</head>
<body>
    <h1>Baston !</h1>
    <div class="global">
        <div class="firstPlayerImg">
            <img src="img/cloud.png" alt="" id="firstPlayerImg">
        </div>
        <div class="fight">
            <?php while ($player1->isAlive() && $player3->isAlive()): ?>
                <p><?= $player1->turn($player3) ?></p>
                <?php $result = "$player1->name a gagné !" ?>
                <?php if ($player3->isAlive()): ?>
                    <p><?= $player3->turn($player1) ?></p>
                    <?php $result = "$player3->name a gagné !" ?>
                <?php endif ?>
            <?php endwhile ?>
            <p id="victory"><?= $result ?></p>
        </div>
        <div class="secondPlayerImg">
            <img src="img/fran.png" alt="">
        </div>
    </div>
</body>
</html>
