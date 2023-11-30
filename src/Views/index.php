<section class='container'>
    <h2 class='text-center'>Vos projets</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php
        foreach ($user_projects as $project) {
            echo "<div class='row d-flex text-center'><img class='' src='' alt='Image du projet'/><a href=''>" . $project->getName() . "</a></div>";
        }
        ?>
    </div>
</section>
<section class='container mt-5'>
    <h2 class='text-center'>Vos participations</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php
        foreach ($projects as $project) {
            echo "<div class='row d-flex text-center'><img class='' src='' alt='Image du projet'/><a href=''>" . $project->getName() . "</a></div>";
        }
        ?>
    </div>
</section>
