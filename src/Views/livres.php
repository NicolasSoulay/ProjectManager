<?php
echo $message . "<br><br>";
foreach ($livres as $livre) {
    echo $livre->getTitle() . " <a href='?controller=IndexController&method=updateLivre&id=" . $livre->getId() . "'>Modifier</a><br>";
}
