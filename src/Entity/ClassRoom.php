<?php

namespace App\Entity;

use App\Repository\ClassRoomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassRoomRepository::class)]
class ClassRoom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $nbrStudent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbrStudent(): ?string
    {
        return $this->nbrStudent;
    }

    public function setNbrStudent(string $nbrStudent): self
    {
        $this->nbrStudent = $nbrStudent;

        return $this;
    }
}