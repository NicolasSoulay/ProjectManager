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

        $this->entity = $entityName;
    }

    public function getAll(): array
    {
        return Model::getInstance()->readAll($this->entity);
    }

    public function getById(int $id): object|bool
    {
        if (!empty($fetched_entity = Model::getInstance()->getById($this->entity, $id))) {
            return $fetched_entity[0];
        }
        return false;
    }

    /**
     * @param array<string,mixed> $attributes
     */
    public function getByAttribute(array $attributes): array
    {
        return Model::getInstance()->getByAttribute($this->entity, $attributes);
    }

    public function deleteById(int $id): Model
    {
        return Model::getInstance()->deleteById($this->entity, $id);
    }

    /**
     * @param array<string,mixed> $datas
     */
    public function create(array $datas): Model
    {
        return Model::getInstance()->save($this->entity, $datas);
    }

    public function customQueryGet(string $sql): array
    {
        return Model::getInstance()->customQueryGet($sql, $this->entity);
    }

    public function customQueryCount(string $sql): int
    {
        return Model::getInstance()->customQueryCount($sql);
    }

    /**
     * @param array<string,mixed> $datas
     */
    public function update(int $id, array $datas): Model
    {
        return Model::getInstance()->updateById($this->entity, $id, $datas);
    }
}
