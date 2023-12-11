<?php

namespace Nicolas\ProjectManager\Kernel;

use PDO;
use Nicolas\ProjectManager\Config\Config;

class Model extends PDO
{
    private static $instance = null;

    private function __construct()
    {
        try {
            parent::__construct(
                "mysql:dbname=" . Config::DBNAME . ";host=" . Config::DBHOST,
                Config::DBUSER,
                Config::DBPWD
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance(): Model
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function readAll(string $entity): array
    {
        $class = Config::ENTITY . ucfirst($entity);
        $query = $this->query('select * from ' . $entity);
        return $query->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getById(string $entity, int $id): array
    {
        $class = Config::ENTITY . ucfirst($entity);
        $query = $this->query('select * from ' . $entity . ' where id=' . $id);
        return $query->fetchAll(PDO::FETCH_CLASS, $class);
    }
    /**
     * @param array<string,mixed> $attributes
     */
    public function getByAttribute(string $entity, array $attributes): array
    {
        $class = Config::ENTITY . ucfirst($entity);

        $count = count($attributes) - 1;
        $i = 0;
        $sql = "SELECT * FROM $entity WHERE ";
        foreach ($attributes as $attribute => $value) {
            $sql .= "$attribute = '$value'";
            if ($i < $count) {
                $sql .= " AND ";
            }
            $i++;
        }
        $query = $this->query($sql);

        return $query->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /**
     * @param array<string,mixed> $datas
     */
    public function save(string $entity, array $datas): Model
    {
        $sql = 'INSERT into ' . $entity . ' (';
        $count = count($datas) - 1;
        $preparedDatas = [];
        $i = 0;
        foreach ($datas as $key => $value) {
            $sql .= $key;
            if ($i < $count) {
                $sql = $sql . ',';
            }
            $i++;
        }
        $sql .= ') VALUES (';
        $i = 0;
        foreach ($datas as $data) {
            $preparedDatas[] = htmlspecialchars($data);
            $sql .= "?";
            if ($i < $count) {
                $sql = $sql . ', ';
            }
            $i++;
        }
        $sql = $sql . ')';
        // echo $sql . '<br>';
        // var_dump($preparedDatas);
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
        return self::$instance;
    }

    /**
     * @param array<string,mixed> $datas
     */
    public function updateById(string $entity, int $id, array $datas): Model
    {
        $sql = 'UPDATE ' . $entity . ' SET ';
        $count = count($datas) - 1;
        $preparedDatas = [];
        $i = 0;
        foreach ($datas as $key => $value) {
            $preparedDatas[] = htmlspecialchars($value);
            $sql .= $key . " = ?";
            if ($i < $count) {
                $sql = $sql . ', ';
            }
            $i++;
        }
        $sql = $sql . " WHERE id='$id'";
        // echo $sql . '<br>';
        // var_dump($preparedDatas);
        $preparedRequest = $this->prepare($sql);
        $preparedRequest->execute($preparedDatas);
        return self::$instance;
    }

    public function deleteById(string $entity, int $id): Model
    {
        $sql = "DELETE from $entity WHERE id = '$id'";
        $this->exec($sql);
        return self::$instance;
    }

    public function deleteByAttribute(string $entity, string $attribute, mixed $value): Model
    {
        $sql = "DELETE from $entity WHERE" . $attribute . " = '$value'";
        $this->exec($sql);
        return self::$instance;
    }

    public function customQueryGet(string $sql, string $entity): array
    {
        $class = Config::ENTITY . ucfirst($entity);
        $query = $this->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function customQueryCount(string $sql): int
    {
        $query = $this->query($sql);
        return $query->fetchColumn();
    }
}
