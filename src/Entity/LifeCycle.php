<?php

namespace Nicolas\ProjectManager\Entity;


class LifeCycle
{
    private int $id;
    private string $label;

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): LifeCycle
    {
        $this->label = $label;
        return $this;
    }
}
