<?php echo "<h2 class='text-center mb-5'>" . $project->getName() . "</h2>"; ?>
<div class='row text-center mt-5'>
    <section class='col'>
        <h3>Non débuté</h3>
        <div class='border border-primary rounded mx-1 py-2'>
            <?php
            foreach ($unstarted_tasks as $task) {
                echo "<h4 class='h6'>" . $task->getName() . " priorité: " . $task->getId_priority() . "</h4>";
            }
            ?>
        </div>
    </section>

    <section class='col'>
        <h3>En cours</h3>
        <div class='border border-primary rounded mx-1 py-2'>
            <?php
            foreach ($started_tasks as $task) {
                echo "<h4 class='h6'>" . $task->getName() . " priorité: " . $task->getId_priority() . "</h4>";
            }
            ?>
        </div>
    </section>

    <section class='col'>
        <h3>Terminé</h3>
        <div class='border border-primary rounded mx-1 py-2'>
            <?php
            foreach ($finished_tasks as $task) {
                echo "<h4 class='h6'>" . $task->getName() . " priorité: " . $task->getId_priority() . "</h4>";
            }
            ?>
        </div>
    </section>
</div>
