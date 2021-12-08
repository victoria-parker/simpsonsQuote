<?php
    ini_set('date.timezone','Europe/Dublin');
    require 'classes/Character.php';
    require 'logs/log.php';
    $Character=new Character;
    $Character->showCharacter();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Random Simpsons Quote</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1><span id="theSimpsons">The Simpsons</span> Quotes</h1>
    <h3><?=$Character->getCharacter()?></h3>
    <div id="container">
        <?php
        if($Character->getCharacter() == "Rainier Wolfcastle"){
        ?>
        <div><div class="bubble bubble-bottom-Left"><?=$Character->getQuote()?></div></div>
        <div class="image"><img src="<?=$Character->getImage()?>" alt=""></div>
        <?php
        }else{
        ?>
        <div><div class="bubble bubble-bottom-<?=$Character->getCharacterDirection()?>"><?=$Character->getQuote()?></div></div>
        <div class="image"><img src="<?=$Character->getImage()?>" alt=""></div>
        <?php
        }
        ?>
    </div>
</body>
</html>