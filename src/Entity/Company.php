<?php declare(strict_types=1);

namespace App\Entity;

class Company
{
    private $name;
    private $person;

    public function __construct(string $name, Person $person)
    {
        $this->name = $name;
        $this->person = $person;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwner(): Person
    {
        return $this->person;
    }
}
