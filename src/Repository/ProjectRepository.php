<?php

namespace Nicolas\ProjectManager\Repository;

use Nicolas\ProjectManager\Kernel\AbstractRepository;

class ProjectRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getByParticipating(string $userId): array
    {
        $sql = "SELECT id, name, id_admin FROM Project JOIN Participate p ON p.id_project = Project.id WHERE id_user = $userId";
        return $this->customQueryGet($sql);
    }

    public function getCountByUserAndProject(string $userId, string $projectId): int
    {
        $sql = "SELECT COUNT(*) FROM Participate WHERE id_user = $userId AND id_project = $projectId";
        return $this->customQueryCount($sql);
    }
}
