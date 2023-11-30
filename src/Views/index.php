<section class='container mb-5'>
    <h2 class='text-center'>Vos projets</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php
        foreach ($user_projects as $project) {
            echo "<div class='row d-flex text-center'><a href='?controller=TaskController&method=index&project=" . $project->getId() . "'><img class='' src='' alt='Image du projet'/><h3>" . $project->getName() . "</h3></a></div>";
        }
        ?>
    </div>
</section>
<section class='container mb-5'>
    <h2 class='text-center'>Vos participations</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php
        foreach ($projects as $project) {
            echo "<div class='row d-flex text-center'><a href='?controller=TaskController&method=index&project=" . $project->getId() . "'><img class='' src='' alt='Image du projet'/><h3>" . $project->getName() . "</h3></a></div>";
        }
        ?>
    </div>
</section>
