<?php

namespace Nicolas\ProjectManager\Entity;

class Project
{
    private int $id;
    private string $name;
    private int $id_admin;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Project
    {
        $this->name = $name;
        return $this;
    }

    public function getId_admin(): int
    {
        return $this->id_admin;
    }

    public function setId_admin(int $id_admin): Project
    {
        $this->id_admin = $id_admin;
        return $this;
    }
}
