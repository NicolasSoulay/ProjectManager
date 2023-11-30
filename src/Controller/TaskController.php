<?php

namespace Nicolas\ProjectManager\Controller;

use Nicolas\ProjectManager\Entity\Project;
use Nicolas\ProjectManager\Entity\UserAccount;
use Nicolas\ProjectManager\Kernel\AbstractController;
use Nicolas\ProjectManager\Kernel\Security;
use Nicolas\ProjectManager\Kernel\View;
use Nicolas\ProjectManager\Repository\ProjectRepository;
use Nicolas\ProjectManager\Repository\TaskRepository;

class TaskController extends AbstractController
{
    private TaskRepository $taskRepository;
    private ProjectRepository $projectRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository;
        $this->projectRepository = new ProjectRepository;
    }

    public function index(): void
    {
        if (!Security::isConnected() || !isset($_GET['project'])) {
            $this->redirectIndex();
        }

        $project = $this->projectRepository->getById($_GET['project']);

        if ($project === false) {
            $this->redirectIndex();
        }

        $message = '';
        $user = $_SESSION['connected_user'];
        if (!$this->isAdmin($user, $project) && !$this->isParticipating($user, $project)) {
            $this->redirectIndex();
        }

        $view = new View('project', $project->getName(), [
            'message' => $message,
            'tasks' => $this->taskRepository->getByAttribute(['id_project' => $project->getId()]),
        ]);

        $view->addCss(['bootstrap.min']);
        $view->addJs(['bootstrap.min']);
        $view->render();
    }

    // TODO : move isAdmin() and isParticipating() somewhere more appropriate
    private function isAdmin(UserAccount $user, Project $project): bool
    {
        if ($project->getId_admin() !== $user->getId()) {
            return false;
        }
        return true;
    }

    private function isParticipating(UserAccount $user, Project $project): bool
    {
        if ($this->projectRepository->getCountByUserAndProject($user->getId(), $project->getId()) === 0) {
            return false;
        }
        return true;
    }
}
