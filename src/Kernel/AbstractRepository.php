<?php

namespace Nicolas\ProjectManager\Kernel;

class AbstractRepository
{
    private string $entity;

    public function __construct()
    {
        // get_class($this) : Nicolas\ProjectManager\Repository\LifeCycleRepository
        $arrayString = explode("\\", get_class($this));

        $positionRepository = strpos($arrayString[3], 'Repository');
        $entityName = substr($arrayString[3], 0, $positionRepository);
        echo $entityName;

        $this->entity = $entityName;
    }

    public function getAll(): array | bool
    {
        return Model::getInstance()->readAll($this->entity);
    }

    public function getById(int $id): object
    {
        return Model::getInstance()->getById($this->entity, $id);
    }

    public function getByAttribute(string $attribute, string $value, string $comp = '='): array | bool
    {
        return Model::getInstance()->getByAttribute($this->entity, $attribute, $value, $comp);
    }

    public function deleteById(int $id): Model
    {
        return Model::getInstance()->deleteById($this->entity, $id);
    }
}