<?php

namespace Nicolas\ProjectManager\Controller;

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
        $message = 'Bienvenu ' . $user->getFirstName() . ' ' . $user->getLastName();

        $view = new View('index', 'Project Manager', [
            'message' => $message,
            'user_projects' => $this->projectRepository->getByAttribute(['id_admin' => $user->getId()]),
            'projects' => $this->projectRepository->getByParticipating($user->getid()),
        ]);
        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }
}
