<?php

namespace Nicolas\ProjectManager\Entity;

class Task
{
    private int $id;
    private string $name;
    private int $id_lifeCycle;
    private int $id_priority;
    private int $id_project;
    private ?int $id_user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Task
    {
        $this->name = $name;
        return $this;
    }

    public function getId_lifeCycle(): int
    {
        return $this->id_lifeCycle;
    }

    public function setId_lifeCycle(int $id_lifeCycle): Task
    {
        $this->id_lifeCycle = $id_lifeCycle;
        return $this;
    }

    public function getId_priority(): int
    {
        return $this->id_priority;
    }

    public function setId_priority(int $id_priority): Task
    {
        $this->id_priority = $id_priority;
        return $this;
    }

    public function getId_project(): int
    {
        return $this->id_project;
    }

    public function setId_project(int $id_project): Task
    {
        $this->id_project = $id_project;
        return $this;
    }

    public function getId_user(): int
    {
        return $this->id_user;
    }

    public function setId_user(int $id_user): Task
    {
        $this->id_user = $id_user;
        return $this;
    }
}
