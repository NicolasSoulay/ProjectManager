<h2>ici c'est l'index</h2>

<?php

use Nicolas\ProjectManager\Repository\LifeCycleRepository;

$repo = new LifeCycleRepository;
foreach ($repo->getAll() as $lifeCycle) {
    echo $lifeCycle->getLabel() . "<br>";
}
?>
