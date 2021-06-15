<?php

namespace App\Entity;

use App\Repository\RadioTestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RadioTestRepository::class)
 */
class RadioTest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $selectedValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSelectedValue(): ?string
    {
        return $this->selectedValue;
    }

    public function setSelectedValue(string $selectedValue): self
    {
        $this->selectedValue = $selectedValue;

        return $this;
    }
}
