<?php

namespace Nicolas\ProjectManager\Repository;

use Nicolas\ProjectManager\Kernel\AbstractRepository;

class TaskRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getByProjectOrdered(int $id_project): array
    {
        $sql = "SELECT * FROM Task WHERE id_project = $id_project ORDER BY id_priority ASC, name ASC";
        return $this->customQueryGet($sql);
    }
}
