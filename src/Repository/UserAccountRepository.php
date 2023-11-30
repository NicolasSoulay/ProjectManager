<?php

namespace Nicolas\ProjectManager\Repository;

use Nicolas\ProjectManager\Kernel\AbstractRepository;

class UserAccountRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    // EXEMPLE :
    public function getUserByFirstNameLastName(string $firstName, string $lastName): array
    {
        return $this->getByAttribute([
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);
    }
}
