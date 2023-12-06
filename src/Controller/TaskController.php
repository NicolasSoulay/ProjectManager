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
        if (!Security::isConnected() || !isset($_GET['Project'])) {
            $this->redirectIndex();
        }

        $project = $this->projectRepository->getById($_GET['Project']);

        if ($project === false) {
            $this->redirectIndex();
        }

        $message = '';
        $user = $_SESSION['connected_user'];
        if (!$this->isAdmin($user, $project) && !$this->isParticipating($user, $project)) {
            $this->redirectIndex();
        }

        $unstarted = [];
        $started = [];
        $finished = [];

        foreach ($this->taskRepository->getByProjectOrdered($project->getId()) as $task) {
            if ($task->getId_lifeCycle() === 1) {
                $unstarted[] = $task;
                continue;
            }
            if ($task->getId_lifeCycle() === 2) {
                $started[] = $task;
                continue;
            }
            if ($task->getId_lifeCycle() === 3) {
                $finished[] = $task;
                continue;
            }
        }

        $view = new View('project', $project->getName(), [
            'message' => $message,
            'project' => $project,
            'unstarted_tasks' => $unstarted,
            'started_tasks' => $started,
            'finished_tasks' => $finished,
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
