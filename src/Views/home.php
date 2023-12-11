<section class='container mb-5'>
    <a href='?CreateProject'>Créer un nouveau projet</a>
    <h2 class='text-center mb-5'>Vos projets</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php foreach ($user_projects as $project) : ?>
            <div class='row col-3 d-flex text-center border border-1 border-primary rounded'>
                <a href='?Project=<?php echo $project->getId() ?>'>
                    <img class='' src='' alt='Image du projet' />
                    <h3 class='h5'> <?php echo $project->getName() ?></h3>
                </a>
                <div class='d-flex justify-content-around mb-3'>
                    <a href=''><img alt='Modifier'></a>
                    <a href='?DeleteProject=<?php echo $project->getId() ?>'><img alt='Supprimer'></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<section class='container mb-5'>
    <h2 class='text-center mb-5'>Vos participations</h2>
    <div class='d-flex flex-col justify-content-around'>
        <?php foreach ($projects as $project) : ?>
            <div class='row col-3 d-flex text-center border border-1 border-primary rounded'>
                <a href='?Project=<?php echo $project->getId() ?>'>
                    <img class='' src='' alt='Image du projet' />
                    <h3 class='h5'><?php echo $project->getName() ?></h3>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</section>
