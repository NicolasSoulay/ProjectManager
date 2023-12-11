<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Form\FormValidator;
use Nicolas\ProjectManager\Form\ProjectForm;
use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\View;
use Nicolas\ProjectManager\Repository\ProjectRepository;

class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;

    public function __construct()
    {
        $this->projectRepository = new ProjectRepository;
    }

    public function index(): void
    {
        if (!Security::isConnected()) {
            $this->redirectIndex();
        }

        $user = $_SESSION['connected_user'];
        $message = 'Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName();

        $view = new View('home', 'Project Manager', [
            'message' => $message,
            'user_projects' => $this->projectRepository->getByAttribute(['id_admin' => $user->getId()]),
            'projects' => $this->projectRepository->getByParticipating($user->getid()),
        ]);
        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }

    public function delete(): void
    {
        if (!Security::isConnected()) {
            $this->redirectIndex();
        }

        $user = $_SESSION['connected_user'];
        $project = $this->projectRepository->getById($_GET['DeleteProject']);

        if ($project->getId_admin() !== $user->getId()) {
            $this->redirectIndex();
        }

        $this->projectRepository->deleteById($_GET['DeleteProject']);
        $this->redirectIndex();
    }

    public function create(): void
    {
        $message = '';
        if (!Security::isConnected()) {
            $this->redirectIndex();
        }

        $user = $_SESSION['connected_user'];

        if (isset($_POST['submit']) && $_POST['submit'] === 'createProject') {
            $message = FormValidator::validateProjectCreation();

            if ($message === '') {
                $this->projectRepository->create([
                    'name' => $_POST['name'],
                    'id_admin' => $user->getId(),
                ]);
                $message = "Le projet a bien été crée";
            }
        }

        $view = new View('form', 'Créer un projet', [
            'form' => ProjectForm::createForm('create'),
            'message' => $message,
        ]);

        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }
}
