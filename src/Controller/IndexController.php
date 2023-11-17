<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Model;
use Nicolas\ProjectManager\Form\LivreForm;

class IndexController extends AbstractController
{

    public function index($message = ''): void
    {
        $this->render('index.php', ['message' => $message]);
    }

    public function displayEditeurs(): void
    {
        $results = Model::getInstance()->readAll('editeur');
        $this->render('editeurs.php', ['editeurs' => $results]);
    }

    public function displayLivresByAttributes(): void
    {
        $results = Model::getInstance()->getByAttribute('livre', 'genre', 'conte');
        $this->render('editeurs.php', ['editeurs' => $results]);
    }

    public function displayEditeur(): void
    {
        $result = Model::getInstance()->getById('editeur', 20);
        $this->render('editeur.php', ['editeur' => $result]);
    }

    public function createEditeur(): void
    {
        $datas = [
            'nom' => 'toto',
        ];
        Model::getInstance()->save('editeur', $datas);
    }

    public function updateEditeur(): void
    {
    }

    public function deleteEditeur(): void
    {
        Model::getInstance()->deleteById('editeur', 111);
    }

    public function displayLivres($message = ''): void
    {
        $results = Model::getInstance()->readAll('livre');
        $this->render('livres.php', [
            'livres' => $results,
            'message' => $message,
        ]);
    }

    public function updateLivre(): void
    {
        if (isset($_POST['submit'])) {
            $livre = [
                'titre' => $_POST['titre'],
                'genre' => $_POST['genre'],
                'categorie' => $_POST['categorie'],
                'id_auteur' => $_POST['id_auteur'],
                'id_editeur' => $_POST['id_editeur'],
            ];
            echo $_GET['id'];

            Model::getInstance()->updateById('livre', $_POST['id'], $livre);
            $this->index('le livre a bien ete modifie');
        } else {
            $vars = [
                'form' => LivreForm::createForm('?controller=IndexController&method=updateLivre', 'update', $_GET['id']),
            ];

            $this->render('livre.php', $vars);
        }
    }

    public function isValid()
    {
    }
}
