<?php

namespace App\Entity;

/**
 * Trait IdTrait
 * @package App\Entity
 */
trait IdTrait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
